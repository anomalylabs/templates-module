<?php namespace Anomaly\TemplatesModule\Template;

use Anomaly\Streams\Platform\Application\Application;
use Anomaly\Streams\Platform\Model\Templates\TemplatesTemplatesEntryModel;
use Anomaly\TemplatesModule\Group\Contract\GroupInterface;
use Anomaly\TemplatesModule\Template\Command\GetExtension;
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
     * Return the file path.
     *
     * @return string
     */
    public function path()
    {
        /* @var Application $application */
        $application = app(Application::class);

        return $application->getStoragePath('templates/' . $this->getPath());
    }

    /**
     * Return the template location.
     *
     * @return string
     */
    public function location()
    {
        $path = $this->getPath();

        if (in_array($this->getType(), ['twig', 'html', 'markdown'])) {
            $path = dirname($path) . '/' . basename($path, '.' . $this->extension());
        }

        return "templates::{$path}";
    }

    /**
     * Return the file extension.
     *
     * @return string
     */
    public function extension()
    {
        return $this->dispatch(new GetExtension($this->getType()));
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
