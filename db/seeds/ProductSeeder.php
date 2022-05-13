<?php


use Phinx\Seed\AbstractSeed;

class ProductSeeder extends AbstractSeed
{
    public function run()
    {
        $data = [
            [
                'name'    => 'name 5',
                'description' => 'des name 5',
                'created' => date('Y-m-d H:i:s'),
            ]
        ];

        $posts = $this->table('products');
        $posts->insert($data)
            ->save();

            
    }
}
