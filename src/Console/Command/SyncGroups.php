<?php namespace Anomaly\TemplatesModule\Console\Command;

use Anomaly\Streams\Platform\Application\Application;
use Anomaly\Streams\Platform\Support\Str;
use Anomaly\TemplatesModule\Group\Contract\GroupRepositoryInterface;
use Illuminate\Filesystem\Filesystem;

/**
 * Class SyncGroups
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class SyncGroups
{

    /**
     * Handle the command.
     *
     * @param Str                      $str
     * @param GroupRepositoryInterface $groups
     * @param Filesystem               $filesystem
     * @param Application              $application
     */
    public function handle(Str $str, GroupRepositoryInterface $groups, Filesystem $filesystem, Application $application)
    {
        foreach ($filesystem->directories($application->getStoragePath('templates')) as $directory) {

            if (!$groups->findBySlug($slug = basename($directory))) {
                $groups->create(
                    [
                        'slug' => $slug,
                        'name' => ucwords($str->humanize($slug)),
                    ]
                );
            }
        }
    }
}
