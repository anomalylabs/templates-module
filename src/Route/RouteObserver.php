<?php namespace Anomaly\TemplatesModule\Route;

use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\Streams\Platform\Entry\EntryObserver;
use Anomaly\TemplatesModule\Route\Command\DumpRoutes;

/**
 * Class RouteObserver
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class RouteObserver extends EntryObserver
{

    /**
     * Fired just after an entry is saved.
     *
     * @param EntryInterface $entry
     */
    public function saved(EntryInterface $entry)
    {
        parent::saved($entry);

        dispatch_now(new DumpRoutes());
    }

}
