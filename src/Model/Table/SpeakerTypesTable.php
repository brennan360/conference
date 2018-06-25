<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SpeakerTypes Model
 *
 * @property \App\Model\Table\SpeakersTable|\Cake\ORM\Association\HasMany $Speakers
 *
 * @method \App\Model\Entity\SpeakerType get($primaryKey, $options = [])
 * @method \App\Model\Entity\SpeakerType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SpeakerType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SpeakerType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SpeakerType|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SpeakerType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SpeakerType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SpeakerType findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SpeakerTypesTable extends Table
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

        $this->setTable('speaker_types');
        $this->setDisplayField('description');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Speakers', [
            'foreignKey' => 'speaker_type_id'
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
