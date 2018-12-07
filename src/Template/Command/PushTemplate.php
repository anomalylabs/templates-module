<?php namespace Anomaly\TemplatesModule\Template\Command;

use Anomaly\Streams\Platform\Application\Application;
use Anomaly\TemplatesModule\Template\Contract\TemplateInterface;
use Anomaly\TemplatesModule\Template\TemplateModel;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class PushTemplate
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class PushTemplate
{

    use DispatchesJobs;

    /**
     * The template instance.
     *
     * @var TemplateInterface|TemplateModel
     */
    protected $template;

    /**
     * Create a new PushTemplate instance.
     *
     * @param TemplateInterface $template
     */
    public function __construct(TemplateInterface $template)
    {
        $this->template = $template;
    }

    /**
     * Handle the command.
     *
     * @param Application $application
     */
    public function handle(Application $application)
    {
        $path = $application->getStoragePath('templates/' . $this->template->getPath());

        /**
         * Check if the base templates
         * directory exists and make it.
         */
        if (!is_dir($templates = dirname(dirname($path)))) {
            mkdir($templates);
        }

        /**
         * Check if the template's group
         * directory exists and make it.
         */
        if (!is_dir($group = dirname($path))) {
            mkdir($group);
        }

        file_put_contents($path, $this->template->getContent());
    }

}
