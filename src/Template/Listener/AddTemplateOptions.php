<?php namespace Anomaly\TemplatesModule\Template\Listener;

use Anomaly\SelectFieldType\Event\SetLayoutOptions;
use Anomaly\TemplatesModule\Group\Contract\GroupRepositoryInterface;
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
     * The group repository.
     *
     * @var GroupRepositoryInterface
     */
    protected $groups;

    /**
     * The template repository.
     *
     * @var TemplateRepositoryInterface $templates
     */
    protected $templates;

    /**
     * Create a new AddTemplateOptions instance.
     *
     * @param GroupRepositoryInterface $groups
     * @param TemplateRepositoryInterface $templates
     */
    public function __construct(GroupRepositoryInterface $groups, TemplateRepositoryInterface $templates)
    {
        $this->groups    = $groups;
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

        if (!$group = $this->groups->findBySlug('layouts')) {
            return;
        }

        $views = $group->getTemplates();

        $views = $views->map(
            function (TemplateInterface $template) {
                return $template->location();
            }
        )->all();

        $fieldType->mergeOptions(['anomaly.module.templates::addon.title' => array_combine($views, $views)]);
    }
}
