<?php namespace Anomaly\TemplatesModule\Http\Controller\Admin;

use Anomaly\Streams\Platform\Http\Controller\AdminController;
use Anomaly\TemplatesModule\Group\Contract\GroupRepositoryInterface;
use Anomaly\TemplatesModule\Group\Form\GroupFormBuilder;
use Anomaly\TemplatesModule\Group\Table\GroupTableBuilder;

/**
 * Class GroupsController
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
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
     * Choose a group to view templates for.
     *
     * @param GroupRepositoryInterface $groups
     * @return \Illuminate\Contracts\View\View|mixed
     */
    public function choose(GroupRepositoryInterface $groups)
    {
        return $this->view->make(
            'anomaly.module.templates::admin/groups/choose',
            [
                'groups' => $groups->all(),
            ]
        );
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
     * @param                  $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(GroupFormBuilder $form, $id)
    {
        return $form->render($id);
    }
}
