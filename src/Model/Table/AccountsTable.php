<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Accounts Model
 *
 * @property \App\Model\Table\AccountsTable|\Cake\ORM\Association\BelongsTo $ParentAccounts
 * @property \App\Model\Table\AccountsTable|\Cake\ORM\Association\HasMany $ChildAccounts
 *
 * @method \App\Model\Entity\Account get($primaryKey, $options = [])
 * @method \App\Model\Entity\Account newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Account[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Account|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Account patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Account[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Account findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 * @mixin \Cake\ORM\Behavior\TreeBehavior
 */
class AccountsTable extends Table
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

        $this->setTable('accounts');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Tree');

        $this->belongsTo('ParentAccounts', [
            'className' => 'Accounts',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('ChildAccounts', [
            'className' => 'Accounts',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('AccountsFrom', [
            'className' => 'Payments',
            'foreignKey' => 'from_account'
        ]);
        $this->hasMany('AccountsTo', [
            'className' => 'Payments',
            'foreignKey' => 'to_account'
        ]);
        $this->hasMany('AccountFrom', [
            'className' => 'Payables',
            'foreignKey' => 'from_account'
        ]);
        $this->hasMany('AccountTo', [
            'className' => 'Payables',
            'foreignKey' => 'to_account'
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
            ->scalar('name')
            ->maxLength('name', 100)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('description')
            ->maxLength('description', 500)
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        $validator
            ->scalar('status')
            ->requirePresence('status', 'create');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['parent_id'], 'ParentAccounts'));

        return $rules;
    }
    
        public function recovery(){
        $accounts = \Cake\ORM\TableRegistry::get('Accounts');
        $accounts->recover();
        //$this->autoRender = false;
    }
}
