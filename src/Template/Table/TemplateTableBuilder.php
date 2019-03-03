<?php namespace Anomaly\TemplatesModule\Template\Table;

use Anomaly\Streams\Platform\Ui\Table\TableBuilder;

/**
 * Class TemplateTableBuilder
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class TemplateTableBuilder extends TableBuilder
{

    /**
     * The table filters.
     *
     * @var array
     */
    protected $filters = [
        'search' => [
            'fields' => [
                'name',
                'slug',
                'description',
            ],
        ],
        'group',
        'type',
    ];

    /**
     * The table columns.
     *
     * @var array
     */
    protected $columns = [
        'name' => [
            'sort_column' => 'name',
            'wrapper'     => '
                    <strong>{value.name}</strong>
                    <br>
                    <small class="text-muted">{value.location}</small>
                    <br>
                    {value.type}',
            'value'       => [
                'name'     => 'entry.name',
                'location' => 'entry.location()',
                'type'     => 'entry.label(entry.type|upper)',
            ],
        ],
        'description',
    ];

    /**
     * The table buttons.
     *
     * @var array|string
     */
    protected $buttons = [
        'edit',
        'view' => [
            'target' => '_blank',
        ],
    ];

    /**
     * The table actions.
     *
     * @var array|string
     */
    protected $actions = [
        'delete',
    ];

}
