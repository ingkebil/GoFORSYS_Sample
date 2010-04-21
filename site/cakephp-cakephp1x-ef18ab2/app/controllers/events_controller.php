<?php
class EventsController extends AppController {

	var $name = 'Events';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->Event->recursive = 0;
		$this->set('events', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Event', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('event', $this->Event->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Event->create();
			if ($this->Event->save($this->data)) {
				$this->Session->setFlash(__('The Event has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Event could not be saved. Please, try again.', true));
			}
		}
		$timepoints = $this->Event->Timepoint->find('list');
		$experiments = $this->Event->Experiment->find('list');
		$this->set(compact('timepoints', 'experiments'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Event', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Event->save($this->data)) {
				$this->Session->setFlash(__('The Event has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Event could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Event->read(null, $id);
		}
		$timepoints = $this->Event->Timepoint->find('list');
		$experiments = $this->Event->Experiment->find('list');
		$this->set(compact('timepoints','experiments'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Event', true));
			$this->redirect(array('action' => 'index'));
		}
		if ($this->Event->del($id)) {
			$this->Session->setFlash(__('Event deleted', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The Event could not be deleted. Please, try again.', true));
		$this->redirect(array('action' => 'index'));
	}

}
?>