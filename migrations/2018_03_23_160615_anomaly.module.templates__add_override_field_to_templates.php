<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModuleTemplatesAddOverrideFieldToTemplates
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class AnomalyModuleTemplatesAddOverrideFieldToTemplates extends Migration
{

    /**
     * The stream defined is
     * only for identification.
     *
     * @var bool
     */
    protected $delete = false;

    /**
     * The stream we're working with.
     *
     * @var array
     */
    protected $stream = [
        'slug' => 'templates',
    ];

    /**
     * The stream fields.
     *
     * @var array
     */
    protected $fields = [
        'override' => 'anomaly.field_type.text',
    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [
        'override' => [
            'unique' => true,
        ],
    ];
}
