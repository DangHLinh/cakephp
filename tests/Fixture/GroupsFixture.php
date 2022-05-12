<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * GroupsFixture
 */
class GroupsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'group_id' => 1,
                'group_name' => 'Lorem ipsum dolor sit amet',
                'group_slug' => 'Lorem ipsum dolor sit amet',
                'group_status' => 1,
            ],
        ];
        parent::init();
    }
}
