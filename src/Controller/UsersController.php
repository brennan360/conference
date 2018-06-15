<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

	public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        $this->Auth->allow(['login', 'logout']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
		$id = $this->Auth->user('id');

		$company_id = $this->Auth->user('company_id');
		$company_name = $this->_getCompanyName();

		$permission_id = $this->Auth->user('permission_id');

        $this->paginate = [
            'contain' => ['Companies', 'Permissions']
        ];

		if ($permission_id == '0')
		{
        	$users = $this->paginate($this->Users->find());
		} 
		elseif ($permission_id <= '10') 
		{
        	$users = $this->paginate($this->Users->findByCompanyId($company_id));
		} 
		else 
		{
			$users = $this->paginate($this->Users->findById($id));
		}

        $this->set(compact('users'));
		$this->set('company_name', $company_name);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
		$thisUserId = $this->Auth->user('id');
		
		$company_id = $this->Auth->user('company_id');
		$company_name = $this->_getCompanyName();
		
		$permissionLevel = $this->Auth->user('permission_id');
		
		$user = $this->Users->get($id, [
			'contain' => ['Companies', 'Permissions']
		]);

		if ($permissionLevel == 0 )
		{

		} elseif ($permissionLevel <= 10 )
		{
			if ($user->company_id != $company_id)
			{
				$user = null;
				$this->Flash->error(__('That user is not part of your company.'));
				return $this->redirect(['controller' => 'Users', 'action' => 'index']);
			}
		}
		else
		{
			if ($thisUserId != $id)
			{
				$user = null;
				$this->Flash->error(__('You are not authorized to view that user.'));
				return $this->redirect(['controller' => 'Users', 'action' => 'index']);
			}
		}

        $this->set('user', $user);
		$this->set('company_name', $company_name);
		$this->set('permissionLevel', $permissionLevel);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
		//$this->loadModel('Companies');

		$id = $this->Auth->user('id');
	
		$company_id = $this->Auth->user('company_id');
		$company_name = $this->_getCompanyName();
		$permission_id = $this->Auth->user('permission_id');

		if ($permission_id > 10)
		{
			return $this->redirect(['controller' => 'Conferences', 'action' => 'index']);
		}

        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $companies = $this->Users->Companies->find('list', ['limit' => 200])->where(['id >=' => $company_id]);
        $permissions = $this->Users->Permissions->find('list', ['limit' => 200])->where(['id >=' => $permission_id]);
        $this->set(compact('user', 'companies', 'permissions'));
		$this->set('company_id', $company_id);
		$this->set('company_name', $company_name);
		$this->set('permission_id', $permission_id);
		
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
		$company_id = $this->Auth->user('company_id');
		$company_name = $this->_getCompanyName();

		$adminUser = $this->Users->findById($this->Auth->User('id'));
		$adminPermission_id = $adminUser->first()->permission_id;
		
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
		if ($adminPermission_id == 0)
		{
			
		}
		elseif ($adminPermission_id <= 10)
		{
			if ($user->company_id != $company_id)
			{
				$user = null;
				$this->Flash->error(__('That user is not associated with your company.'));
				return $this->redirect(['controller' => 'Users', 'action' => 'index']);
			}
		}
		else
		{
			if ($adminPermission_id <= 20)
			{
				$user = null;
				$this->Flash->error(__('You do not have permissions to edit a user.'));
				return $this->redirect(['controller' => 'Conference', 'action' => 'index']);
			}
		}
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
		if ($adminPermission_id == 0)
		{
			$companies = $this->Users->Companies->find('list', ['limit' => 200]);
		}
		else{
        	$companies = $this->Users->Companies->find('list', ['limit' => 200])->where(['id =' => $user['company_id']]);
		}
		$permissions = $this->Users->Permissions->find('list', ['limit' => 200])->where(['id >=' => $adminPermission_id]);
        $this->set(compact('user', 'companies', 'permissions'));
		$this->set('company_name', $company_name);
		$this->set('permissionLevel', $adminPermission_id);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

	public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
//var_dump($user['permission_id']); exit;
            if ($user) {
                $this->Auth->setUser($user);
				if ($user['permission_id'] != 0) {
                	return $this->redirect($this->Auth->redirectUrl());
				}
				else
				{
					return $this->redirect('/admin/users');
				}
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }
	
	private function _getCompanyName()
	{
		$this->loadModel('Companies');
		$company_id = $this->Auth->user('company_id');
		$company_name = 'All';
		if ($company_id)
		{
			$company_name = $this->Companies->get($company_id)->company_name;
		}
		return $company_name;
	}
}
