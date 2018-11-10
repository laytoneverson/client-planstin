<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SalesForceRevokeAccessToken extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sales-force:oauth:revoke-access-token';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Disconnects the application from SalesForce';

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
     * @return mixed
     */
    public function handle()
    {
        //
    }
}
