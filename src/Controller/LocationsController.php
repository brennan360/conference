<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Locations Controller
 *
 * @property \App\Model\Table\LocationsTable $Locations
 *
 * @method \App\Model\Entity\Location[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LocationsController extends AppController
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
            'contain' => ['States', 'Countries']
        ];
		
		if ($permission_id == '0')
		{
        	$locations = $this->paginate($this->Locations->find());
		} 
		else
		{
        	$locations = $this->paginate($this->Locations->findByCompanyId($company_id));
		} 

        $this->set(compact('locations'));

		$this->set("permissionLevel", $permission_id);
    }

    /**
     * View method
     *
     * @param string|null $id Location id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
		$thisUserId = $this->Auth->user('id');
		
		$company_id = $this->Auth->user('company_id');
		
		$permission_id = $this->Auth->user('permission_id');

        $location = $this->Locations->get($id, [
            'contain' => ['States', 'Countries', 'Conferences', 'LocationFloorplans', 'LocationRoomNames', 'Companies']
        ]);

		if ($permission_id == 0 )
		{

		} elseif ($permission_id <= 20 )
		{
			if ($location->company_id != $company_id)
			{
				$location = null;
				$this->Flash->error(__('That location is not associated with your company.'));
				return $this->redirect(['action' => 'index']);
			}
		}
		else
		{
			if ($thisUserId != $id)
			{
				$location = null;
				$this->Flash->error(__('You are not authorized to view that location.'));
				return $this->redirect(['action' => 'index']);
			}
		}

		$this->set('location', $location);

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
				$this->Flash->error(__('You do not have permissions to add a location.'));
				return $this->redirect(['action' => 'index']);
			}
		}

		$location = $this->Locations->newEntity();
        if ($this->request->is('post')) {
            $location = $this->Locations->patchEntity($location, $this->request->getData());
            if ($this->Locations->save($location)) {
                $this->Flash->success(__('The location has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The location could not be saved. Please, try again.'));
        }
        $states = $this->Locations->States->find('list', ['limit' => 200]);
        $countries = $this->Locations->Countries->find('list', ['limit' => 200]);
		$companies = $this->Locations->Companies->find('list', ['limit' => 200])->where(['id =' => $company_id]);
        $this->set(compact('location', 'states', 'countries', 'companies'));
		
		$this->set('company_id', $company_id);
		$this->set('permissionLevel', $permission_id);
	}

    /**
     * Edit method
     *
     * @param string|null $id Location id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $company_id = $this->Auth->user('company_id');
 		$permission_id = $this->Auth->user('permission_id');

		$location = $this->Locations->get($id, [
            'contain' => []
        ]);
		
		if ($permission_id == 0 )
		{

		} elseif ($permission_id <= 10 )
		{
			if ($location->company_id != $company_id)
			{
				$location = null;
				$this->Flash->error(__('That location is not associated with your company.'));
				return $this->redirect(['action' => 'index']);
			}
		}
		else
		{
			if ($permission_id <= 20)
			{
				$location = null;
				$this->Flash->error(__('You do not have permissions to edit a location.'));
				return $this->redirect(['action' => 'index']);
			}
		}

        if ($this->request->is(['patch', 'post', 'put'])) {
            $location = $this->Locations->patchEntity($location, $this->request->getData());
            if ($this->Locations->save($location)) {
                $this->Flash->success(__('The location has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The location could not be saved. Please, try again.'));
        }
        $states = $this->Locations->States->find('list', ['limit' => 200]);
        $countries = $this->Locations->Countries->find('list', ['limit' => 200]);
		$companies = $this->Locations->Companies->find('list', ['limit' => 200])->where(['id =' => $company_id]);
        $this->set(compact('location', 'states', 'countries', 'companies'));

        $this->set('company_id', $company_id);
		$this->set('permissionLevel', $permission_id);
    }

    /**
     * Delete method
     *
     * @param string|null $id Location id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $location = $this->Locations->get($id);
        if ($this->Locations->delete($location)) {
            $this->Flash->success(__('The location has been deleted.'));
        } else {
            $this->Flash->error(__('The location could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	
	public function uploadImage()
	{
		$this->autoRender = false; // avoid to render view
		
		if ($this->request->is(array('ajax'))) 
   		{
			/* Getting file name */
			$filename = $_FILES['file']['name'];

			/* Getting File size */
			$filesize = $_FILES['file']['size'];

			/* Location */
			// webroot/upload-files/module/#-filename
			$location = WWW_ROOT . "upload-files" . DS . $this->request->getData('module') . DS . $this->request->getData('company_id') . '-' . $filename;

			$return_arr = array();

			/* Upload file */
			if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
				$src = "default.png";

				// checking file is image or not
				if(is_array(getimagesize($location)) || mime_content_type($location) == "application/pdf"){
					// webroot/upload-files/module/#-filename
					$src = "/upload-files/" . $this->request->getData('module') . "/" . $this->request->getData('company_id') . '-' . $filename;
				}
				$return_arr = array("name" => $filename,"size" => $filesize, "src"=> $src);
			}
			else{
				$this->Flash->error(__('There was an error uploading your image.'));
			}

			echo json_encode($return_arr);
		}
	}

}
