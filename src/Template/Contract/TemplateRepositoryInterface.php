<?php namespace Anomaly\TemplatesModule\Template\Contract;

use Anomaly\Streams\Platform\Entry\Contract\EntryRepositoryInterface;
use Anomaly\TemplatesModule\Template\TemplateCollection;

/**
 * Interface TemplateRepositoryInterface
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
interface TemplateRepositoryInterface extends EntryRepositoryInterface
{

    /**
     * Find a template by it's path.
     *
     * @param $path
     * @return TemplateInterface|null
     */
    public function findByPath($path);

    /**
     * Return all overriding templates.
     *
     * @return TemplateCollection
     */
    public function overrides();

}
