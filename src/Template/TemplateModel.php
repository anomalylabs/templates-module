<?php namespace Anomaly\TemplatesModule\Template;

use Anomaly\Streams\Platform\Model\Templates\TemplatesTemplatesEntryModel;
use Anomaly\TemplatesModule\Group\Contract\GroupInterface;
use Anomaly\TemplatesModule\Template\Contract\TemplateInterface;

/**
 * Class TemplateModel
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class TemplateModel extends TemplatesTemplatesEntryModel implements TemplateInterface
{

    /**
     * Eager loaded relations.
     *
     * @var array
     */
    protected $with = [
        'group',
    ];

    /**
     * Return the editor mode.
     *
     * @return string
     */
    public function editor()
    {
        return config('anomaly.module.templates::templates.mode.' . $this->getExtension());
    }

    /**
     * Get the slug.
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Get the extension.
     *
     * @return string
     */
    public function getExtension()
    {
        return $this->extension;
    }

    /**
     * Get the related group.
     *
     * @return GroupInterface
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * Get the related group's ID.
     *
     * @return int
     */
    public function getGroupId()
    {
        return $this->group_id;
    }
}
