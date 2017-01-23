<?php namespace Anomaly\TemplatesModule\Http\Controller;

use Anomaly\Streams\Platform\Application\Application;
use Anomaly\Streams\Platform\Http\Controller\PublicController;
use Anomaly\TemplatesModule\Template\Contract\TemplateInterface;
use Anomaly\TemplatesModule\Template\Contract\TemplateRepositoryInterface;
use Illuminate\Contracts\View\Factory;

/**
 * Class TemplatesController
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class TemplatesController extends PublicController
{

    /**
     * Return the template.
     *
     * @param Factory                     $views
     * @param Application                 $application
     * @param TemplateRepositoryInterface $templates
     * @return \Illuminate\Contracts\View\View|string
     */
    public function view(Factory $views, Application $application, TemplateRepositoryInterface $templates)
    {
        /* @var TemplateInterface $template */
        if (!$template = $templates->find(array_get($this->route->getAction(), 'template'))) {
            abort(404);
        }

        if (!in_array($template->extension(), ['twig', 'html', 'md'])) {
            return file_get_contents($application->getStoragePath('templates/' . $template->path()));
        }

        return $views->make($template->location());
    }
}
