<?php namespace Anomaly\TemplatesModule\Template;

use Anomaly\Streams\Platform\Entry\EntryRepository;
use Anomaly\TemplatesModule\Template\Contract\TemplateInterface;
use Anomaly\TemplatesModule\Template\Contract\TemplateRepositoryInterface;

/**
 * Class TemplateRepository
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class TemplateRepository extends EntryRepository implements TemplateRepositoryInterface
{

    /**
     * The entry model.
     *
     * @var TemplateModel
     */
    protected $model;

    /**
     * Create a new TemplateRepository instance.
     *
     * @param TemplateModel $model
     */
    public function __construct(TemplateModel $model)
    {
        $this->model = $model;
    }

    /**
     * Find a template by it's path.
     *
     * @param $path
     * @return TemplateInterface|null
     */
    public function findByPath($path)
    {
        return $this->model->where('path', $path)->first();
    }
}
