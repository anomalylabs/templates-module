<?php namespace Anomaly\TemplatesModule\Console;

use Anomaly\TemplatesModule\Console\Command\SyncGroups as SyncGroupsCommand;
use Anomaly\TemplatesModule\Console\Command\SyncTemplates as SyncTemplatesCommand;
use Anomaly\TemplatesModule\Template\Command\CheckDirectory;
use Illuminate\Console\Command;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Symfony\Component\Console\Input\InputOption;

/**
 * Class SyncTemplates
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class SyncTemplates extends Command
{

    use DispatchesJobs;

    /**
     * The command name.
     *
     * @var string
     */
    protected $name = 'templates:sync';

    /**
     * Fire the command.
     */
    public function handle()
    {
        $this->dispatch(new CheckDirectory());
        $this->dispatch(new SyncGroupsCommand());
        $this->dispatch(new SyncTemplatesCommand());
    }
}
