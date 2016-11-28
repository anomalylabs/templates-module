<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModuleTemplatesCreateTemplatesStream
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class AnomalyModuleTemplatesCreateTemplatesStream extends Migration
{

    /**
     * The stream definition.
     *
     * @var array
     */
    protected $stream = [
        'slug'         => 'templates',
        'title_column' => 'name',
    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [
        'name'  => [
            'required' => true,
            'unique'   => true,
        ],
        'type'  => [
            'required' => true,
        ],
        'group' => [
            'required' => true,
        ],
        'content',
    ];
}
