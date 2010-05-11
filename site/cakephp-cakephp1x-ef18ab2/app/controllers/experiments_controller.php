<?php
class ExperimentsController extends AppController {

	var $name = 'Experiments';
	var $helpers = array('Html', 'Form', 'DataTable', 'moreTime');

	function index() {
		$this->Experiment->recursive = 0;
		$this->set('experiments', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Experiment', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('experiment', $this->Experiment->find('first', array('conditions' => array('Experiment.id' => $id), 'contain' => array('Fermenter.Timepoint.Sample.Person', 'Fermenter.Timepoint.Event'))));
        $this->set('start', $this->Experiment->Fermenter->Timepoint->Event->findStarts($id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Experiment->create();
			if ($this->Experiment->save($this->data)) {
				$this->Session->setFlash(__('The Experiment has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Experiment could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Experiment', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Experiment->save($this->data)) {
				$this->Session->setFlash(__('The Experiment has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Experiment could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Experiment->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Experiment', true));
			$this->redirect(array('action' => 'index'));
		}
		if ($this->Experiment->del($id)) {
			$this->Session->setFlash(__('Experiment deleted', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The Experiment could not be deleted. Please, try again.', true));
		$this->redirect(array('action' => 'index'));
	}

}
?>
