<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Project Entity
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property \Cake\I18n\FrozenDate $start_date
 * @property \Cake\I18n\FrozenDate $end_date
 * @property string $status
 * @property string $status_description
 * @property string $location
 * @property int $clients_id
 * @property string $project_cost
 * @property int $project_bid_cost
 * @property string $completion_cost
 * @property int $additional_security
 * @property int $duration
 * @property \Cake\I18n\FrozenDate $work_order_date
 * @property string $agrement_status
 * @property string $ts_status
 *
 * @property \App\Model\Entity\Client $client
 */
class Project extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'description' => true,
        'start_date' => true,
        'end_date' => true,
        'status' => true,
        'status_description' => true,
        'location' => true,
        'clients_id' => true,
        'project_cost' => true,
        'project_bid_cost' => true,
        'completion_cost' => true,
        'additional_security' => true,
        'duration' => true,
        'work_order_date' => true,
        'agrement_status' => true,
        'ts_status' => true,
        'client' => true
    ];
}
