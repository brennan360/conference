<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Attendees Controller
 *
 * @property \App\Model\Table\AttendeesTable $Attendees
 *
 * @method \App\Model\Entity\Attendee[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AttendeesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['AttendeeTypes', 'Companies']
        ];
        $attendees = $this->paginate($this->Attendees);

        $this->set(compact('attendees'));
    }

    /**
     * View method
     *
     * @param string|null $id Attendee id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $attendee = $this->Attendees->get($id, [
            'contain' => ['AttendeeTypes', 'Companies']
        ]);

        $this->set('attendee', $attendee);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $attendee = $this->Attendees->newEntity();
        if ($this->request->is('post')) {
            $attendee = $this->Attendees->patchEntity($attendee, $this->request->getData());
            if ($this->Attendees->save($attendee)) {
                $this->Flash->success(__('The attendee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The attendee could not be saved. Please, try again.'));
        }
        $attendeeTypes = $this->Attendees->AttendeeTypes->find('list', ['limit' => 200]);
        $companies = $this->Attendees->Companies->find('list', ['limit' => 200]);
        $this->set(compact('attendee', 'attendeeTypes', 'companies'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Attendee id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $attendee = $this->Attendees->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $attendee = $this->Attendees->patchEntity($attendee, $this->request->getData());
            if ($this->Attendees->save($attendee)) {
                $this->Flash->success(__('The attendee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The attendee could not be saved. Please, try again.'));
        }
        $attendeeTypes = $this->Attendees->AttendeeTypes->find('list', ['limit' => 200]);
        $companies = $this->Attendees->Companies->find('list', ['limit' => 200]);
        $this->set(compact('attendee', 'attendeeTypes', 'companies'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Attendee id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $attendee = $this->Attendees->get($id);
        if ($this->Attendees->delete($attendee)) {
            $this->Flash->success(__('The attendee has been deleted.'));
        } else {
            $this->Flash->error(__('The attendee could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
