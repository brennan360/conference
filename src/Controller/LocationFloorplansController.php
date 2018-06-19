<?php
namespace App\Controller;

use App\Controller\AppController;

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
		$company_id = $this->Auth->user('company_id');
		$permission_id = $this->Auth->user('permission_id');

       	$this->paginate = [
            'contain' => ['Locations']
        ];
        $locationFloorplans = $this->paginate($this->LocationFloorplans);

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
		$company_id = $this->Auth->user('company_id');
		$permission_id = $this->Auth->user('permission_id');
		
		$locationFloorplan = $this->LocationFloorplans->get($id, [
            'contain' => ['Locations']
        ]);

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

        $locationFloorplan = $this->LocationFloorplans->newEntity();
        if ($this->request->is('post')) {
            $locationFloorplan = $this->LocationFloorplans->patchEntity($locationFloorplan, $this->request->getData());
            if ($this->LocationFloorplans->save($locationFloorplan)) {
                $this->Flash->success(__('The location floorplan has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The location floorplan could not be saved. Please, try again.'));
        }
        $locations = $this->LocationFloorplans->Locations->find('list', ['limit' => 200])->where(['company_id' => $company_id]);;
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
 		$company_id = $this->Auth->user('company_id');
		$permission_id = $this->Auth->user('permission_id');
		
       	$locationFloorplan = $this->LocationFloorplans->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $locationFloorplan = $this->LocationFloorplans->patchEntity($locationFloorplan, $this->request->getData());
            if ($this->LocationFloorplans->save($locationFloorplan)) {
                $this->Flash->success(__('The location floorplan has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The location floorplan could not be saved. Please, try again.'));
        }
        $locations = $this->LocationFloorplans->Locations->find('list', ['limit' => 200])->where(['company_id' => $company_id]);
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
