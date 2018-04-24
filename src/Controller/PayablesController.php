<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Payables Controller
 *
 * @property \App\Model\Table\PayablesTable $Payables
 *
 * @method \App\Model\Entity\Payable[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PayablesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $payables = $this->paginate($this->Payables);

        $this->set(compact('payables'));
    }

    /**
     * View method
     *
     * @param string|null $id Payable id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $payable = $this->Payables->get($id, [
            'contain' => []
        ]);

        $this->set('payable', $payable);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->loadModel('Accounts');
        $tree = $this->Accounts->find('children', ['for' => 1, 'direct' => true, 'fields' =>['id','name']]);
        $this->set('tree', $tree);
        $payable = $this->Payables->newEntity();
        if ($this->request->is('post')) {
            $payable = $this->Payables->patchEntity($payable, $this->request->getData());
            if ($this->Payables->save($payable)) {
                $this->Flash->success(__('The payable has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The payable could not be saved. Please, try again.'));
        }
        $this->set(compact('payable'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Payable id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $payable = $this->Payables->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $payable = $this->Payables->patchEntity($payable, $this->request->getData());
            if ($this->Payables->save($payable)) {
                $this->Flash->success(__('The payable has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The payable could not be saved. Please, try again.'));
        }
        $this->set(compact('payable'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Payable id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $payable = $this->Payables->get($id);
        if ($this->Payables->delete($payable)) {
            $this->Flash->success(__('The payable has been deleted.'));
        } else {
            $this->Flash->error(__('The payable could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
