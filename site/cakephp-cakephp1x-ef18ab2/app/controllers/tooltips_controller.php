<?php
class TooltipsController extends AppController {

	var $name = 'Tooltips';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->Tooltip->recursive = 0;
		$this->set('tooltips', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Tooltip', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('tooltip', $this->Tooltip->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Tooltip->create();
			if ($this->Tooltip->save($this->data)) {
				$this->Session->setFlash(__('The Tooltip has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Tooltip could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Tooltip', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Tooltip->save($this->data)) {
				$this->Session->setFlash(__('The Tooltip has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Tooltip could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Tooltip->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Tooltip', true));
			$this->redirect(array('action' => 'index'));
		}
		if ($this->Tooltip->del($id)) {
			$this->Session->setFlash(__('Tooltip deleted', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The Tooltip could not be deleted. Please, try again.', true));
		$this->redirect(array('action' => 'index'));
	}

}
?>