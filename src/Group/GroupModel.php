<?php namespace Anomaly\TemplatesModule\Group;

use Anomaly\Streams\Platform\Model\Templates\TemplatesGroupsEntryModel;
use Anomaly\TemplatesModule\Group\Contract\GroupInterface;
use Anomaly\TemplatesModule\Template\TemplateCollection;
use Anomaly\TemplatesModule\Template\TemplateModel;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class GroupModel
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class GroupModel extends TemplatesGroupsEntryModel implements GroupInterface
{

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
     * Get the related templates.
     *
     * @return TemplateCollection
     */
    public function getTemplates()
    {
        return $this->templates;
    }

    /**
     * Return the templates relation.
     *
     * @return HasMany
     */
    public function templates()
    {
        return $this->hasMany(TemplateModel::class, 'group_id');
    }
}
