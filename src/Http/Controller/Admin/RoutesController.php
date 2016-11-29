<?php namespace Anomaly\TemplatesModule\Http\Controller\Admin;

use Anomaly\TemplatesModule\Route\Form\RouteFormBuilder;
use Anomaly\TemplatesModule\Route\Table\RouteTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

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
     * @param        $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(RouteFormBuilder $form, $id)
    {
        return $form->render($id);
    }
}
