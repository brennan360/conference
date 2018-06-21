<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Utility\Hash;
//App::uses('Hash', 'Utility');

/**
 * LocationFloorplans Controller
 *
 * @property \App\Model\Table\LocationFloorplansTable $LocationFloorplans
 *
 * @method \App\Model\Entity\LocationFloorplan[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LocationFloorplansController extends AppController
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

       	$this->paginate = ['contain' => ['Locations']];

		if ($permission_id == '0')
		{
        	$locationFloorplans = $this->paginate($this->LocationFloorplans);
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
			
			$locationFloorplans = $this->paginate($this->LocationFloorplans->find('all', ['conditions' =>['location_id IN' => $locations]]));
		} 

        $this->set(compact('locationFloorplans'));

		$this->set('company_id', $company_id);
		$this->set("permissionLevel", $permission_id);
    }

    /**
     * View method
     *
     * @param string|null $id Location Floorplan id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
		$this->loadModel('Locations');
		
		$thisUserId = $this->Auth->user('id');
		
		$company_id = $this->Auth->user('company_id');
		$permission_id = $this->Auth->user('permission_id');
		
		$locationFloorplan = $this->LocationFloorplans->get($id, [
            'contain' => ['Locations']
        ]);

		if ($permission_id == 0 )
		{

		} else
		{
			if (!($this->Locations->verifyCompanyOwnsThisLocation($locationFloorplan->location_id, $company_id)))
			{
				$locationFloorplan = null;
				$this->Flash->error(__('That floorplan is not associated with your company.'));
				return $this->redirect(['action' => 'index']);
			}
		}
		
        $this->set('locationFloorplan', $locationFloorplan);

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

		$locationFloorplan = $this->LocationFloorplans->newEntity();
        if ($this->request->is('post')) {
            $locationFloorplan = $this->LocationFloorplans->patchEntity($locationFloorplan, $this->request->getData());
            if ($this->LocationFloorplans->save($locationFloorplan)) {
                $this->Flash->success(__('The location floorplan has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The location floorplan could not be saved. Please, try again.'));
        }
		if ($permission_id == 0 )
		{
			$locations = $this->LocationFloorplans->Locations->find('list', ['limit' => 200]);
		}
		else
		{
        	$locations = $this->LocationFloorplans->Locations->find('list', ['limit' => 200])->where(['company_id' => $company_id]);;
		}
        $this->set(compact('locationFloorplan', 'locations'));
		
		$this->set('company_id', $company_id);
		$this->set("permissionLevel", $permission_id);
    }

    /**
     * Edit method
     *
     * @param string|null $id Location Floorplan id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
		$this->loadModel('Locations');

 		$company_id = $this->Auth->user('company_id');
		$permission_id = $this->Auth->user('permission_id');

       	$locationFloorplan = $this->LocationFloorplans->get($id, [
            'contain' => []
        ]);

		$locationFloorplan = $this->LocationFloorplans->get($id, [
            'contain' => ['Locations']
        ]);

		if ($permission_id == 0 )
		{

		}
		elseif ($permission_id <= 10 )
		{
			if (!($this->Locations->verifyCompanyOwnsThisLocation($locationFloorplan->location_id, $company_id)))
			{
				$locationFloorplan = null;
				$this->Flash->error(__('That floorplan is not associated with your company.'));
				return $this->redirect(['action' => 'index']);
			}
		}
		else
		{

			if ($permission_id <= 20)
			{
				$locationFloorplan = null;
				$this->Flash->error(__('You do not have permissions to edit a floorplan.'));
				return $this->redirect(['action' => 'index']);
			}
		}

		if ($this->request->is(['patch', 'post', 'put'])) {
            $locationFloorplan = $this->LocationFloorplans->patchEntity($locationFloorplan, $this->request->getData());
            if ($this->LocationFloorplans->save($locationFloorplan)) {
                $this->Flash->success(__('The location floorplan has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The location floorplan could not be saved. Please, try again.'));
        }
		if ($permission_id == 0 )
		{
			$locations = $this->LocationFloorplans->Locations->find('list', ['limit' => 200]);
		}
		else
		{
        	$locations = $this->LocationFloorplans->Locations->find('list', ['limit' => 200])->where(['company_id' => $company_id]);;
		}
        $this->set(compact('locationFloorplan', 'locations'));
		
		$this->set('company_id', $company_id);
		$this->set("permissionLevel", $permission_id);
    }

    /**
     * Delete method
     *
     * @param string|null $id Location Floorplan id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $locationFloorplan = $this->LocationFloorplans->get($id);
        if ($this->LocationFloorplans->delete($locationFloorplan)) {
            $this->Flash->success(__('The location floorplan has been deleted.'));
        } else {
            $this->Flash->error(__('The location floorplan could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
