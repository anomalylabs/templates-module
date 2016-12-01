<?php namespace Anomaly\TemplatesModule\Console;

use Anomaly\TemplatesModule\Console\Command\CleanGroups;
use Anomaly\TemplatesModule\Console\Command\CleanTemplates;
use Anomaly\TemplatesModule\Console\Command\SyncGroups as SyncGroupsCommand;
use Anomaly\TemplatesModule\Console\Command\SyncTemplates as SyncTemplatesCommand;
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
    public function fire()
    {
        $this->dispatch(new SyncGroupsCommand());
        $this->dispatch(new SyncTemplatesCommand());

        $this->dispatch(new CleanGroups());
        $this->dispatch(new CleanTemplates());
    }

    /**
     * Get the options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            //['delete', null, InputOption::VALUE_NONE, 'Delete template files not found in the database.'],
        ];
    }
}
