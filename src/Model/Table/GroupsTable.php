<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Exception;
use Cake\Log\Log;
/**
 * Groups Model
 *
 * @method \App\Model\Entity\Group newEmptyEntity()
 * @method \App\Model\Entity\Group newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Group[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Group get($primaryKey, $options = [])
 * @method \App\Model\Entity\Group findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Group patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Group[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Group|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Group saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Group[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Group[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Group[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Group[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class GroupsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('groups');
        $this->setDisplayField('group_id');
        $this->setPrimaryKey('group_id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('group_name')
            ->maxLength('group_name', 200)
            ->requirePresence('group_name', 'create')
            ->notEmptyString('group_name');

        $validator
            ->scalar('group_slug')
            ->maxLength('group_slug', 254)
            ->requirePresence('group_slug', 'create')
            ->notEmptyString('group_slug');

        $validator
            ->integer('group_status')
            ->requirePresence('group_status', 'create')
            ->notEmptyString('group_status');

        return $validator;
    }

    public function index()
    {
        try{
            $groups = $this->Groups->find()->all();
            return $groups;
        }
        catch(exception $e){
            // Log::error("Exception occured\n". $e);
        }
    }

    public function add($group_name){
        try{
            $group = $this->newEmptyEntity();
            $group->group_name = $group_name;
            $group->group_create = date("Y/m/d");
            $group->group_status = 1;
            return ($this->save($group));
        }
        catch(exception $e){
            Log::error("Exception occured\n". $e);
        }
    }
}
