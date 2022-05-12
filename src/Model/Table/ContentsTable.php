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
 * Contents Model
 *
 * @method \App\Model\Entity\Content newEmptyEntity()
 * @method \App\Model\Entity\Content newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Content[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Content get($primaryKey, $options = [])
 * @method \App\Model\Entity\Content findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Content patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Content[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Content|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Content saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Content[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Content[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Content[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Content[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ContentsTable extends Table
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

        $this->setTable('contents');
        $this->setDisplayField('content_id');
        $this->setPrimaryKey('content_id');
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
            ->scalar('content_body')
            ->maxLength('content_body', 4294967295)
            ->requirePresence('content_body', 'create')
            ->notEmptyString('content_body');

        $validator
            ->integer('content_group')
            ->requirePresence('content_group', 'create')
            ->notEmptyString('content_group');

        $validator
            ->dateTime('content_date')
            ->requirePresence('content_date', 'create')
            ->notEmptyDateTime('content_date');

        $validator
            ->integer('content_status')
            ->requirePresence('content_status', 'create')
            ->notEmptyString('content_status');

        return $validator;
    }

    public function view($group_id){
        try{
            $contents = $this->find()
            ->where(['content_group' => $group_id]);
            return $contents;
        }

        catch(exception $e){
            Log::error("Exception occured\n". $e);
        }
    }

    public function add($content_body, $group_id){
        try{
            $contents = $this->newEmptyEntity();
            $contents->content_body = $content_body;
            $contents->content_date = date("Y/m/d");
            $contents->content_group = $group_id;
            $contents->content_status = 1;

            return ($this->save($contents));
        }
        catch(exception $e){
            Log::error("Exception occured\n". $e);
        }
    }
}
