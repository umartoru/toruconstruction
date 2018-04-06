<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Payable Entity
 *
 * @property int $id
 * @property int $from_account
 * @property int $to_account
 * @property string $description
 * @property int $amount
 * @property int $voucher_no
 * @property string $voucher
 * @property \Cake\I18n\FrozenTime $date
 * @property \Cake\I18n\FrozenDate $due_date
 * @property string $status
 */
class Payable extends Entity
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
        'from_account' => true,
        'to_account' => true,
        'description' => true,
        'amount' => true,
        'voucher_no' => true,
        'voucher' => true,
        'date' => true,
        'due_date' => true,
        'status' => true
    ];
}
