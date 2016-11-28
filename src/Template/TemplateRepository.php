<?php namespace Anomaly\TemplatesModule\Template;

use Anomaly\TemplatesModule\Template\Contract\TemplateRepositoryInterface;
use Anomaly\Streams\Platform\Entry\EntryRepository;

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
}
