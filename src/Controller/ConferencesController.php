<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Conferences Controller
 *
 * @property \App\Model\Table\ConferencesTable $Conferences
 *
 * @method \App\Model\Entity\Conference[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ConferencesController extends AppController
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
            'contain' => ['Companies', 'Locations']
        ];
		if ($permission_id == '0')
		{
        	$conferences = $this->paginate($this->Conferences->find());
		} 
		else
		{
        	$conferences = $this->paginate($this->Conferences->findByCompanyId($company_id));
		} 

        $this->set(compact('conferences'));
		$this->set("permissionLevel", $permission_id);
    }

    /**
     * View method
     *
     * @param string|null $id Conference id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $company_id = $this->Auth->user('company_id');
		$permission_id = $this->Auth->user('permission_id');

        $conference = $this->Conferences->get($id, [
            'contain' => ['Companies', 'Locations']
        ]);

        $this->set('conference', $conference);
		$this->set("permissionLevel", $permission_id);
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
				$conference = null;
				$this->Flash->error(__('You do not have permissions to add a conference.'));
				return $this->redirect(['controller' => 'Conferences', 'action' => 'index']);
			}
		}
		
        $conference = $this->Conferences->newEntity();
        if ($this->request->is('post')) {
            $conference = $this->Conferences->patchEntity($conference, $this->request->getData());
            if ($this->Conferences->save($conference)) {
                $this->Flash->success(__('The conference has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The conference could not be saved. Please, try again.'));
        }
        $companies = $this->Conferences->Companies->find('list', ['limit' => 200]);
        $locations = $this->Conferences->Locations->find('list', ['limit' => 200])->where(['company_id ' => $company_id]);
        $this->set(compact('conference', 'companies', 'locations'));

		$this->set('company_id', $company_id);
		$this->set("permissionLevel", $permission_id);
    }

    /**
     * Edit method
     *
     * @param string|null $id Conference id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $company_id = $this->Auth->user('company_id');
		$permission_id = $this->Auth->user('permission_id');

        $conference = $this->Conferences->get($id, [
            'contain' => []
        ]);
 
		if ($permission_id == 0 )
		{

		} elseif ($permission_id <= 10 )
		{
			if ($conference->company_id != $company_id)
			{
				$conference = null;
				$this->Flash->error(__('That conference is not associated with your company.'));
				return $this->redirect(['controller' => 'Conferences', 'action' => 'index']);
			}
		}
		else
		{
			if ($permission_id <= 20)
			{
				$conference = null;
				$this->Flash->error(__('You do not have permissions to edit a conference.'));
				return $this->redirect(['controller' => 'Conferences', 'action' => 'index']);
			}
		}

if ($this->request->is(['patch', 'post', 'put'])) {
            $conference = $this->Conferences->patchEntity($conference, $this->request->getData());
            if ($this->Conferences->save($conference)) {
                $this->Flash->success(__('The conference has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The conference could not be saved. Please, try again.'));
        }
        $companies = $this->Conferences->Companies->find('list', ['limit' => 200])->where(['id =' => $company_id]);;
        $locations = $this->Conferences->Locations->find('list', ['limit' => 200])->where(['company_id =' => $company_id]);;
        $this->set(compact('conference', 'companies', 'locations'));
		$this->set('company_id', $company_id);
		$this->set("permissionLevel", $permission_id);
    }

    /**
     * Delete method
     *
     * @param string|null $id Conference id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $conference = $this->Conferences->get($id);
        if ($this->Conferences->delete($conference)) {
            $this->Flash->success(__('The conference has been deleted.'));
        } else {
            $this->Flash->error(__('The conference could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
