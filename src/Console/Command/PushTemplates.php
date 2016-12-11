<?php namespace Anomaly\TemplatesModule\Console\Command;

use Anomaly\Streams\Platform\Model\EloquentModel;
use Anomaly\TemplatesModule\Template\Contract\TemplateInterface;
use Anomaly\TemplatesModule\Template\Contract\TemplateRepositoryInterface;

/**
 * Class PushTemplates
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class PushTemplates
{

    /**
     * Handle the command.
     *
     * @param TemplateRepositoryInterface $templates
     */
    public function handle(TemplateRepositoryInterface $templates)
    {
        /* @var TemplateInterface|EloquentModel $template */
        foreach ($templates->all() as $template) {
            $template->getContent();
        }
    }
}
