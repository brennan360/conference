<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Company Entity
 *
 * @property int $id
 * @property string $company_name
 * @property string $company_address1
 * @property string $company_address2
 * @property string $company_city
 * @property int $state_id
 * @property int $country_id
 * @property string $company_zipcode
 * @property string $company_email
 * @property string $company_phone
 * @property string $company_fax
 * @property string $company_website
 * @property bool $is_active
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\State $state
 * @property \App\Model\Entity\Country $country
 * @property \App\Model\Entity\Conference[] $conferences
 * @property \App\Model\Entity\User[] $users
 */
class Company extends Entity
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
        'company_name' => true,
        'company_address1' => true,
        'company_address2' => true,
        'company_city' => true,
        'state_id' => true,
        'country_id' => true,
        'company_zipcode' => true,
        'company_email' => true,
        'company_phone' => true,
        'company_fax' => true,
        'company_website' => true,
        'is_active' => true,
        'created' => true,
        'modified' => true,
        'state' => true,
        'country' => true,
        'conferences' => true,
        'users' => true
    ];
}
