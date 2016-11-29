<?php namespace Anomaly\TemplatesModule;

use Anomaly\Streams\Platform\Addon\AddonServiceProvider;
use Anomaly\Streams\Platform\Application\Application;
use Anomaly\Streams\Platform\Asset\AssetPaths;
use Anomaly\Streams\Platform\Model\Templates\TemplatesGroupsEntryModel;
use Anomaly\Streams\Platform\Model\Templates\TemplatesRoutesEntryModel;
use Anomaly\Streams\Platform\Model\Templates\TemplatesTemplatesEntryModel;
use Anomaly\TemplatesModule\Group\Contract\GroupRepositoryInterface;
use Anomaly\TemplatesModule\Group\GroupModel;
use Anomaly\TemplatesModule\Group\GroupRepository;
use Anomaly\TemplatesModule\Route\Contract\RouteInterface;
use Anomaly\TemplatesModule\Route\Contract\RouteRepositoryInterface;
use Anomaly\TemplatesModule\Route\RouteModel;
use Anomaly\TemplatesModule\Route\RouteRepository;
use Anomaly\TemplatesModule\Template\Contract\TemplateRepositoryInterface;
use Anomaly\TemplatesModule\Template\TemplateModel;
use Anomaly\TemplatesModule\Template\TemplateRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Routing\Router;

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
        'admin/templates/routes'            => 'Anomaly\TemplatesModule\Http\Controller\Admin\RoutesController@index',
        'admin/templates/routes/create'     => 'Anomaly\TemplatesModule\Http\Controller\Admin\RoutesController@create',
        'admin/templates/routes/edit/{id}'  => 'Anomaly\TemplatesModule\Http\Controller\Admin\RoutesController@edit',
        'admin/templates/routes/view/{id}'  => 'Anomaly\TemplatesModule\Http\Controller\Admin\RoutesController@view',
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
     * Register the addon.
     *
     * @param Factory     $views
     * @param AssetPaths  $assets
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
     * @param Router                   $router
     * @param RouteRepositoryInterface $routes
     */
    public function map(Router $router, RouteRepositoryInterface $routes)
    {
        foreach ($routes->all() as $route) {

            /* @var RouteInterface $route */
            $router->any(
                $route->uri,
                function (Factory $views) use ($route) {

                    $template = $route->getTemplate();
                    $group    = $template->getGroup();

                    return $views->make('templates::' . $group->getSlug() . '/' . $template->getSlug());
                }
            );
        }
    }
}
