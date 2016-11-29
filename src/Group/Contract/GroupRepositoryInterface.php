<?php namespace Anomaly\TemplatesModule\Group\Contract;

use Anomaly\Streams\Platform\Entry\Contract\EntryRepositoryInterface;

/**
 * Interface GroupRepositoryInterface
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
interface GroupRepositoryInterface extends EntryRepositoryInterface
{

    /**
     * Find a group by it's slug.
     *
     * @param $slug
     * @return GroupInterface|null
     */
    public function findBySlug($slug);
}
