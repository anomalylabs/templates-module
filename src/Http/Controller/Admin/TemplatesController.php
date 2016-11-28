<?php namespace Anomaly\TemplatesModule\Http\Controller\Admin;

use Anomaly\TemplatesModule\Template\Form\TemplateFormBuilder;
use Anomaly\TemplatesModule\Template\Table\TemplateTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

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
     * Create a new entry.
     *
     * @param TemplateFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(TemplateFormBuilder $form)
    {
        return $form->render();
    }

    /**
     * Edit an existing entry.
     *
     * @param TemplateFormBuilder $form
     * @param        $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(TemplateFormBuilder $form, $id)
    {
        return $form->render($id);
    }
}
