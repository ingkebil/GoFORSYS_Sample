<?php
class SamplesController extends AppController {

	var $name = 'Samples';
	var $helpers = array('Html', 'Form', 'Javascript', 'Ajax');
    var $uses = array('Sample', 'Person', 'Timepoint');

	function index() {
		$this->Sample->recursive = 0;
		$this->set('samples', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Sample', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('sample', $this->Sample->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Sample->create();
			if ($this->Sample->save($this->data)) {
				$this->Session->setFlash(__('The Sample has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Sample could not be saved. Please, try again.', true));
			}
		}
	}

    function generate($exp_id = null) {
		if (!empty($this->data)) {
            $person = $this->Person->find('first', array('conditions' => array('lastname' => $this->data['Person']['lastname'])));
            if (!count($person)) {
				$this->Session->setFlash(__('The Sample could not be saved. Who are you?', true));
                return;
            }
            $sample = $this->data['Sample'];
            $this->data['Sample']['person_id'] = $person['Person']['id'];
            $this->data['Sample']['sample_id'] = sprintf('%d_%d_%d', $sample['experiment_id'], $sample['fermenter_id'], $sample['timepoint']);
			$this->Sample->create();
			if ($this->Sample->save($this->data)) {
                unset($sample['amount']);
                $sample_w_id = $this->Sample->find('first', array('conditions' => $sample, 'order' => array('created' => 'DESC'), 'contain' => false));
                $this->data['Sample']['sample_id'] .= '.' . $sample_w_id['Sample']['id'];
                $this->Sample->save($this->data);
				$this->Session->setFlash(__('The Sample has been saved', true));
				#$this->redirect(array('action' => 'thx', $this->data['Sample']['sample_id']));
			} else {
				$this->Session->setFlash(__('The Sample could not be saved. Please, try again.', true));
			}
		}
        else { # when visiting the page try to fill in the name of the visitor
            $this->data = $this->Person->find('first', array('conditions' => array('IP' => ip2long($_SERVER['REMOTE_ADDR'])), 'contain' => false));
            if ($exp_id == null) {
                $cur_experiment = $this->Timepoint->Fermenter->Experiment->findCurExperiment();
                $exp_id = $cur_experiment['Experiment']['id'];
            }
            $experiments = $this->Timepoint->Fermenter->Experiment->find('first', array('conditions' => array('id' => $exp_id), 'contain' => array('Fermenter.Timepoint', 'Timepoint')));

            # get the startingpoint of an experiment
            $events = array();
            if (array_key_exists('Timepoint', $experiments)) {
                foreach ($experiments['Timepoint'] as $timepoint) {
                    $events[ $timepoint['fermenter_id'] ] = $timepoint['when'];
                }
            }

            $tps = array();
            $experiments['Timepoints'] = array();
            foreach ($experiments['Fermenter'] as $fermenter) {
                $cur_day = null;
                foreach($fermenter['Timepoint'] as $timepoint) {
                    $day = date('l, d/m/Y', strtotime($timepoint['when']));
                    if ($day != $cur_day) {
                        $cur_day = $day;
                        if (! array_key_exists( $cur_day, $tps)) {
                            $tps[ $cur_day ] = array();
                        }
                    }
                    if (! array_key_exists($fermenter['name'], $tps[ $cur_day ])) {
                        $tps[ $cur_day ][ $fermenter['name'] ] = array();
                    }
                    $date_diff = '';
                    if (array_key_exists($fermenter['id'], $events)) {
                        $date_diff = $this->date_diff($timepoint['when'], $events[ $fermenter['id'] ]);
                    }
                    $tps[ $cur_day ][ $fermenter['name'] ][ date('H:i:s', strtotime($timepoint['when'])) ] = array('tp' => $timepoint['id'], 'diff' => $date_diff);
                }
                $experiments['Timepoints'] = array_merge($experiments['Timepoints'], $tps);
            }
		    $this->set(compact('experiments'));
        }
    }

    function date_diff($start, $end="NOW") {
        $start_time = strtotime($start);
        $stop_time = strtotime($end);

        $diff_time = $start_time - $stop_time;

        if (abs($diff_time) < 3600) {
            return ceil($diff_time / 60) . 'm';
        }

        return ceil($diff_time / 3600) . 'h';
    }

    function thx($id) {
        $this->set('id', $id);
    }

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Sample', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Sample->save($this->data)) {
				$this->Session->setFlash(__('The Sample has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Sample could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Sample->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Sample', true));
			$this->redirect(array('action' => 'index'));
		}
		if ($this->Sample->del($id)) {
			$this->Session->setFlash(__('Sample deleted', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The Sample could not be deleted. Please, try again.', true));
		$this->redirect(array('action' => 'index'));
	}

}
?>
