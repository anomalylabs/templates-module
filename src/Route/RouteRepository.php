<?php namespace Anomaly\TemplatesModule\Route;

use Anomaly\TemplatesModule\Route\Contract\RouteRepositoryInterface;
use Anomaly\Streams\Platform\Entry\EntryRepository;

class RouteRepository extends EntryRepository implements RouteRepositoryInterface
{

    /**
     * The entry model.
     *
     * @var RouteModel
     */
    protected $model;

    /**
     * Create a new RouteRepository instance.
     *
     * @param RouteModel $model
     */
    public function __construct(RouteModel $model)
    {
        $this->model = $model;
    }
}
