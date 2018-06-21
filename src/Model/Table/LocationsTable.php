<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Locations Model
 *
 * @property \App\Model\Table\StatesTable|\Cake\ORM\Association\BelongsTo $States
 * @property \App\Model\Table\CountriesTable|\Cake\ORM\Association\BelongsTo $Countries
 * @property |\Cake\ORM\Association\BelongsTo $Companies
 * @property \App\Model\Table\ConferencesTable|\Cake\ORM\Association\HasMany $Conferences
 * @property \App\Model\Table\LocationFloorplansTable|\Cake\ORM\Association\HasMany $LocationFloorplans
 * @property \App\Model\Table\LocationRoomNamesTable|\Cake\ORM\Association\HasMany $LocationRoomNames
 *
 * @method \App\Model\Entity\Location get($primaryKey, $options = [])
 * @method \App\Model\Entity\Location newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Location[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Location|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Location|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Location patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Location[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Location findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class LocationsTable extends Table
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

        $this->setTable('locations');
        $this->setDisplayField('location_name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('States', [
            'foreignKey' => 'state_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Countries', [
            'foreignKey' => 'country_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Companies', [
            'foreignKey' => 'company_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Conferences', [
            'foreignKey' => 'location_id'
        ]);
        $this->hasMany('LocationFloorplans', [
            'foreignKey' => 'location_id'
        ]);
        $this->hasMany('LocationRoomNames', [
            'foreignKey' => 'location_id'
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
            ->scalar('location_name')
            ->maxLength('location_name', 255)
            ->requirePresence('location_name', 'create')
            ->notEmpty('location_name');

        $validator
            ->scalar('location_address1')
            ->maxLength('location_address1', 255)
            ->requirePresence('location_address1', 'create')
            ->notEmpty('location_address1');

        $validator
            ->scalar('location_address2')
            ->maxLength('location_address2', 255)
            ->allowEmpty('location_address2');

        $validator
            ->scalar('location_city')
            ->maxLength('location_city', 255)
            ->requirePresence('location_city', 'create')
            ->notEmpty('location_city');

        $validator
            ->scalar('location_zipcode')
            ->maxLength('location_zipcode', 10)
            ->allowEmpty('location_zipcode');

        $validator
            ->scalar('location_phone')
            ->maxLength('location_phone', 15)
            ->allowEmpty('location_phone');

        $validator
            ->integer('location_fax')
            ->allowEmpty('location_fax');

        $validator
            ->scalar('location_web_address')
            ->maxLength('location_web_address', 255)
            ->allowEmpty('location_web_address');

        $validator
            ->scalar('location_description')
            ->allowEmpty('location_description');

        $validator
            ->scalar('location_image')
            ->maxLength('location_image', 255)
            ->allowEmpty('location_image');

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
        $rules->add($rules->existsIn(['state_id'], 'States'));
        $rules->add($rules->existsIn(['country_id'], 'Countries'));
        $rules->add($rules->existsIn(['company_id'], 'Companies'));

        return $rules;
    }

	public function verifyCompanyOwnsThisLocation($location_id, $company_id) 
	{
		$locations = array();
		$locationQuery = $this->find("list", array("fields"=>array("Locations.id")))
			->where(['company_id' => $company_id])
			->hydrate(false);
		foreach ($locationQuery as $key => $value)
		{
				$locations[] = (string)$key;
		}

		if (in_array($location_id, $locations))
		{
			return true;
		}
		return false;
	}

}
