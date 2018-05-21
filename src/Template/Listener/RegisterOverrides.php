<?php namespace Anomaly\TemplatesModule\Template\Listener;

use Anomaly\Streams\Platform\Addon\Theme\ThemeCollection;
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
     * The theme collection.
     *
     * @var ThemeCollection
     */
    protected $themes;

    /**
     * The view overrides.
     *
     * @var ViewOverrides
     */
    protected $overrides;

    /**
     * The template repository.
     *
     * @var TemplateRepositoryInterface
     */
    protected $templates;

    /**
     * Create a new RegisterOverrides instance.
     *
     * @param ThemeCollection             $themes
     * @param ViewOverrides               $overrides
     * @param TemplateRepositoryInterface $templates
     */
    public function __construct(
        ThemeCollection $themes,
        ViewOverrides $overrides,
        TemplateRepositoryInterface $templates
    ) {
        $this->themes    = $themes;
        $this->templates = $templates;
        $this->overrides = $overrides;
    }

    /**
     * Handle the command.
     */
    public function handle()
    {
        $active = $this->themes->active('standard');

        /* @var TemplateInterface $template */
        foreach ($this->templates->overrides() as $template) {
            $this->overrides->add(
                str_replace(
                    'theme::',
                    $active->getNamespace() . '::',
                    $template->getOverride()
                ),
                $template->location()
            );
        }
    }

}
