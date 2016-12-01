<?php namespace Anomaly\TemplatesModule\Group\Contract;

use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\TemplatesModule\Template\TemplateCollection;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Interface GroupInterface
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
interface GroupInterface extends EntryInterface
{

    /**
     * Get the slug.
     *
     * @return string
     */
    public function getSlug();

    /**
     * Get the related templates.
     *
     * @return TemplateCollection
     */
    public function getTemplates();

    /**
     * Return the templates relation.
     *
     * @return HasMany
     */
    public function templates();
}
