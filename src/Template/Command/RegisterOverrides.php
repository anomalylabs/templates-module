<?php namespace Anomaly\TemplatesModule\Template\Command;

use Anomaly\Streams\Platform\View\ViewOverrides;
use Anomaly\TemplatesModule\Template\Contract\TemplateInterface;
use Anomaly\TemplatesModule\Template\Contract\TemplateRepositoryInterface;

/**
 * Class RegisterOverrides
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class RegisterOverrides
{

    /**
     * Handle the command.
     *
     * @param TemplateRepositoryInterface $templates
     * @param ViewOverrides $overrides
     */
    public function handle(TemplateRepositoryInterface $templates, ViewOverrides $overrides)
    {
        /* @var TemplateInterface $template */
        foreach ($templates->overrides() as $template) {
            $overrides->add($template->getOverride(), $template->location());
        }
    }

}
