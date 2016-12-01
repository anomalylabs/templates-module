<?php namespace Anomaly\TemplatesModule\Template;

use Anomaly\Streams\Platform\Model\Templates\TemplatesTemplatesEntryModel;
use Anomaly\TemplatesModule\Group\Contract\GroupInterface;
use Anomaly\TemplatesModule\Template\Contract\TemplateInterface;

/**
 * Class TemplateModel
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class TemplateModel extends TemplatesTemplatesEntryModel implements TemplateInterface
{

    /**
     * Return the template path.
     *
     * @return string
     */
    public function path()
    {
        $path = $this->getPath();

        if (in_array($this->getType(), ['twig', 'md', 'html'])) {
            $path = dirname($path) . '/' . basename($path, '.' . $this->extension());
        }

        return $path;
    }

    /**
     * Return the file extension.
     *
     * @return string
     */
    public function extension()
    {
        return pathinfo($this->getPath(), PATHINFO_EXTENSION);
    }

    /**
     * Return the template location.
     *
     * @return string
     */
    public function location()
    {
        return "templates::{$this->path()}";
    }

    /**
     * Get the path.
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Get the slug.
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Get the type.
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Get the related group.
     *
     * @return GroupInterface
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * Get the related group ID.
     *
     * @return int
     */
    public function getGroupId()
    {
        return $this->group_id;
    }
}
