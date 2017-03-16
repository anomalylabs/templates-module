<?php namespace Anomaly\TemplatesModule\Template\Command;

use Anomaly\TemplatesModule\Template\Contract\TemplateInterface;
use Anomaly\TemplatesModule\Template\TemplateModel;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class SetPath
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class SetPath
{

    use DispatchesJobs;

    /**
     * The template instance.
     *
     * @var TemplateInterface|TemplateModel
     */
    protected $template;

    /**
     * Create a new SetPath instance.
     *
     * @param TemplateInterface $template
     */
    public function __construct(TemplateInterface $template)
    {
        $this->template = $template;
    }

    /**
     * Handle the command.
     */
    public function handle()
    {
        $slug  = $this->template->getSlug();
        $type  = $this->template->getType();
        $group = $this->template->getGroup();

        $extension = $this->dispatch(new GetExtension($type));

        $this->template->setAttribute('path', "{$group->getSlug()}/{$slug}.{$extension}");
    }
}
