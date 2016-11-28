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
    protected $icon = 'glyphicons glyphicons-more-items';

    /**
     * The module sections.
     *
     * @var array
     */
    protected $sections = [
        'templates' => [
            'buttons' => [
                'new_template',
            ],
        ],
        'groups'    => [
            'buttons' => [
                'new_group',
            ],
        ],
    ];
}
