<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Speakers Controller
 *
 * @property \App\Model\Table\SpeakersTable $Speakers
 *
 * @method \App\Model\Entity\Speaker[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SpeakersController extends AppController
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
            'contain' => ['SpeakerTypes','Companies']
        ];
		if ($permission_id == '0')
		{
        	$speakers = $this->paginate($this->Speakers);
		} 
		else
		{
        	$speakers = $this->paginate($this->Speakers->findByCompanyId($company_id));
		} 

        $this->set(compact('speakers'));
 
		$this->set("permissionLevel", $permission_id);
   }

    /**
     * View method
     *
     * @param string|null $id Speaker id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
 		$thisUserId = $this->Auth->user('id');
		
		$company_id = $this->Auth->user('company_id');
		
		$permission_id = $this->Auth->user('permission_id');

       $speaker = $this->Speakers->get($id, [
            'contain' => ['SpeakerTypes','Companies']
        ]);

		if ($permission_id == 0 )
		{

		} elseif ($permission_id <= 20 )
		{
			if ($speaker->company_id != $company_id)
			{
				$speaker = null;
				$this->Flash->error(__('That speaker is not associated with your company.'));
				return $this->redirect(['action' => 'index']);
			}
		}
		else
		{
			if ($thisUserId != $id)
			{
				$speaker = null;
				$this->Flash->error(__('You are not authorized to view that speaker.'));
				return $this->redirect(['action' => 'index']);
			}
		}

        $this->set('speaker', $speaker);

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

        $speaker = $this->Speakers->newEntity();
 
		if ($permission_id == 0 )
		{
		}
		elseif ($permission_id <= 10 )
		{
		}
		else
		{
			if ($permission_id <= 20)
			{
				$location = null;
				$this->Flash->error(__('You do not have permissions to add a speaker.'));
				return $this->redirect(['action' => 'index']);
			}
		}

        if ($this->request->is('post')) {
            $speaker = $this->Speakers->patchEntity($speaker, $this->request->getData());
            if ($this->Speakers->save($speaker)) {
                $this->Flash->success(__('The speaker has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The speaker could not be saved. Please, try again.'));
        }
        $speakerTypes = $this->Speakers->SpeakerTypes->find('list', ['limit' => 200]);
        $this->set(compact('speaker', 'speakerTypes'));
		
		$this->set('company_id', $company_id);
		$this->set('permissionLevel', $permission_id);
    }

    /**
     * Edit method
     *
     * @param string|null $id Speaker id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $company_id = $this->Auth->user('company_id');
 		$permission_id = $this->Auth->user('permission_id');

       $speaker = $this->Speakers->get($id, [
            'contain' => []
        ]);

		if ($permission_id == 0 )
		{

		} elseif ($permission_id <= 10 )
		{
			if ($speaker->company_id != $company_id)
			{
				$location = null;
				$this->Flash->error(__('That speaker is not associated with your company.'));
				return $this->redirect(['action' => 'index']);
			}
		}
		else
		{
			if ($permission_id <= 20)
			{
				$location = null;
				$this->Flash->error(__('You do not have permissions to edit a speaker.'));
				return $this->redirect(['action' => 'index']);
			}
		}

        if ($this->request->is(['patch', 'post', 'put'])) {
            $speaker = $this->Speakers->patchEntity($speaker, $this->request->getData());
            if ($this->Speakers->save($speaker)) {
                $this->Flash->success(__('The speaker has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The speaker could not be saved. Please, try again.'));
        }
        $speakerTypes = $this->Speakers->SpeakerTypes->find('list', ['limit' => 200]);
        $companies = $this->Speakers->Companies->find('list', ['limit' => 200]);
        $this->set(compact('speaker', 'speakerTypes', 'companies'));

        $this->set('company_id', $company_id);
		$this->set('permissionLevel', $permission_id);
    }

    /**
     * Delete method
     *
     * @param string|null $id Speaker id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $speaker = $this->Speakers->get($id);
        if ($this->Speakers->delete($speaker)) {
            $this->Flash->success(__('The speaker has been deleted.'));
        } else {
            $this->Flash->error(__('The speaker could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
