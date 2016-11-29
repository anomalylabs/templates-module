<?php namespace Anomaly\TemplatesModule;

use Anomaly\Streams\Platform\Addon\Module\Module;

/**
 * Class TemplatesModule
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class TemplatesModule extends Module
{

    /**
     * The addon icon.
     *
     * @var string
     */
    protected $icon = 'fa fa-object-ungroup';

    /**
     * The module sections.
     *
     * @var array
     */
    protected $sections = [
        'groups'    => [
            'buttons' => [
                'new_group',
            ],
        ],
        'templates' => [
            'data-toggle' => 'modal',
            'data-target' => '#modal',
            'data-href'   => 'admin/templates/{request.route.parameters.group}',
            'href'        => 'admin/templates/choose',

            'buttons' => [
                'new_template' => [
                    'data-toggle' => 'modal',
                    'data-target' => '#modal',
                    'href'        => 'admin/templates/{request.route.parameters.group}/choose',
                ],
            ],
        ],
        'routes'    => [
            'buttons' => [
                'add_route',
            ],
        ],
    ];
}
