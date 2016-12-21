<?php namespace Anomaly\TemplatesModule\Console\Command;

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
     * @param Filesystem                  $filesystem
     */
    public function handle(TemplateRepositoryInterface $templates, Filesystem $filesystem)
    {
        /* @var TemplateInterface|EloquentModel $template */
        foreach ($templates->all() as $template) {
            if (!$filesystem->exists($template->path())) {
                $templates->delete($template);
            }
        }
    }
}
