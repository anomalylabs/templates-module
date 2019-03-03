<?php namespace Anomaly\TemplatesModule;

use Anomaly\SelectFieldType\Event\SetLayoutOptions;
use Anomaly\Streams\Platform\Addon\AddonServiceProvider;
use Anomaly\Streams\Platform\Application\Application;
use Anomaly\Streams\Platform\Asset\AssetPaths;
use Anomaly\Streams\Platform\Event\Ready;
use Anomaly\Streams\Platform\Model\Templates\TemplatesGroupsEntryModel;
use Anomaly\Streams\Platform\Model\Templates\TemplatesRoutesEntryModel;
use Anomaly\Streams\Platform\Model\Templates\TemplatesTemplatesEntryModel;
use Anomaly\Streams\Platform\Version\VersionRouter;
use Anomaly\TemplatesModule\Console\CleanTemplates;
use Anomaly\TemplatesModule\Console\PushTemplates;
use Anomaly\TemplatesModule\Console\SyncTemplates;
use Anomaly\TemplatesModule\Group\Contract\GroupRepositoryInterface;
use Anomaly\TemplatesModule\Group\GroupModel;
use Anomaly\TemplatesModule\Group\GroupRepository;
use Anomaly\TemplatesModule\Http\Controller\Admin\VersionsController;
use Anomaly\TemplatesModule\Route\Contract\RouteRepositoryInterface;
use Anomaly\TemplatesModule\Route\RouteModel;
use Anomaly\TemplatesModule\Route\RouteRepository;
use Anomaly\TemplatesModule\Console\DumpRoutes;
use Anomaly\TemplatesModule\Template\Contract\TemplateRepositoryInterface;
use Anomaly\TemplatesModule\Template\Listener\AddTemplateOptions;
use Anomaly\TemplatesModule\Template\Listener\RegisterOverrides;
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
     * The addon plugins.
     *
     * @var array
     */
    protected $plugins = [
        TemplatesModulePlugin::class,
    ];

    /**
     * The addon commands.
     *
     * @var array
     */
    protected $commands = [
        DumpRoutes::class,
        SyncTemplates::class,
        PushTemplates::class,
        CleanTemplates::class,
    ];

    /**
     * The addon listeners.
     *
     * @var array
     */
    protected $listeners = [
        Ready::class            => [
            RegisterOverrides::class,
        ],
        SetLayoutOptions::class => [
            AddTemplateOptions::class,
        ],
    ];

    /**
     * The addon bindings.
     *
     * @var array
     */
    protected $bindings = [
        TemplatesGroupsEntryModel::class    => GroupModel::class,
        TemplatesRoutesEntryModel::class    => RouteModel::class,
        TemplatesTemplatesEntryModel::class => TemplateModel::class,
    ];

    /**
     * The addon singletons.
     *
     * @var array
     */
    protected $singletons = [
        GroupRepositoryInterface::class    => GroupRepository::class,
        RouteRepositoryInterface::class    => RouteRepository::class,
        TemplateRepositoryInterface::class => TemplateRepository::class,
    ];

    /**
     * The addon routes.
     *
     * @var array
     */
    protected $routes = [
        'templates/view/{id}' => [
            'as'   => 'anomaly.module.templates::templates.view',
            'uses' => 'Anomaly\TemplatesModule\Http\Controller\TemplatesController@view',
        ],
    ];

    /**
     * Register the addon.
     *
     * @param Factory $views
     * @param AssetPaths $assets
     * @param Application $application
     */
    public function register(Factory $views, AssetPaths $assets, Application $application)
    {
        $assets->addPath('templates', $application->getStoragePath('templates'));
        $views->addNamespace('templates', $application->getStoragePath('templates'));
    }

    /**
     * Map template routes.
     *
     * @param VersionRouter $versions
     */
    public function map(VersionRouter $versions)
    {
        $versions->route($this->addon, VersionsController::class, 'admin/templates/{group}');

        if (!file_exists($routes = app_storage_path('templates/routes.php'))) {
            dispatch_now(new DumpRoutes());
        }

        require $routes;
    }
}
