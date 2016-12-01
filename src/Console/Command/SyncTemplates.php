<?php namespace Anomaly\TemplatesModule\Console\Command;

use Anomaly\Streams\Platform\Application\Application;
use Anomaly\Streams\Platform\Support\Str;
use Anomaly\TemplatesModule\Group\Contract\GroupInterface;
use Anomaly\TemplatesModule\Group\Contract\GroupRepositoryInterface;
use Anomaly\TemplatesModule\Template\Contract\TemplateRepositoryInterface;
use Illuminate\Filesystem\Filesystem;
use Symfony\Component\Finder\SplFileInfo;

/**
 * Class SyncTemplates
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class SyncTemplates
{

    /**
     * Handle the command.
     *
     * @param Str                         $str
     * @param GroupRepositoryInterface    $groups
     * @param TemplateRepositoryInterface $templates
     * @param Filesystem                  $filesystem
     * @param Application                 $application
     */
    public function handle(
        Str $str,
        GroupRepositoryInterface $groups,
        TemplateRepositoryInterface $templates,
        Filesystem $filesystem,
        Application $application
    ) {
        $groups = $groups->all();

        /* @var SplFileInfo $file */
        foreach ($filesystem->allFiles($application->getStoragePath('templates')) as $file) {

            /* @var GroupInterface $group */
            if (!$group = $groups->findBy('slug', $directory = basename($file->getPath()))) {
                continue;
            }

            if (!$group->getTemplates()->findBy('slug', $slug = $file->getBasename('.' . $file->getExtension()))) {
                $templates->create(
                    [
                        'slug'      => $slug,
                        'group'     => $group,
                        'extension' => $file->getExtension(),
                        'name'      => ucwords($str->humanize($slug)),
                        'content'   => file_get_contents($file->getPathname()),
                        'path'      => $directory . '/' . $slug . '.' . $file->getExtension(),
                    ]
                );
            }
        }
    }
}
