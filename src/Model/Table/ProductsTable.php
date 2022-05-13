<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class ProductsTable extends Table
{
    public function validationDefault(Validator $validator): Validator
    {
        $validator->requirePresence(['name']);
        return $validator;
    }
}
