<?php namespace Anomaly\TemplatesModule\Route\Form;

use Anomaly\Streams\Platform\Ui\Form\FormBuilder;

/**
 * Class RouteFormBuilder
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class RouteFormBuilder extends FormBuilder
{

    /**
     * The form buttons.
     *
     * @var array
     */
    protected $buttons = [
        'cancel',
        'view' => [
            'enabled' => 'edit',
            'target'  => '_blank',
            'href'    => 'admin/templates/routes/view/{request.route.parameters.id}',
        ],
    ];

}
