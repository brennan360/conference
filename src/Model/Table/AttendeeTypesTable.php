<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AttendeeTypes Model
 *
 * @property \App\Model\Table\AttendeesTable|\Cake\ORM\Association\HasMany $Attendees
 *
 * @method \App\Model\Entity\AttendeeType get($primaryKey, $options = [])
 * @method \App\Model\Entity\AttendeeType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AttendeeType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AttendeeType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AttendeeType|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AttendeeType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AttendeeType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AttendeeType findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AttendeeTypesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('attendee_types');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Attendees', [
            'foreignKey' => 'attendee_type_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('description')
            ->maxLength('description', 75)
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        return $validator;
    }
}
