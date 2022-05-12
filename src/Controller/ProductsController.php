<?php

namespace App\Controller;

use Cake\Database\Expression\QueryExpression;
use Cake\ORM\Query;
class ProductsController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('Paginator');
        $this->loadComponent('Flash'); // Include the FlashComponent
    }

    public function testQuery()
    {
        $products = $this->getTableLocator()->get('Products');

        // // lấy all data trong bảng
        // $products = $this->getTableLocator()->get('Products')->find();

        // // thêm điều kiện where
        // $products = $this->getTableLocator()
        //     ->get('Products')->find()->where(['id' => '1',]);

        // // select 1 cột từ 1 bảng
        // $products = $this->getTableLocator()
        //     ->get('Products')->find()->all()->extract('description');

        // // select những cột được chọn
        // $products = $products->find();
        // $products->select(['name', 'description', 'created']);

        // // câu lệnh where cơ bản
        // $products = $products->find();
        // $products->where(['name' => 'name 1'])
        //     ->where(['description' => 'des name 1']);

        // // cú pháp where and or 
        // $products = $products->find()
        //     ->where(function (QueryExpression $exp) {
        //         $orConditions = $exp->or(['id' => 2])
        //             ->eq('id', 3);
        //         return $exp
        //             ->add($orConditions)
        //             ->eq('name', 'name 3')
        //             ->eq('description', 'des name 3');
        //     });
        //     // SELECT *
        //     // FROM products
        //     // WHERE (
        //     //     (id = 1 OR id = 3)
        //     //     AND name = 'name 3'
        //     //     AND description = 'des name 3'
        //     // )

        // // where anh or nhưng not, nó sẽ ko lấy 2 và 4, chỉ lấy 1 và 3
        // $products = $products->find()
        //     ->where(function (QueryExpression $exp) {
        //         $orConditions = $exp->or(['id' => 2])
        //             ->eq('id', 4);
        //         return $exp
        //             ->not($orConditions);
        //     });

        // LIKE  so sánh chuỗi
        // $products = $products->find()
        //     ->where(function (QueryExpression $exp, Query $q) {
        //         return $exp->like('name', '%ame%');
        //     });

        $this->viewBuilder()->setLayout('a');
        $this->set(compact('products'));
        return $this->render('/Products/view');
    }
}
