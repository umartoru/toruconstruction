<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Income Entity
 *
 * @property int $id
 * @property int $accounts_id
 * @property float $amount
 * @property string $description
 * @property string $voucher
 * @property \Cake\I18n\FrozenTime $date
 *
 * @property \App\Model\Entity\Account $account
 */
class Income extends Entity
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
        'accounts_id' => true,
        'amount' => true,
        'description' => true,
        'voucher' => true,
        'date' => true,
        'account' => true
    ];
}
