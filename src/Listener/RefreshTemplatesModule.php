<?php namespace Anomaly\TemplatesModule\Listener;

use Anomaly\Streams\Platform\Application\Event\SystemIsRefreshing;

/**
 * Class RefreshTemplatesModule
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class RefreshTemplatesModule
{

    /**
     * Handle the event.
     *
     * @param SystemIsRefreshing $event
     */
    public function handle(SystemIsRefreshing $event)
    {
        $command = $event->getCommand();

        $command->call('templates:dump');
        $command->call('templates:push');
    }
}
