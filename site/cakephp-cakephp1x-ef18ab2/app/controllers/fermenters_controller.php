<?php
class FermentersController extends AppController {

	var $name = 'Fermenters';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->Fermenter->recursive = 0;
		$this->set('fermenters', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Fermenter', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('fermenter', $this->Fermenter->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Fermenter->create();
			if ($this->Fermenter->save($this->data)) {
				$this->Session->setFlash(__('The Fermenter has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Fermenter could not be saved. Please, try again.', true));
			}
		}
		$experiments = $this->Fermenter->Experiment->find('list');
		$this->set(compact('experiments'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Fermenter', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Fermenter->save($this->data)) {
				$this->Session->setFlash(__('The Fermenter has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Fermenter could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Fermenter->read(null, $id);
		}
		$experiments = $this->Fermenter->Experiment->find('list');
		$this->set(compact('experiments'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Fermenter', true));
			$this->redirect(array('action' => 'index'));
		}
		if ($this->Fermenter->del($id)) {
			$this->Session->setFlash(__('Fermenter deleted', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The Fermenter could not be deleted. Please, try again.', true));
		$this->redirect(array('action' => 'index'));
	}

}
?>