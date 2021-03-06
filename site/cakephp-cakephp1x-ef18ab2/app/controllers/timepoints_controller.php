<?php
class TimepointsController extends AppController {

	var $name = 'Timepoints';
	var $helpers = array('Html', 'Form', 'dataTable', 'moreTime');
    var $uses = array('Timepoint', 'Fermenter');

	function index() {
		$this->Timepoint->recursive = 0;
		$this->set('timepoints', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Timepoint', true));
			$this->redirect(array('action' => 'index'));
		}

        $tp = $this->Timepoint->find('first', array('conditions' => array('Timepoint.id' => $id), 'contain' => array('Fermenter.Experiment', 'Event', 'Sample.Person')));
		$this->set('timepoint', $tp);
        $this->set('start', $this->Fermenter->findStart($tp['Timepoint']['fermenter_id']));
	}

    function create() {
		if (!empty($this->data)) {
            if ($this->Timepoint->createMany($this->data)) {
                $this->Session->setFlash(__('The Timepoints have been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The Timepoints could not be saved. Please, try again.', true));
            }
		}
		$fermenters = $this->Timepoint->Fermenter->find('list', array('fields' => array('Fermenter.id', 'Fermenter.name')));
		$this->set(compact('fermenters'));
    }

	function add() {
		if (!empty($this->data)) {
			$this->Timepoint->create();
			if ($this->Timepoint->save($this->data)) {
				$this->Session->setFlash(__('The Timepoint has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Timepoint could not be saved. Please, try again.', true));
			}
		}
		$fermenters = $this->Timepoint->Fermenter->find('list');
        $experiments = $this->Timepoint->Fermenter->Experiment->find('list', array('fields' => array('Experiment.id', 'Experiment.description')));
        $cur_experiment = $this->Timepoint->Fermenter->Experiment->findCurExperimentId();
        if (empty($this->data['Timepoint']['experiment_id']) && ! empty($cur_experiment)) {
            $this->data['Timepoint']['experiment_id'] = $cur_experiment;
        }
		$this->set(compact('fermenters', 'experiments'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Timepoint', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Timepoint->save($this->data)) {
				$this->Session->setFlash(__('The Timepoint has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Timepoint could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Timepoint->read(null, $id);
		}
		$fermenters = $this->Timepoint->Fermenter->find('list');
		$this->set(compact('fermenters'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Timepoint', true));
			$this->redirect(array('action' => 'index'));
		}
		if ($this->Timepoint->del($id)) {
			$this->Session->setFlash(__('Timepoint deleted', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The Timepoint could not be deleted. Please, try again.', true));
		$this->redirect(array('action' => 'index'));
	}

}
?>
