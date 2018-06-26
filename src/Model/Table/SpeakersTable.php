<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Speakers Model
 *
 * @property \App\Model\Table\SpeakerTypesTable|\Cake\ORM\Association\BelongsTo $SpeakerTypes
 *
 * @method \App\Model\Entity\Speaker get($primaryKey, $options = [])
 * @method \App\Model\Entity\Speaker newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Speaker[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Speaker|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Speaker|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Speaker patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Speaker[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Speaker findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SpeakersTable extends Table
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

        $this->setTable('speakers');
        $this->setDisplayField('full_name');
        $this->setPrimaryKey('id');
        $this->addBehavior('Timestamp');

        $this->belongsTo('SpeakerTypes', [
            'foreignKey' => 'speaker_type_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Companies', [
            'foreignKey' => 'company_id',
            'joinType' => 'INNER'
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
            ->scalar('first_name')
            ->maxLength('first_name', 45)
            ->requirePresence('first_name', 'create')
            ->notEmpty('first_name');

        $validator
            ->scalar('last_name')
            ->maxLength('last_name', 45)
            ->requirePresence('last_name', 'create')
            ->notEmpty('last_name');

        $validator
            ->scalar('speaker_image')
            ->maxLength('speaker_image', 255)
            ->requirePresence('speaker_image', 'create')
            ->notEmpty('speaker_image');

        $validator
            ->scalar('bio')
            ->requirePresence('bio', 'create')
            ->notEmpty('bio');

        $validator
            ->scalar('areas_of_expertise')
            ->requirePresence('areas_of_expertise', 'create')
            ->allowEmpty('areas_of_expertise');

        $validator
            ->boolean('private_read_and_critique_participant')
            ->requirePresence('private_read_and_critique_participant', 'create')
            ->notEmpty('private_read_and_critique_participant');

        $validator
            ->scalar('speaker_website')
            ->maxLength('speaker_website', 255)
            ->allowEmpty('speaker_website');

        $validator
            ->boolean('is_active')
            ->requirePresence('is_active', 'create')
            ->notEmpty('is_active');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['speaker_type_id'], 'SpeakerTypes'));
        $rules->add($rules->existsIn(['company_id'], 'Companies'));

        return $rules;
    }
}
