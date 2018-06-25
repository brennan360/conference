<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Speaker Entity
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $speaker_image
 * @property int $speaker_type_id
 * @property string $bio
 * @property string $areas_of_expertise
 * @property bool $private_read_and_critique_participant
 * @property string $speaker_website
 * @property bool $is_active
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\SpeakerType $speaker_type
 */
class Speaker extends Entity
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
        'first_name' => true,
        'last_name' => true,
        'speaker_image' => true,
        'speaker_type_id' => true,
        'bio' => true,
        'areas_of_expertise' => true,
        'private_read_and_critique_participant' => true,
        'speaker_website' => true,
        'is_active' => true,
        'created' => true,
        'modified' => true,
        'speaker_type' => true
    ];
}
