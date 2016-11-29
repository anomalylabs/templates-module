<?php namespace Anomaly\TemplatesModule\Http\Controller\Admin;

use Anomaly\Streams\Platform\Http\Controller\AdminController;
use Anomaly\TemplatesModule\Route\Contract\RouteRepositoryInterface;
use Anomaly\TemplatesModule\Route\Form\RouteFormBuilder;
use Anomaly\TemplatesModule\Route\Table\RouteTableBuilder;

/**
 * Class RoutesController
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class RoutesController extends AdminController
{

    /**
     * Display an index of existing entries.
     *
     * @param RouteTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(RouteTableBuilder $table)
    {
        return $table->render();
    }

    /**
     * Create a new entry.
     *
     * @param RouteFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(RouteFormBuilder $form)
    {
        return $form->render();
    }

    /**
     * Edit an existing entry.
     *
     * @param RouteFormBuilder $form
     * @param                  $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(RouteFormBuilder $form, $id)
    {
        return $form->render($id);
    }

    /**
     * Return the route view.
     *
     * @param RouteRepositoryInterface $routes
     * @return \Illuminate\Http\RedirectResponse
     */
    public function view(RouteRepositoryInterface $routes)
    {
        if (!$route = $routes->find($this->route->getParameter('id'))) {
            abort(404);
        }

        return $this->redirect->to($route->uri);
    }
}
