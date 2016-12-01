<?php namespace Anomaly\TemplatesModule\Route\Contract;

use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\TemplatesModule\Template\Contract\TemplateInterface;

/**
 * Interface RouteInterface
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
interface RouteInterface extends EntryInterface
{

    /**
     * Get the URI.
     *
     * @return string
     */
    public function getUri();

    /**
     * Get the template.
     *
     * @return TemplateInterface
     */
    public function getTemplate();
}
