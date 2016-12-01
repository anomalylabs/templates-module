<?php namespace Anomaly\TemplatesModule\Template\Support\RelationshipFieldType;

/**
 * Class ValueTableBuilder
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ValueTableBuilder extends \Anomaly\RelationshipFieldType\Table\ValueTableBuilder
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
                'content',
            ],
        ],
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
}
