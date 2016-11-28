<?php namespace Anomaly\TemplatesModule\Http\Controller\Admin;

use Anomaly\TemplatesModule\Group\Form\GroupFormBuilder;
use Anomaly\TemplatesModule\Group\Table\GroupTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

class GroupsController extends AdminController
{

    /**
     * Display an index of existing entries.
     *
     * @param GroupTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(GroupTableBuilder $table)
    {
        return $table->render();
    }

    /**
     * Create a new entry.
     *
     * @param GroupFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(GroupFormBuilder $form)
    {
        return $form->render();
    }

    /**
     * Edit an existing entry.
     *
     * @param GroupFormBuilder $form
     * @param        $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(GroupFormBuilder $form, $id)
    {
        return $form->render($id);
    }
}
