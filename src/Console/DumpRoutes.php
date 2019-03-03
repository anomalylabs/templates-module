<?php namespace Anomaly\TemplatesModule\Console;

use Anomaly\TemplatesModule\Route\Command\DumpRoutes as DumpRoutesCommand;
use Illuminate\Console\Command;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class DumpRoutes
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class DumpRoutes extends Command
{

    use DispatchesJobs;

    /**
     * The command name.
     *
     * @var string
     */
    protected $name = 'templates:dump';

    /**
     * Fire the command.
     */
    public function handle()
    {
        $this->dispatch(new DumpRoutesCommand());
    }
}
