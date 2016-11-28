<?php namespace Anomaly\TemplatesModule;

use Anomaly\Streams\Platform\Addon\AddonServiceProvider;
use Anomaly\Streams\Platform\Model\Templates\TemplatesGroupsEntryModel;
use Anomaly\Streams\Platform\Model\Templates\TemplatesTemplatesEntryModel;
use Anomaly\TemplatesModule\Group\GroupModel;
use Anomaly\TemplatesModule\Template\TemplateModel;

/**
 * Class TemplatesModuleServiceProvider
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class TemplatesModuleServiceProvider extends AddonServiceProvider
{

    /**
     * The addon bindings.
     *
     * @var array
     */
    protected $bindings = [
        TemplatesGroupsEntryModel::class    => GroupModel::class,
        TemplatesTemplatesEntryModel::class => TemplateModel::class,
    ];
}
