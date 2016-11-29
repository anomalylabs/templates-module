<?php namespace Anomaly\TemplatesModule\Template\Contract;

use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\TemplatesModule\Group\Contract\GroupInterface;

/**
 * Interface TemplateInterface
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
interface TemplateInterface extends EntryInterface
{

    /**
     * Get the slug.
     *
     * @return string
     */
    public function getSlug();

    /**
     * Get the type.
     *
     * @return string
     */
    public function getType();

    /**
     * Get the related group.
     *
     * @return GroupInterface
     */
    public function getGroup();
}
