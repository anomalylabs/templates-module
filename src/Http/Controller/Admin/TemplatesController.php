<?php namespace Anomaly\TemplatesModule\Http\Controller\Admin;

use Anomaly\Streams\Platform\Console\Kernel;
use Anomaly\Streams\Platform\Http\Controller\AdminController;
use Anomaly\TemplatesModule\Template\Contract\TemplateInterface;
use Anomaly\TemplatesModule\Template\Contract\TemplateRepositoryInterface;
use Anomaly\TemplatesModule\Template\Form\TemplateFormBuilder;
use Anomaly\TemplatesModule\Template\Table\TemplateTableBuilder;

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
     * Display an index of existing entries.
     *
     * @param TemplateTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(TemplateTableBuilder $table)
    {
        return $table->render();
    }

    /**
     * Choose a group to view templates for.
     *
     * @return \Illuminate\Contracts\View\View|mixed
     */
    public function choose()
    {
        $types = config('anomaly.module.templates::templates.types');

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
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(TemplateFormBuilder $form)
    {

        $type = $this->request->get('type');

        return $form
            ->setType($type)
            ->render();
    }

    /**
     * Edit an existing entry.
     *
     * @param TemplateFormBuilder $form
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(TemplateFormBuilder $form, $id)
    {
        return $form->render($id);
    }

    /**
     * View an existing entry.
     *
     * @param TemplateRepositoryInterface $templates
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function view(TemplateRepositoryInterface $templates, $id)
    {
        /* @var TemplateInterface $template */
        if (!$template = $templates->find($id)) {
            abort(404);
        }

        return $this->redirect->to($template->route('view'));
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
