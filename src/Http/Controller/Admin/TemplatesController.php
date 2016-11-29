<?php namespace Anomaly\TemplatesModule\Http\Controller\Admin;

use Anomaly\EditorFieldType\EditorFieldType;
use Anomaly\Streams\Platform\Http\Controller\AdminController;
use Anomaly\TemplatesModule\Group\Contract\GroupInterface;
use Anomaly\TemplatesModule\Group\Contract\GroupRepositoryInterface;
use Anomaly\TemplatesModule\Template\Form\TemplateFormBuilder;
use Anomaly\TemplatesModule\Template\Table\TemplateTableBuilder;
use Illuminate\Contracts\Config\Repository;

/**
 * Class TemplatesController
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class TemplatesController extends AdminController
{

    /**
     * The group repository.
     *
     * @var GroupRepositoryInterface
     */
    protected $groups;

    /**
     * Create a new TemplatesController instance.
     *
     * @param GroupRepositoryInterface $groups
     */
    public function __construct(GroupRepositoryInterface $groups)
    {
        $this->groups = $groups;

        parent::__construct();
    }

    /**
     * Display an index of existing entries.
     *
     * @param TemplateTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(TemplateTableBuilder $table)
    {
        /* @var GroupInterface $group */
        if (!$group = $this->groups->findBySlug($this->route->getParameter('group'))) {
            return $this->redirect->to('admin/templates');
        }

        return $table
            ->setGroup($group)
            ->render();
    }

    /**
     * Choose a group to view templates for.
     *
     * @param EditorFieldType $editor
     * @param Repository      $config
     * @return \Illuminate\Contracts\View\View|mixed
     */
    public function choose(EditorFieldType $editor, Repository $config)
    {
        return $this->view->make(
            'anomaly.module.templates::admin/templates/choose',
            [
                'types' => array_combine(
                    array_keys($config->get($editor->getNamespace('editor.modes'))),
                    array_map(
                        function ($mode) {
                            return $mode['name'];
                        },
                        $config->get($editor->getNamespace('editor.modes'))
                    )
                ),
            ]
        );
    }

    /**
     * Create a new entry.
     *
     * @param TemplateFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(TemplateFormBuilder $form)
    {
        /* @var GroupInterface $group */
        if (!$group = $this->groups->findBySlug($this->route->getParameter('group'))) {
            return $this->redirect->to('admin/templates');
        }

        $type = $this->request->get('type');

        return $form
            ->setGroup($group)
            ->setType($type)
            ->render();
    }

    /**
     * Edit an existing entry.
     *
     * @param TemplateFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(TemplateFormBuilder $form)
    {
        return $form->render($this->route->getParameter('id'));
    }
}
