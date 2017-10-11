<?php namespace Anomaly\TemplatesModule\Http\Controller\Admin;

use Anomaly\Streams\Platform\Console\Kernel;
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
     * @param                      $group
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(TemplateTableBuilder $table, $group)
    {
        /* @var GroupInterface $group */
        if (!$group = $this->groups->findBySlug($group)) {
            return $this->redirect->to('admin/templates');
        }

        return $table
            ->setGroup($group)
            ->render();
    }

    /**
     * Choose a group to view templates for.
     *
     * @param Repository $config
     * @return \Illuminate\Contracts\View\View|mixed
     */
    public function choose(Repository $config)
    {
        $types = $config->get('anomaly.module.templates::templates.types');

        return $this->view->make(
            'anomaly.module.templates::admin/templates/choose',
            [
                'types' => $types,
            ]
        );
    }

    /**
     * Create a new entry.
     *
     * @param TemplateFormBuilder $form
     * @param                     $group
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(TemplateFormBuilder $form, $group)
    {
        /* @var GroupInterface $group */
        if (!$group = $this->groups->findBySlug($group)) {
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
     * @param                     $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(TemplateFormBuilder $form, $id)
    {
        return $form->render($id);
    }

    /**
     * Sync templates to the filesystem.
     *
     * @param Kernel $console
     */
    public function sync(Kernel $console)
    {
        $console->call('templates:sync');
        $console->call('templates:push');

        $this->messages->success('anomaly.module.templates::message.synced');

        return $this->redirect->back();
    }
}
