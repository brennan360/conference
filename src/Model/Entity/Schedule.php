<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Schedule Entity
 *
 * @property int $id
 * @property int $company_id
 * @property \Cake\I18n\FrozenTime $date_time
 * @property int $conference_id
 * @property int $location_id
 * @property int $room_id
 * @property int $speaker_id
 * @property string $genre
 * @property string $title
 * @property string $description
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Company $company
 * @property \App\Model\Entity\Conference $conference
 * @property \App\Model\Entity\Location $location
 * @property \App\Model\Entity\LocationRoomName $location_room_name
 * @property \App\Model\Entity\Speaker $speaker
 */
class Schedule extends Entity
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
        'company_id' => true,
        'date_time' => true,
        'conference_id' => true,
        'location_id' => true,
        'room_id' => true,
        'speaker_id' => true,
        'genre' => true,
        'title' => true,
        'description' => true,
        'created' => true,
        'modified' => true,
        'company' => true,
        'conference' => true,
        'location' => true,
        'location_room_name' => true,
        'speaker' => true
    ];
}
