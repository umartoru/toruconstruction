<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Projects Model
 *
 * @property \App\Model\Table\ClientsTable|\Cake\ORM\Association\BelongsTo $Clients
 *
 * @method \App\Model\Entity\Project get($primaryKey, $options = [])
 * @method \App\Model\Entity\Project newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Project[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Project|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Project patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Project[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Project findOrCreate($search, callable $callback = null, $options = [])
 */
class ProjectsTable extends Table
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

        $this->setTable('projects');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Clients', [
            'foreignKey' => 'clients_id',
            'joinType' => 'INNER'
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
            ->maxLength('name', 500)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('description')
            ->maxLength('description', 16777215)
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        $validator
            ->date('start_date')
            ->requirePresence('start_date', 'create')
            ->notEmpty('start_date');

        $validator
            ->date('end_date')
            ->requirePresence('end_date', 'create')
            ->notEmpty('end_date');

        $validator
            ->scalar('status')
            ->maxLength('status', 30)
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        $validator
            ->scalar('status_description')
            ->maxLength('status_description', 500)
            ->requirePresence('status_description', 'create')
            ->notEmpty('status_description');

        $validator
            ->scalar('location')
            ->maxLength('location', 500)
            ->requirePresence('location', 'create')
            ->notEmpty('location');

        $validator
            ->scalar('project_cost')
            ->maxLength('project_cost', 30)
            ->requirePresence('project_cost', 'create')
            ->notEmpty('project_cost');

        $validator
            ->integer('project_bid_cost')
            ->requirePresence('project_bid_cost', 'create')
            ->notEmpty('project_bid_cost');

        $validator
            ->scalar('completion_cost')
            ->maxLength('completion_cost', 20)
            ->requirePresence('completion_cost', 'create')
            ->notEmpty('completion_cost');

        $validator
            ->integer('additional_security')
            ->requirePresence('additional_security', 'create')
            ->notEmpty('additional_security');

        $validator
            ->integer('duration')
            ->requirePresence('duration', 'create')
            ->notEmpty('duration');

        $validator
            ->date('work_order_date')
            ->requirePresence('work_order_date', 'create')
            ->notEmpty('work_order_date');

        $validator
            ->scalar('agrement_status')
            ->maxLength('agrement_status', 30)
            ->requirePresence('agrement_status', 'create')
            ->notEmpty('agrement_status');

        $validator
            ->scalar('ts_status')
            ->maxLength('ts_status', 30)
            ->requirePresence('ts_status', 'create')
            ->notEmpty('ts_status');

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
        $rules->add($rules->existsIn(['clients_id'], 'Clients'));

        return $rules;
    }
}
