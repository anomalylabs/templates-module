<?php namespace Anomaly\TemplatesModule;

use Anomaly\Streams\Platform\Addon\Plugin\Plugin;
use Anomaly\TemplatesModule\Template\Command\GetTemplate;

/**
 * Class TemplatesModulePlugin
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class TemplatesModulePlugin extends Plugin
{

    /**
     * Get the functions.
     *
     * @return array
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction(
                'template',
                function ($identifier) {
                    return $this->dispatch(new GetTemplate($identifier));
                }
            ),
        ];
    }
}
