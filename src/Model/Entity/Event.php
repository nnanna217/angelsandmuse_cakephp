<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Event Entity
 *
 * @property int $id
 * @property string $event
 * @property \Cake\I18n\FrozenTime $event_date
 * @property string $event_desc
 * @property string $featured_img
 * @property int $created_by
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class Event extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'event' => true,
        'event_date' => true,
        'event_desc' => true,
        'featured_img' => true,
        'created_by' => true,
        'created' => true,
        'modified' => true
    ];
}
