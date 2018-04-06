<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Receivables Model
 *
 * @method \App\Model\Entity\Receivable get($primaryKey, $options = [])
 * @method \App\Model\Entity\Receivable newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Receivable[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Receivable|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Receivable patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Receivable[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Receivable findOrCreate($search, callable $callback = null, $options = [])
 */
class ReceivablesTable extends Table
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

        $this->setTable('receivables');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->numeric('amount')
            ->requirePresence('amount', 'create')
            ->notEmpty('amount');

        $validator
            ->integer('voucher_no')
            ->requirePresence('voucher_no', 'create')
            ->notEmpty('voucher_no');

        $validator
            ->scalar('voucher')
            ->maxLength('voucher', 250)
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

        return $validator;
    }
}
