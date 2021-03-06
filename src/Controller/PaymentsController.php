<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Payments Controller
 *
 * @property \App\Model\Table\PaymentsTable $Payments
 *
 * @method \App\Model\Entity\Payment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PaymentsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index($limit = NULL , $account =NULL)
    {
        $this->loadModel('Accounts');
        if($limit == NULL)
            $limit = 200;
        // if account filter is selected
        if($account == NULL)
            $account = 1;
       // $this->loadModel('Accounts');
        if($this->request->is('post')){
            $account = $this->request->getData('Select_Account');
            //dump($account);
        }
        $payment = $this->Payments->newEntity();
        $tree = $this->Accounts->find('treeList', [
        'spacer' => '--'
        ]);
        $this->set('tree', $tree);
        // now we will find the list of childern accounts
            $descendants = $this->Accounts->find('children', ['for' => $account]);
        //dump($descendants);
            $id = NULL;
            foreach($descendants as $accounts){
             $id[] = $accounts->id;
            }
            if($id == NULL)
                $id = $account;
            //dump($id);
            $payments = $this->Payments->find('all')
                    ->where(['to_account in' => $id])
                    ->contain(['FromAccounts','ToAccounts', 'Users'])
                    ->order(['voucher_no' => 'asc']);
            //dump($payment);
//            foreach ($payments as $payment){
//                    $nodeId = $payment->to_account;
//                    $crumbs = $this->Accounts->find('path', ['for' => $nodeId]);
//                    $path= NULL;
//                    foreach ($crumbs as $crumb) {
//                        $path[]=$crumb->name;
//                    }
//                    $payment->description = $payment->description .'<br>'. implode('->', $path);
//                }
            $this->set('payments',  $this->paginate($payments,['limit'=>$limit,'maxLimit' => 500]));
    }

    /**
     * View method
     *
     * @param string|null $id Payment id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $payment = $this->Payments->get($id, [
            'contain' => ['FromAccounts','ToAccounts','Users']
        ]);

        $this->set('payment', $payment);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->autoRender = FALSE;
        $this->loadModel('Accounts');
        $payment = $this->Payments->newEntity();
        if ($this->request->is('post')) {
            $payment = $this->Payments->patchEntity($payment, $this->request->getData());
            if ($this->Payments->save($payment)) {
                $this->updateAccountPayment($payment->to_account,$payment->amount);
                 return $this->response;
            }

        }
        $this->set(compact('payment'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Payment id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $payment = $this->Payments->get($id, [
            'contain' => ['FromAccounts','ToAccounts']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $payment = $this->Payments->patchEntity($payment, $this->request->getData());
            if ($this->Payments->save($payment)) {
                $this->Flash->success(__('The payment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The payment could not be saved. Please, try again.'));
        }
        $this->loadModel('Accounts');
        $tree = $this->Accounts->find('treeList', [
        'spacer' => '--'
        ]);
        $this->set('tree', $tree);
        $this->set(compact('payment'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Payment id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $payment = $this->Payments->get($id);
        if ($this->Payments->delete($payment)) {
            $this->Flash->success(__('The payment has been deleted.'));
        } else {
            $this->Flash->error(__('The payment could not be deleted. Please, try again.'));
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    public function newPayment() {
        $this->loadModel('Accounts');
        $payment = $this->Payments->newEntity();
        $tree = $this->Accounts->find('treeList', [
        // 'keyPath' => 'url',
       // 'valuePath' => 'id',
        'spacer' => '--'
        ]);
        $this->set('tree', $tree);
        $this->set(compact('payment'));
    }
    
    public function updateAccountPayment($nodeId,$amount) {
        //            find the path from the current node
            //$nodeId = $payment->to_account;
            $path = $this->Accounts->find('path', ['for' => $nodeId]);
//            prepare a list of id's in the path to update amount 
            foreach ($path as $path) {
            $id[]= $path->id;
            }
//            find the accounts that needs to be updated
            $account = $this->Accounts->find('all')
                    ->where(['id in' => $id]);
//            update the accounts amounts as it will have its and its child's amounts total
           foreach ($account as $account) {
               $account->amount_expense += $amount;
               $this->Accounts->save($account);
            }
            

    }
    
    public function accountPayment($toAccount = NULL) {
        $this->loadModel('Accounts');
        
        if ($this->request->is('post')) {
                $toAccount = $this->request->getData('Select_Account');
        }
        elseif($toAccount == NULL)
            $toAccount = 1;
        
        $descendants = $this->Accounts->find('children', ['for' => $toAccount,'contain' => ['AccountsTo']]);
        $tree = $this->Accounts->find('treeList', [
        'spacer' => '--'
        ]);
        $this->set(compact('tree'));
        $this->set(compact('descendants'));
        
    }
    
}
