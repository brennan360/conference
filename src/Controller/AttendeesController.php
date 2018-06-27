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
        $company_id = $this->Auth->user('company_id');
        $permission_id = $this->Auth->user('permission_id');

        $this->paginate = [
            'contain' => ['AttendeeTypes', 'Companies','States']
        ];

		if ($permission_id == '0')
		{
        	$attendees = $this->paginate($this->Attendees);
		} 
		else
		{
        	$attendees = $this->paginate($this->Attendees->findByCompanyId($company_id));
		} 

        $this->set(compact('attendees'));

        $this->set("permissionLevel", $permission_id);
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
 		$thisUserId = $this->Auth->user('id');
		
		$company_id = $this->Auth->user('company_id');
		
		$permission_id = $this->Auth->user('permission_id');

        $attendee = $this->Attendees->get($id, [
            'contain' => ['AttendeeTypes', 'Companies','States']
        ]);

		if ($permission_id == 0 )
		{

		} elseif ($permission_id <= 20 )
		{
			if ($attendee->company_id != $company_id)
			{
				$attendee = null;
				$this->Flash->error(__('That attendee is not associated with your company.'));
				return $this->redirect(['action' => 'index']);
			}
		}
		else
		{
			if ($thisUserId != $id)
			{
				$attendee = null;
				$this->Flash->error(__('You are not authorized to view that attendee.'));
				return $this->redirect(['action' => 'index']);
			}
		}
        
        $this->set('attendee', $attendee);

		$this->set('permissionLevel', $permission_id);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $company_id = $this->Auth->user('company_id');
		$permission_id = $this->Auth->user('permission_id');

        $attendee = $this->Attendees->newEntity();

		if ($permission_id == 0)
		{
		}
		elseif ($permission_id <= 10)
		{
		}
		else
		{
			if ($permission_id <= 20)
			{
				$attendee = null;
				$this->Flash->error(__('You do not have permissions to add an attendee.'));
				return $this->redirect(['action' => 'index']);
			}
		}

        if ($this->request->is('post')) {
            $attendee = $this->Attendees->patchEntity($attendee, $this->request->getData());
            if ($this->Attendees->save($attendee)) {
                $this->Flash->success(__('The attendee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The attendee could not be saved. Please, try again.'));
        }
        $attendeeTypes = $this->Attendees->AttendeeTypes->find('list', ['limit' => 200]);
        if ($permission_id == 0)
        {
            $companies = $this->Attendees->Companies->find('list', ['limit' => 200]);
        }
        else
        {
            $companies = $this->Attendees->Companies->find('list', ['limit' => 200])->where(['id =' => $company_id]);
        }
        $states = $this->Attendees->States->find('list', ['limit' => 200]);
        $this->set(compact('attendee', 'attendeeTypes', 'companies','states'));
		
		$this->set('company_id', $company_id);
		$this->set('permissionLevel', $permission_id);    }

    /**
     * Edit method
     *
     * @param string|null $id Attendee id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $company_id = $this->Auth->user('company_id');
 		$permission_id = $this->Auth->user('permission_id');

        $attendee = $this->Attendees->get($id, [
            'contain' => []
        ]);

		if ($permission_id == 0 )
		{

		} elseif ($permission_id <= 10 )
		{
			if ($attendee->company_id != $company_id)
			{
				$attendee = null;
				$this->Flash->error(__('That attendee is not associated with your company.'));
				return $this->redirect(['action' => 'index']);
			}
		}
		else
		{
			if ($permission_id <= 20)
			{
				$attendee = null;
				$this->Flash->error(__('You do not have permissions to edit an attendee.'));
				return $this->redirect(['action' => 'index']);
			}
		}

        if ($this->request->is(['patch', 'post', 'put'])) {
            $attendee = $this->Attendees->patchEntity($attendee, $this->request->getData());
            if ($this->Attendees->save($attendee)) {
                $this->Flash->success(__('The attendee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The attendee could not be saved. Please, try again.'));
        }

        $attendeeTypes = $this->Attendees->AttendeeTypes->find('list', ['limit' => 200]);
       if ($permission_id == 0)
        {
            $companies = $this->Attendees->Companies->find('list', ['limit' => 200]);
        }
        else
        {
            $companies = $this->Attendees->Companies->find('list', ['limit' => 200])->where(['id =' => $company_id]);
        }
        $states = $this->Attendees->States->find('list', ['limit' => 200]);
        $this->set(compact('attendee', 'attendeeTypes', 'companies', 'states'));

        $this->set('company_id', $company_id);
		$this->set('permissionLevel', $permission_id);
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
