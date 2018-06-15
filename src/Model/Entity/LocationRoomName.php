<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * LocationRoomName Entity
 *
 * @property int $id
 * @property int $location_id
 * @property string $room_name
 * @property string $nickname
 * @property bool $is_active
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Location $location
 */
class LocationRoomName extends Entity
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
        'location_id' => true,
        'room_name' => true,
        'nickname' => true,
        'is_active' => true,
        'created' => true,
        'modified' => true,
        'location' => true
    ];
}
