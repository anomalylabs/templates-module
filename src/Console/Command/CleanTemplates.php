<?php namespace Anomaly\TemplatesModule\Console\Command;

use Anomaly\Streams\Platform\Application\Application;
use Anomaly\Streams\Platform\Model\EloquentModel;
use Anomaly\TemplatesModule\Template\Contract\TemplateInterface;
use Anomaly\TemplatesModule\Template\Contract\TemplateRepositoryInterface;
use Illuminate\Filesystem\Filesystem;

/**
 * Class CleanTemplates
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class CleanTemplates
{

    /**
     * Handle the command.
     *
     * @param TemplateRepositoryInterface $templates
     * @param Filesystem $filesystem
     * @param Application $application
     */
    public function handle(TemplateRepositoryInterface $templates, Filesystem $filesystem, Application $application)
    {
        /* @var TemplateInterface|EloquentModel $template */
        foreach ($templates->all() as $template) {
            if (!$filesystem->exists($application->getStoragePath('templates/' . $template->path()))) {
                $templates->delete($template);
            }
        }
    }
}
