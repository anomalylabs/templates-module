<?php namespace Anomaly\TemplatesModule\Template\Table;

use Anomaly\Streams\Platform\Ui\Table\TableBuilder;
use Anomaly\TemplatesModule\Group\Contract\GroupInterface;
use Illuminate\Database\Eloquent\Builder;

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
     * The group interface.
     *
     * @var null|GroupInterface
     */
    protected $group = null;

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
                    <small class="text-muted">{value.path}</small>
                    <br>
                    {value.type}',
            'value'       => [
                'name' => 'entry.name',
                'path' => 'entry.path',
                'type' => 'entry.label(entry.type.key|upper)',
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
    ];

    /**
     * The table actions.
     *
     * @var array|string
     */
    protected $actions = [
        'delete',
    ];

    /**
     * Fired just before querying.
     *
     * @param Builder $query
     */
    public function onQuerying(Builder $query)
    {
        if ($group = $this->getGroup()) {
            $query->where('group_id', $group->getId());
        }
    }

    /**
     * Get the group.
     *
     * @return GroupInterface|null
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * Set the group.
     *
     * @param GroupInterface $group
     * @return $this
     */
    public function setGroup(GroupInterface $group)
    {
        $this->group = $group;

        return $this;
    }
}
