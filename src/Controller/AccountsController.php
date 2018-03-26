<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Accounts Controller
 *
 * @property \App\Model\Table\AccountsTable $Accounts
 *
 * @method \App\Model\Entity\Account[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AccountsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     * this method is updated to work as bootstrap tree
     */
    public function index()
    {
        $this->loadModel('Payments');
        $payment = $this->Payments->newEntity();
        $tree = $this->Accounts->find('treeList', [
        // 'keyPath' => 'url',
       // 'valuePath' => 'id',
        'spacer' => '--'
        ]);
        $this->set('tree', $tree);
        $this->set(compact('payment'));

    }

    
    public function getTree()
    {
        $accounts = $this->Accounts->find('All',['fields' =>['id','name','parent_id']]);
            foreach($accounts as $row)
            {
             $sub_data["id"] = $row["id"];
             $sub_data["name"] = $row["name"];
             $sub_data["text"] = $row["name"];
             $sub_data["parent_id"] = $row["parent_id"];
             $data[] = $sub_data;
            }
            foreach($data as $key => &$value)
            {
             $output[$value["id"]] = &$value;
            }
            foreach($data as $key => &$value)
            {
             if($value["parent_id"] && isset($output[$value["parent_id"]]))
             {
              $output[$value["parent_id"]]["nodes"][] = &$value;
             }
            }
            foreach($data as $key => &$value)
            {
             if($value["parent_id"] && isset($output[$value["parent_id"]]))
             {
              unset($data[$key]);
             }
            }

        $this->response->body(json_encode($data));
        $this->autoRender = false; // Set Render False
        return $this->response;
    }
    
    /**
     * View method
     *
     * @param string|null $id Account id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $account = $this->Accounts->get($id, [
            'contain' => ['ParentAccounts', 'ChildAccounts']
        ]);

        $this->set('account', $account);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $account = $this->Accounts->newEntity();
        if ($this->request->is('post')) {
            $account = $this->Accounts->patchEntity($account, $this->request->getData());
            if ($this->Accounts->save($account)) {
                $this->Flash->success(__('The account has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The account could not be saved. Please, try again.'));
        }
        $parentAccounts = $this->Accounts->ParentAccounts->find('list', ['limit' => 200]);
        $this->set(compact('account', 'parentAccounts'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Account id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $account = $this->Accounts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $account = $this->Accounts->patchEntity($account, $this->request->getData());
            if ($this->Accounts->save($account)) {
                $this->Flash->success(__('The account has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The account could not be saved. Please, try again.'));
        }
        $parentAccounts = $this->Accounts->ParentAccounts->find('list', ['limit' => 200]);
        $this->set(compact('account', 'parentAccounts'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Account id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $account = $this->Accounts->get($id);
        if ($this->Accounts->delete($account)) {
            $this->Flash->success(__('The account has been deleted.'));
        } else {
            $this->Flash->error(__('The account could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
