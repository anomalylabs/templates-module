<?php namespace Anomaly\TemplatesModule;

use Anomaly\Streams\Platform\Addon\AddonServiceProvider;
use Anomaly\Streams\Platform\Application\Application;
use Anomaly\Streams\Platform\Model\Templates\TemplatesGroupsEntryModel;
use Anomaly\Streams\Platform\Model\Templates\TemplatesTemplatesEntryModel;
use Anomaly\TemplatesModule\Group\Contract\GroupRepositoryInterface;
use Anomaly\TemplatesModule\Group\GroupModel;
use Anomaly\TemplatesModule\Group\GroupRepository;
use Anomaly\TemplatesModule\Template\Contract\TemplateRepositoryInterface;
use Anomaly\TemplatesModule\Template\TemplateModel;
use Anomaly\TemplatesModule\Template\TemplateRepository;
use Illuminate\Contracts\View\Factory;

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
     * The addon routes.
     *
     * @var array
     */
    protected $routes = [
        'admin/templates'                   => 'Anomaly\TemplatesModule\Http\Controller\Admin\GroupsController@index',
        'admin/templates/choose'            => 'Anomaly\TemplatesModule\Http\Controller\Admin\GroupsController@choose',
        'admin/templates/create'            => 'Anomaly\TemplatesModule\Http\Controller\Admin\GroupsController@create',
        'admin/templates/edit/{id}'         => 'Anomaly\TemplatesModule\Http\Controller\Admin\GroupsController@edit',
        'admin/templates/{group}'           => 'Anomaly\TemplatesModule\Http\Controller\Admin\TemplatesController@index',
        'admin/templates/{group}/create'    => 'Anomaly\TemplatesModule\Http\Controller\Admin\TemplatesController@create',
        'admin/templates/{group}/choose'    => 'Anomaly\TemplatesModule\Http\Controller\Admin\TemplatesController@choose',
        'admin/templates/{group}/edit/{id}' => 'Anomaly\TemplatesModule\Http\Controller\Admin\TemplatesController@edit',
    ];

    /**
     * The addon bindings.
     *
     * @var array
     */
    protected $bindings = [
        TemplatesGroupsEntryModel::class    => GroupModel::class,
        TemplatesTemplatesEntryModel::class => TemplateModel::class,
    ];

    /**
     * The addon singletons.
     *
     * @var array
     */
    protected $singletons = [
        GroupRepositoryInterface::class    => GroupRepository::class,
        TemplateRepositoryInterface::class => TemplateRepository::class,
    ];

    /**
     * Register the addon.
     *
     * @param Factory     $views
     * @param Application $application
     */
    public function register(Factory $views, Application $application)
    {
        $views->addNamespace('templates', $application->getStoragePath('templates'));
    }
}
