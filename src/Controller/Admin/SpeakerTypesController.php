<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * SpeakerTypes Controller
 *
 * @property \App\Model\Table\SpeakerTypesTable $SpeakerTypes
 *
 * @method \App\Model\Entity\SpeakerType[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SpeakerTypesController extends AppController
{

	public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        $this->Auth->allow(['login', 'logout']);

		if ($this->Auth->user('permission_id') != 0)
		{
			$this->redirect('/conferences');
		}
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $speakerTypes = $this->paginate($this->SpeakerTypes);

        $this->set(compact('speakerTypes'));
    }

    /**
     * View method
     *
     * @param string|null $id Speaker Type id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $speakerType = $this->SpeakerTypes->get($id, [
            'contain' => ['Speakers']
        ]);

        $this->set('speakerType', $speakerType);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $speakerType = $this->SpeakerTypes->newEntity();
        if ($this->request->is('post')) {
            $speakerType = $this->SpeakerTypes->patchEntity($speakerType, $this->request->getData());
            if ($this->SpeakerTypes->save($speakerType)) {
                $this->Flash->success(__('The speaker type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The speaker type could not be saved. Please, try again.'));
        }
        $this->set(compact('speakerType'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Speaker Type id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $speakerType = $this->SpeakerTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $speakerType = $this->SpeakerTypes->patchEntity($speakerType, $this->request->getData());
            if ($this->SpeakerTypes->save($speakerType)) {
                $this->Flash->success(__('The speaker type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The speaker type could not be saved. Please, try again.'));
        }
        $this->set(compact('speakerType'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Speaker Type id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $speakerType = $this->SpeakerTypes->get($id);
        if ($this->SpeakerTypes->delete($speakerType)) {
            $this->Flash->success(__('The speaker type has been deleted.'));
        } else {
            $this->Flash->error(__('The speaker type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
