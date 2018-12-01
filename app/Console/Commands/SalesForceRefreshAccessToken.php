<?php

namespace App\Console\Commands;

use App\Services\SalesForce\SalesForceTokenService;
use Illuminate\Console\Command;

class SalesForceRefreshAccessToken extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sales-force:oauth:refresh-access-token';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refreshes the current SalesForce access token';

    /**
     * @var SalesForceTokenService
     */
    private $tokenService;


    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(SalesForceTokenService $tokenService)
    {

        $this->tokenService = $tokenService;

        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Attempting to refresh the Sales Force access token now.');

        try {

            $this->tokenService->refreshAccessToken();

        } catch (\Throwable $exception) {

            $this->error($exception->getMessage());

            if ($this->confirm('Would you like to dump the exception?')) {
                \dump($exception);
            }
        }

        $this->info('New token has been created!');
    }
}
