<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Payables Model
 *
 * @method \App\Model\Entity\Payable get($primaryKey, $options = [])
 * @method \App\Model\Entity\Payable newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Payable[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Payable|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Payable patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Payable[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Payable findOrCreate($search, callable $callback = null, $options = [])
 */
class PayablesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('payables');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
        $this->belongsTo('FromAccounts', [
            'className' => 'Accounts',
            'foreignKey' => 'from_account'
        ])->setProperty('fromAccount');
        $this->belongsTo('ToAccounts', [
            'className' => 'Accounts',
            'foreignKey' => 'to_account'
        ])->setProperty('toAccount');
        $this->belongsTo('Users', [
        'className' => 'Users',
        'foreignKey' => 'users_id'
        ]);
        
        
        $this->addBehavior('Josegonzalez/Upload.Upload', [
            // You can configure as many upload fields as possible,
            // where the pattern is `field` => `config`
            //
            // Keep in mind that while this plugin does not have any limits in terms of
            // number of files uploaded per request, you should keep this down in order
            // to decrease the ability of your users to block other requests.
            'voucher' => []
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->integer('from_account')
            ->allowEmpty('from_account');

        $validator
            ->integer('to_account')
            ->allowEmpty('to_account');

        $validator
            ->scalar('description')
            ->maxLength('description', 500)
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        $validator
            ->integer('amount')
            ->requirePresence('amount', 'create')
            ->notEmpty('amount');

        $validator
            ->integer('voucher_no')
            ->requirePresence('voucher_no', 'create')
            ->notEmpty('voucher_no');

        $validator
            //->scalar('voucher')
            //->maxLength('voucher', 250)
            ->requirePresence('voucher', 'create')
            ->notEmpty('voucher');

        $validator
            ->dateTime('date')
            ->requirePresence('date', 'create')
            ->notEmpty('date');

        $validator
            ->date('due_date')
            ->requirePresence('due_date', 'create')
            ->notEmpty('due_date');

        $validator
            ->scalar('status')
            ->requirePresence('status', 'create')
            ->notEmpty('status');
        
        $validator
            ->integer('users_id')
            ->requirePresence('users_id', 'create')
            ->notEmpty('users_id');
        return $validator;

        return $validator;
    }
}
