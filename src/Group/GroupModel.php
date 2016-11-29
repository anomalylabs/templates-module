<?php namespace Anomaly\TemplatesModule\Group;

use Anomaly\Streams\Platform\Model\Templates\TemplatesGroupsEntryModel;
use Anomaly\TemplatesModule\Group\Contract\GroupInterface;

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
}
