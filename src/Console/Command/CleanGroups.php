<?php namespace Anomaly\TemplatesModule\Console\Command;

use Anomaly\Streams\Platform\Application\Application;
use Anomaly\Streams\Platform\Model\EloquentModel;
use Anomaly\TemplatesModule\Group\Contract\GroupInterface;
use Anomaly\TemplatesModule\Group\Contract\GroupRepositoryInterface;
use Illuminate\Filesystem\Filesystem;

/**
 * Class CleanGroups
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class CleanGroups
{

    /**
     * Handle the command.
     *
     * @param GroupRepositoryInterface $groups
     * @param Filesystem $filesystem
     * @param Application $application
     */
    public function handle(GroupRepositoryInterface $groups, Filesystem $filesystem, Application $application)
    {
        /* @var GroupInterface|EloquentModel $group */
        foreach ($groups->all() as $group) {
            if (!$filesystem->exists($application->getStoragePath('templates/' . $group->getSlug()))) {
                $groups->delete($group);
            }
        }
    }
}
