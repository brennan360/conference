<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Conference Entity
 *
 * @property int $id
 * @property string $conference_title
 * @property \Cake\I18n\FrozenTime $start_date
 * @property \Cake\I18n\FrozenTime $end_date
 * @property int $company_id
 * @property int $location_id
 * @property bool $is_active
 * @property string $conference_description
 * @property string $main_page_image
 * @property string $icon_image
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Company $company
 * @property \App\Model\Entity\Location $location
 */
class Conference extends Entity
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
        'conference_title' => true,
        'start_date' => true,
        'end_date' => true,
        'company_id' => true,
        'location_id' => true,
        'is_active' => true,
        'conference_description' => true,
        'main_page_image' => true,
        'icon_image' => true,
        'created' => true,
        'modified' => true,
        'company' => true,
        'location' => true
    ];
}
