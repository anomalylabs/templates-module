<?php namespace Anomaly\TemplatesModule\Http\Controller;

use Illuminate\Support\Facades\Request;
use Anomaly\Streams\Platform\Http\Controller\PublicController;
use Anomaly\TemplatesModule\Route\Contract\RouteRepositoryInterface;

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
     * View an existing entry.
     *
     * @param RouteRepositoryInterface $routes
     * @return \Illuminate\Contracts\View\View|mixed
     */
    public function view(RouteRepositoryInterface $routes)
    {
        /* @var TemplateInterface $template */
        if (!$route = $routes->findBy('uri', Request::path())) {
            abort(404);
        }

        return $this->view->make(
            'anomaly.module.templates::templates/view',
            [
                'entry' => $route->template,
            ]
        );
    }

}
