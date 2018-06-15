<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * LocationFloorplan Entity
 *
 * @property int $id
 * @property string $floorplan_image
 * @property string $floorplan_description
 * @property bool $is_active
 * @property int $location_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Location $location
 */
class LocationFloorplan extends Entity
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
        'floorplan_image' => true,
        'floorplan_description' => true,
        'is_active' => true,
        'location_id' => true,
        'created' => true,
        'modified' => true,
        'location' => true
    ];
}
