<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Attendee Entity
 *
 * @property int $id
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property int $attendee_type_id
 * @property string $attendee_website
 * @property int $company_id
 * @property bool $is_active
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property string $notes
 *
 * @property \App\Model\Entity\AttendeeType $attendee_type
 * @property \App\Model\Entity\Company $company
 */
class Attendee extends Entity
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
        'middle_name' => true,
        'last_name' => true,
        'email' => true,
        'address_line1' => true,
        'address_line2' => true,
        'city' => true,
        'state_id' => true,
        'zip_code' => true,
        'attendee_type_id' => true,
        'attendee_website' => true,
        'phone' => true,
        'company_id' => true,
        'is_active' => true,
        'created' => true,
        'modified' => true,
        'notes' => true,
        'attendee_type' => true,
        'company' => true
    ];
    
    protected function _getFullName()
    {
        return
            preg_replace("/ {2,}/", " ", $this->_properties['first_name'] . ' ' . $this->_properties['middle_name'] . ' ' . $this->_properties['last_name']);
    }
}
