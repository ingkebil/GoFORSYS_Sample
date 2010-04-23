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
            #$person = $this->Person->find('first', array('conditions' => array('lastname' => $this->data['Person']['lastname'])));
            #if (!count($person)) {
			#	$this->Session->setFlash(__('The Sample could not be saved. Who are you?', true));
            #    return;
            #}
            $sample =& $this->data['Sample'];
            #$sample['person_id'] = $person['Person']['id'];
            $sample['sample_id'] = sprintf('%d_%d_%d', $sample['experiment_id'], $sample['fermenter_id'], $sample['timepoint']);
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
            $experiments = $this->Experiment->findTPFermenter($exp_id);
		    $this->set(compact('experiments'));
        }
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
