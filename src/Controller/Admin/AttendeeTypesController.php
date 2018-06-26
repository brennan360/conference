<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * AttendeeTypes Controller
 *
 * @property \App\Model\Table\AttendeeTypesTable $AttendeeTypes
 *
 * @method \App\Model\Entity\AttendeeType[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AttendeeTypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $attendeeTypes = $this->paginate($this->AttendeeTypes);

        $this->set(compact('attendeeTypes'));
    }

    /**
     * View method
     *
     * @param string|null $id Attendee Type id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $attendeeType = $this->AttendeeTypes->get($id, [
            'contain' => ['Attendees']
        ]);

        $this->set('attendeeType', $attendeeType);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $attendeeType = $this->AttendeeTypes->newEntity();
        if ($this->request->is('post')) {
            $attendeeType = $this->AttendeeTypes->patchEntity($attendeeType, $this->request->getData());
            if ($this->AttendeeTypes->save($attendeeType)) {
                $this->Flash->success(__('The attendee type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The attendee type could not be saved. Please, try again.'));
        }
        $this->set(compact('attendeeType'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Attendee Type id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $attendeeType = $this->AttendeeTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $attendeeType = $this->AttendeeTypes->patchEntity($attendeeType, $this->request->getData());
            if ($this->AttendeeTypes->save($attendeeType)) {
                $this->Flash->success(__('The attendee type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The attendee type could not be saved. Please, try again.'));
        }
        $this->set(compact('attendeeType'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Attendee Type id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $attendeeType = $this->AttendeeTypes->get($id);
        if ($this->AttendeeTypes->delete($attendeeType)) {
            $this->Flash->success(__('The attendee type has been deleted.'));
        } else {
            $this->Flash->error(__('The attendee type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
