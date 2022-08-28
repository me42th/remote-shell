<?php
namespace Me42th\RemoteShell\Console\Commands;

use Me42th\RemoteShell\Services as srv;
use Illuminate\Console\Command;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'remote:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remote shell instalation';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(srv\InstallService $install)
    {
       $this->info('here');
       $install->go();
       return 0;
    }
}
