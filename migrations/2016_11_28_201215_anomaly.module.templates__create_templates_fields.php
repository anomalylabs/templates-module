<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;
use Anomaly\TemplatesModule\Group\GroupModel;
use Anomaly\TemplatesModule\Template\TemplateStorage;

/**
 * Class AnomalyModuleTemplatesCreateTemplatesFields
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class AnomalyModuleTemplatesCreateTemplatesFields extends Migration
{

    /**
     * The addon fields.
     *
     * @var array
     */
    protected $fields = [
        'name'        => 'anomaly.field_type.text',
        'description' => 'anomaly.field_type.textarea',
        'slug'        => [
            'type'   => 'anomaly.field_type.slug',
            'config' => [
                'type'    => '-',
                'slugify' => 'name',
            ],
        ],
        'type'        => [
            'type'   => 'anomaly.field_type.select',
            'config' => [
                'options' => [
                    'twig' => 'HTML',
                    'css'  => 'CSS',
                    'js'   => 'JS',
                ],
            ],
        ],
        'group'       => [
            'type'   => 'anomaly.field_type.relationship',
            'config' => [
                'related' => GroupModel::class,
            ],
        ],
        'content'     => [
            'type'   => 'anomaly.field_type.editor',
            'config' => [
                'storage' => TemplateStorage::class,
            ],
        ],
    ];
}
