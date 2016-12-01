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
     * Return the editor mode.
     *
     * @return string
     */
    public function editor();

    /**
     * Get the slug.
     *
     * @return string
     */
    public function getSlug();

    /**
     * Get the extension.
     *
     * @return string
     */
    public function getExtension();

    /**
     * Get the related group.
     *
     * @return GroupInterface
     */
    public function getGroup();

    /**
     * Get the related group's ID.
     *
     * @return int
     */
    public function getGroupId();
}
