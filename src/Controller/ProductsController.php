<?php

namespace App\Controller;

use Cake\Database\Expression\QueryExpression;
use Cake\ORM\Query;
use Cake\Validation\Validator;

class ProductsController extends AppController
{
    private $Contents;
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('Paginator');
        $this->loadComponent('Flash'); // Include the FlashComponent
    }

    public function testQuery()
    {
        $products = $this->getTableLocator()->get('Products');
        $groups = $this->getTableLocator()->get('Groups');
        $contents = $this->getTableLocator()->get('Contents');
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

        //
        // $products = $groups->find()
        //     ->join([
        //         'table' => 'contents',
        //         'alias' => 'ct',
        //         'type' => 'INNER',
        //         'conditions' => 'ct.content_group = group_id',
        //     ])->where(['group_id' => 81]);

        // // inner join lấy 2 cột của 2 bảng luôn
        // // cú pháp lấy cột của bảng phụ 
        // // $pro->g['group_name']
        // $products = $contents->find()->select([
        //     "Contents.content_id",
        //     "Contents.content_body",
        //     "g.group_id",
        //     "g.group_name"
        // ])->join([
        //     "table" => "groups",
        //     "alias" => "g",
        //     "type" => "INNER",
        //     "conditions" => "Contents.content_group = g.group_id"
        // ])->where(['group_id' => 81])->toList();

        // // phân trang cơ bản
        // $products = $this->paginate($this->getTableLocator()->get('Products')->find());
        // // này là của trang view
        // <nav aria-label="Page navigation example" class="text-center">
        //     <ul class="pagination">
        //         <li class="page-item"><?= $this->Paginator->first("<<") ?</li>
        //         <li class="page-item"><?= $this->Paginator->numbers() ?</li>
        //         <li class="page-item"><?= $this->Paginator->last(">>") ?</li>
        //     </ul>
        // </nav>
        // debug($products);
        // die;

        $this->viewBuilder()->setLayout('a');
        $this->set(compact('products'));
        return $this->render('/Products/view');
    }

    // // phân trang
    // public $paginate = [
    //     'limit' => 25,
    //     'order' => [
    //         'Products.id' => 'asc'
    //     ]
    // ];

    public function add()
    {
        $products = $this->Products->newEmptyEntity();
        if ($this->request->is('post')) {
            $products = $this->Products->patchEntity($products, $this->request->getData());
            $name = $this->request->getData('name');
            $products->name = $name;
            $products->description = 'description';
            if ($this->Products->save($products)) {
                return $this->render('/Products/view');
            }
        }
        return $this->render('/Products/view');
    }
}
