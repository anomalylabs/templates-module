<?php namespace Anomaly\TemplatesModule\Console;

use Anomaly\TemplatesModule\Console\Command\CleanGroups as CleanGroupsCommand;
use Anomaly\TemplatesModule\Console\Command\CleanTemplates as CleanTemplatesCommand;
use Anomaly\TemplatesModule\Template\Command\CheckDirectory;
use Illuminate\Console\Command;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Symfony\Component\Console\Input\InputOption;

/**
 * Class CleanTemplates
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class CleanTemplates extends Command
{

    use DispatchesJobs;

    /**
     * The command name.
     *
     * @var string
     */
    protected $name = 'templates:clean';

    /**
     * Fire the command.
     */
    public function fire()
    {
        $this->dispatch(new CleanTemplatesCommand());
        $this->dispatch(new CleanGroupsCommand());
    }
}
