<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Content Entity
 *
 * @property int $content_id
 * @property string $content_body
 * @property int $content_group
 * @property \Cake\I18n\FrozenTime $content_date
 * @property int $content_status
 */
class Content extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'content_body' => true,
        'content_group' => true,
        'content_date' => true,
        'content_status' => true,
    ];
}
