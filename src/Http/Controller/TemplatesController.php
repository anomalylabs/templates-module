<?php namespace Anomaly\TemplatesModule\Http\Controller;

use Anomaly\Streams\Platform\Http\Controller\PublicController;
use Anomaly\TemplatesModule\Template\Contract\TemplateInterface;
use Anomaly\TemplatesModule\Template\Contract\TemplateRepositoryInterface;

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
     * @param TemplateRepositoryInterface $templates
     * @param $id
     * @return \Illuminate\Contracts\View\View|mixed
     */
    public function view(TemplateRepositoryInterface $templates)
    {
        /* @var TemplateInterface $template */
        if (!$template = $templates->find(request()->route()->getAction('template'))) {
            abort(404);
        }

        return $this->view->make(
            'anomaly.module.templates::templates/view',
            [
                'entry' => $template,
            ]
        );
    }

}
