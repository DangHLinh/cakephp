<?php

declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * Products seed.
 */
class ProductsSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [];
        for ($i = 1; $i < 1000; $i++) {
            $data = [
                'name' => 'name ' . $i,
                'description' => 'des name ' . $i,
                'created' => date('Y-m-d H:i:s'),
            ];

            $table = $this->table('products');
            $table->insert($data)->save();
        }
    }
}
