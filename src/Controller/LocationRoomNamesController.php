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

        if ($permission_id == '0')
		{
            $locationRoomNames = $this->paginate($this->LocationRoomNames);
        }
        else
        {
 			$locations = '';
        	$locationQuery = $this->Locations
				->find("list", array("fields"=>array("Locations.id")))
				->where(['company_id' => $company_id])
				->hydrate(false);
			foreach ($locationQuery as $key => $value)
			{
					$locations .= (string)$key;
					$locations .= ", ";
			}
			$locations = trim($locations, ", ");
			
			$locationRoomNames = $this->paginate($this->LocationRoomNames->find('all', ['conditions' =>['location_id IN' => $locations]]));
        }

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

		if ($permission_id == 0 )
		{

		} else
		{
			if (!($this->Locations->verifyCompanyOwnsThisLocation($locationRoomName->location_id, $company_id)))
			{
				$locationFloorplan = null;
				$this->Flash->error(__('That room name is not associated with your company.'));
				return $this->redirect(['action' => 'index']);
			}
		}
		
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
 		$company_id = $this->Auth->user('company_id');
		$permission_id = $this->Auth->user('permission_id');

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

				$locationFloorplan = null;
				$this->Flash->error(__('You do not have permissions to add a floorplan.'));
				return $this->redirect(['action' => 'index']);
			}
		}

       $locationRoomName = $this->LocationRoomNames->newEntity();
        if ($this->request->is('post')) {
            $locationRoomName = $this->LocationRoomNames->patchEntity($locationRoomName, $this->request->getData());
            if ($this->LocationRoomNames->save($locationRoomName)) {
                $this->Flash->success(__('The location room name has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The location room name could not be saved. Please, try again.'));
        }
		if ($permission_id == 0 )
		{
            $locations = $this->LocationRoomNames->Locations->find('list', ['limit' => 200]);
        }
        else
        {
        	$locations = $this->LocationRoomNames->Locations->find('list', ['limit' => 200])->where(['company_id' => $company_id]);;
        }
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

        if ($permission_id == 0 )
		{

		}
		elseif ($permission_id <= 10 )
		{
			if (!($this->Locations->verifyCompanyOwnsThisLocation($locationRoomName->location_id, $company_id)))
			{
				$locationRoomName = null;
				$this->Flash->error(__('That room name is not associated with your company.'));
				return $this->redirect(['action' => 'index']);
			}
		}
		else
		{

			if ($permission_id <= 20)
			{
				$locationRoomName = null;
				$this->Flash->error(__('You do not have permissions to edit a room name.'));
				return $this->redirect(['action' => 'index']);
			}
		}

        if ($this->request->is(['patch', 'post', 'put'])) {
            $locationRoomName = $this->LocationRoomNames->patchEntity($locationRoomName, $this->request->getData());
            if ($this->LocationRoomNames->save($locationRoomName)) {
                $this->Flash->success(__('The location room name has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The location room name could not be saved. Please, try again.'));
        }
        
        if ($permission_id == 0 )
		{
			$locations = $this->LocationRoomNames->Locations->find('list', ['limit' => 200]);
		}
		else
		{
        	$locations = $this->LocationRoomNames->Locations->find('list', ['limit' => 200])->where(['company_id' => $company_id]);;
		}
        
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
