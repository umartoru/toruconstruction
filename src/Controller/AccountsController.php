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
    
    public function initialize() {
        parent::initialize();
        $this->Authorize->isAuthorized($this->Auth->user());
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     * this method is updated to work as bootstrap tree
     */
    public function index($limit = NULL)
    {
        if($limit == NULL)
            $limit = 25;
        $accounts = $this->paginate($this->Accounts,[
                    'limit' => $limit,
                    'contain' => ['ParentAccounts']
                ]);
                // this is to add path to account description 
                foreach ($accounts as $account){
                    $nodeId = $account->id;
                    $crumbs = $this->Accounts->find('path', ['for' => $nodeId]);
                    $path= NULL;
                    foreach ($crumbs as $crumb) {
                        $path[]=$crumb->name;
                    }
                    $account->description = $account->description .'<br>'. implode('->', $path);
                }
                $this->set(compact('accounts'));

    }

    
    public function getTree($amount)
    {
        $accounts = $this->Accounts->find('All');
            foreach($accounts as $row)
            {
             $sub_data["id"] = $row["id"];
             $sub_data["name"] = $row["name"];
             $sub_data["text"] = $row["name"]."           -            ".$row[$amount];
             if($row["status"] == "Active")
             $sub_data["state"]["disabled"]= false;
             else
               $sub_data["state"]["disabled"]= true;  
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
            //$this->log($data);
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
        $parentAccounts = $this->Accounts->find('treeList', [
        // 'keyPath' => 'url',
       // 'valuePath' => 'id',
        'spacer' => '-'
        ]);
        //$parentAccounts = $this->Accounts->ParentAccounts->find('threaded', ['limit' => 200]);
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
        $parentAccounts = $this->Accounts->find('treeList', [
        // 'keyPath' => 'url',
       // 'valuePath' => 'id',
        'spacer' => '--'
        ]);
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
        $this->autoRender = false;
        $this->request->allowMethod(['post', 'delete']);
        $account = $this->Accounts->get($id);
        if ($this->Accounts->delete($account)) {
            $this->Flash->success(__('The account has been deleted.'));
        } else {
            $this->Flash->error(__('The account could not be deleted. Please, try again.'));
        }
        // this is to update the amount of of the tree structure;
        $path = $this->Accounts->find('path', ['for' => $id]);
        $parent=0;
        foreach ($path as $path) {
            $parent= $path->id;
            exit(0);
         }
        $this->addRecovery($parent);
        //return $this->redirect(['action' => 'index']);
    }
    
    public function listAccounts() {
        $accounts = $this->paginate($this->Accounts,[
            'contain' => ['ParentAccounts']
        ]);

        $this->set(compact('accounts'));
    }
    
//    public function recovery(){
//        $this->Accounts->recovery();
//        $this->autoRender = false;
//    }
    public function addRecovery($id = NULL){
        $this->autoRender = false;
        if($id == NULL)
            $id=1;
       // echo $id;
        $descendants = $this->Accounts->find('children', ['for' => $id,'contain' => ['AccountsTo']]);
        //dump($descendants);
        foreach($descendants as $accounts){
            $sum =0;
            foreach ($accounts->accounts_to as $payment){
                $sum += $payment->amount;
                
            }
            //dump($accounts);
            $accounts->amount_expense = $sum;
            echo $accounts->name."<--old--->".$accounts->amount_expense;
            $subdescendants = $this->Accounts->find('children', ['for' => $accounts->id, 'direct' => true]);
            $subsum =0;
            foreach ($subdescendants as $subaccounts){
                $subsum += $subaccounts->amount_expense;
               // echo $subaccounts->getLevel();
                //echo $subaccounts->amount;
            }
            $accounts->amount_expense += $subsum;
            echo "<------new----->".$accounts->amount_expense."<hr><br>";
            $this->Accounts->save($accounts);
            
        }
        
    }
}
