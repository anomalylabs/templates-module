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
        'templates' => [
            'buttons' => [
                'new_template' => [
                    'data-toggle' => 'modal',
                    'data-target' => '#modal',
                    'href'        => 'admin/templates/choose',
                ],
                'sync'         => [
                    'type' => 'info',
                    'icon' => 'refresh',
                    'href' => 'admin/templates/sync',
                ],
            ],
        ],
        'groups'    => [
            'buttons' => [
                'new_group',
                'sync' => [
                    'type' => 'info',
                    'icon' => 'refresh',
                    'href' => 'admin/templates/sync',
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
