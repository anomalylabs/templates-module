<?php namespace Anomaly\TemplatesModule\Template\Command;

use Anomaly\Streams\Platform\Model\EloquentModel;
use Anomaly\TemplatesModule\Template\Contract\TemplateInterface;
use Anomaly\TemplatesModule\Template\Contract\TemplateRepositoryInterface;
use Anomaly\TemplatesModule\Template\TemplatePresenter;

/**
 * Class GetTemplate
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class GetTemplate
{

    /**
     * The identifier.
     *
     * @var mixed
     */
    protected $identifier;

    /**
     * Create a new GetTemplate instance.
     *
     * @param $identifier
     */
    public function __construct($identifier = null)
    {
        $this->identifier = $identifier;
    }

    /**
     * Handle the command.
     *
     * @param  TemplateRepositoryInterface $templates
     * @return TemplateInterface|EloquentModel|null
     */
    public function handle(TemplateRepositoryInterface $templates)
    {
        if (is_numeric($this->identifier)) {
            return $templates->find($this->identifier);
        }

        if (is_string($this->identifier)) {
            return $templates->findByPath($this->identifier);
        }

        if ($this->identifier instanceof TemplateInterface) {
            return $this->identifier;
        }

        if ($this->identifier instanceof TemplatePresenter) {
            return $this->identifier->getObject();
        }

        return null;
    }
}
