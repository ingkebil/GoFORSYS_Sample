<?php
class SamplesController extends AppController {

	var $name = 'Samples';
	var $helpers = array('Html', 'Form', 'Javascript', 'Ajax');
    var $uses = array('Sample', 'Person', 'Timepoint', 'Experiment');

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
            if (!count($person['Person'])) {
                $this->Person->create();
                if (!$this->Person->save($this->data)) {
                    $this->Session->setFlash(__('The Person could not be saved. Please try again.', true));
                }
                $person['Person']['id'] = $this->Person->id;
            }

            if (count($person['Person'])) {
                $sample =& $this->data['Sample'];
                $tps = explode(',', $sample['timepoint_id']);
                $tps = array_filter($tps, create_function('$a', 'return !empty($a);'));
                $samples = array();
                foreach ($tps as $tp) {
                    if ($tp) {
                        $new_sample = array(
                            'timepoint_id' => $tp,
                            'amount' => $sample['amount'],
                            'person_id' => $person['Person']['id'],
                        );
                        $samples[] = $new_sample;
                    }
                }

                if ($this->Sample->saveAll($samples)) {
                    $this->Session->write('tps', $tps);
                    $this->Session->write('person_id', $person['Person']['id']);
                    $this->Session->setFlash(__('The samples have been saved', true));
                    $this->redirect(array('action' => 'thx'));
                } else {
                    $validationErrors = array();
                    foreach ($this->Sample->validationErrors as $errors) {
                        $validationErrors = array_merge($errors, $validationErrors);
                    }
                    $this->Sample->validationErrors = $validationErrors;
                    $this->Session->setFlash(__('The Sample could not be saved. Please, try again.', true));
                }
            }
        }
        $experiments = $this->Experiment->findTPFermenter($exp_id);
        $this->data['Sample']['experiment_id'] = $experiments['Experiment']['id'];
        $this->set(compact('experiments'));
    }

    function thx() {
        $tps = $this->Session->read('tps');
        $person_id = $this->Session->read('person_id');
#        $this->Session->del('tps');
#        $this->Session->del('person_id');
        $ids = $this->Sample->find('all', array('conditions' => array('Sample.timepoint_id' => $tps, 'Sample.person_id' => $person_id), 'order' => array('Sample.created' => 'DESC'), 'limit' => count($tps), 'contain' => false));
        $this->set(compact('ids', 'person_id'));
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
