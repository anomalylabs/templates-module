<?php namespace Anomaly\TemplatesModule\Template\Command;

use Anomaly\Streams\Platform\Application\Application;
use Illuminate\Filesystem\Filesystem;

/**
 * Class CheckDirectory
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class CheckDirectory
{

    /**
     * Handle the command.
     *
     * @param Application $application
     * @param Filesystem  $files
     */
    public function handle(Application $application, Filesystem $files)
    {
        if ($files->exists($application->getStoragePath('templates'))) {
            return;
        }

        $files->makeDirectory($application->getStoragePath('templates'));
    }
}
