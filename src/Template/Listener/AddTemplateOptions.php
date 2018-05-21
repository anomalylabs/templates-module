<?php namespace Anomaly\TemplatesModule\Template\Listener;

use Anomaly\SelectFieldType\Event\SetLayoutOptions;
use Anomaly\TemplatesModule\Template\Contract\TemplateInterface;
use Anomaly\TemplatesModule\Template\Contract\TemplateRepositoryInterface;

/**
 * Class AddTemplateOptions
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class AddTemplateOptions
{

    /**
     * The template repository.
     *
     * @var TemplateRepositoryInterface $templates
     */
    protected $templates;

    /**
     * Create a new AddTemplateOptions instance.
     *
     * @param TemplateRepositoryInterface $templates
     */
    public function __construct(TemplateRepositoryInterface $templates)
    {
        $this->templates = $templates;
    }

    /**
     * Handle the event.
     *
     * @param SetLayoutOptions $event
     */
    public function handle(SetLayoutOptions $event)
    {
        $fieldType = $event->getFieldType();

        $views = $this->templates->findAllBy('type', 'twig');

        $views = $views->map(
            function (TemplateInterface $template) {
                return $template->location();
            }
        )->all();

        $fieldType->mergeOptions(['anomaly.module.templates::addon.title' => array_combine($views, $views)]);
    }
}
