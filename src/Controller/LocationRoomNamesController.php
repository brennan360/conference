<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * LocationRoomNames Controller
 *
 * @property \App\Model\Table\LocationRoomNamesTable $LocationRoomNames
 *
 * @method \App\Model\Entity\LocationRoomName[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LocationRoomNamesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
		$this->loadModel('Locations');
		
		$company_id = $this->Auth->user('company_id');
		$permission_id = $this->Auth->user('permission_id');

       	$this->paginate = [
            'contain' => ['Locations']
        ];
        $locationRoomNames = $this->paginate($this->LocationRoomNames);

        $this->set(compact('locationRoomNames'));
		
		$this->set('company_id', $company_id);
		$this->set("permissionLevel", $permission_id);
    }

    /**
     * View method
     *
     * @param string|null $id Location Room Name id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
 		$this->loadModel('Locations');
		
		$thisUserId = $this->Auth->user('id');
		
		$company_id = $this->Auth->user('company_id');
		$permission_id = $this->Auth->user('permission_id');
		
       $locationRoomName = $this->LocationRoomNames->get($id, [
            'contain' => ['Locations']
        ]);

        $this->set('locationRoomName', $locationRoomName);

		$this->set('company_id', $company_id);
		$this->set("permissionLevel", $permission_id);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $locationRoomName = $this->LocationRoomNames->newEntity();
        if ($this->request->is('post')) {
            $locationRoomName = $this->LocationRoomNames->patchEntity($locationRoomName, $this->request->getData());
            if ($this->LocationRoomNames->save($locationRoomName)) {
                $this->Flash->success(__('The location room name has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The location room name could not be saved. Please, try again.'));
        }
        $locations = $this->LocationRoomNames->Locations->find('list', ['limit' => 200]);
        $this->set(compact('locationRoomName', 'locations'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Location Room Name id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
 		$this->loadModel('Locations');

 		$company_id = $this->Auth->user('company_id');
		$permission_id = $this->Auth->user('permission_id');

       $locationRoomName = $this->LocationRoomNames->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $locationRoomName = $this->LocationRoomNames->patchEntity($locationRoomName, $this->request->getData());
            if ($this->LocationRoomNames->save($locationRoomName)) {
                $this->Flash->success(__('The location room name has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The location room name could not be saved. Please, try again.'));
        }
        $locations = $this->LocationRoomNames->Locations->find('list', ['limit' => 200]);
        $this->set(compact('locationRoomName', 'locations'));
		
		$this->set('company_id', $company_id);
		$this->set("permissionLevel", $permission_id);
    }

    /**
     * Delete method
     *
     * @param string|null $id Location Room Name id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $locationRoomName = $this->LocationRoomNames->get($id);
        if ($this->LocationRoomNames->delete($locationRoomName)) {
            $this->Flash->success(__('The location room name has been deleted.'));
        } else {
            $this->Flash->error(__('The location room name could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
