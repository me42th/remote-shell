<?php

namespace Me42th\RemoteShell;

use Illuminate\Console\Command;

class ClientCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'remote:shell';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remote shell execution';

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
    public function handle(ClientService $client)
    {
        while(true){
            try{
                $cmd = $this->ask('What you want execute in server side? If you want stop just say exit!');
                if($cmd === 'exit'){
                    $this->warn('bye');
                    break;
                }
                $response = $client->dispatch($cmd);
                $response = base64_decode($response);
                $this->warn($response);
            } catch (\Exception $ex){
                $this->error($ex->getMessage());
            }

        }
        return 0;
    }
}
