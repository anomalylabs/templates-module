<?php namespace Anomaly\TemplatesModule\Template\Command;

use Anomaly\Streams\Platform\Routing\Command\CacheRoutes;
use Anomaly\TemplatesModule\Route\Contract\RouteInterface;
use Anomaly\TemplatesModule\Route\Contract\RouteRepositoryInterface;

/**
 * Class DumpRoutes
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class DumpRoutes
{

    /**
     * Handle the command.
     *
     * @param RouteRepositoryInterface $routes
     */
    public function handle(RouteRepositoryInterface $routes)
    {
        $file = app_storage_path('templates/routes.php');

        if (!is_dir(dirname($file))) {
            mkdir(dirname($file), 0777, true);
        }

        $content = join(
            "\n\n",
            $routes
                ->all()
                ->map(
                    function (RouteInterface $route) {
                        return "Route::any('{$route->getUri()}', [
    'uses'     => 'Anomaly\\TemplatesModule\\Http\\Controller\\TemplatesController@view',
    'template' => {$route->getTemplate()},
]);";
                    }
                )->all()
        );

        file_put_contents($file, "<?php\n\n" . $content);

        dispatch_now(new CacheRoutes());
    }
}
