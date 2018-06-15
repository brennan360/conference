<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Location Entity
 *
 * @property int $id
 * @property string $location_name
 * @property string $location_address1
 * @property string $location_address2
 * @property string $location_city
 * @property int $state_id
 * @property int $country_id
 * @property string $location_zipcode
 * @property string $location_phone
 * @property int $location_fax
 * @property string $location_web_address
 * @property string $location_description
 * @property string $location_image
 * @property bool $is_active
 * @property int $company_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\State $state
 * @property \App\Model\Entity\Country $country
 * @property \App\Model\Entity\Conference[] $conferences
 * @property \App\Model\Entity\LocationFloorplan[] $location_floorplans
 * @property \App\Model\Entity\LocationRoomName[] $location_room_names
 */
class Location extends Entity
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
        'location_name' => true,
        'location_address1' => true,
        'location_address2' => true,
        'location_city' => true,
        'state_id' => true,
        'country_id' => true,
        'location_zipcode' => true,
        'location_phone' => true,
        'location_fax' => true,
        'location_web_address' => true,
        'location_description' => true,
        'location_image' => true,
        'is_active' => true,
        'company_id' => true,
        'created' => true,
        'modified' => true,
        'state' => true,
        'country' => true,
        'conferences' => true,
        'location_floorplans' => true,
        'location_room_names' => true
    ];
}
