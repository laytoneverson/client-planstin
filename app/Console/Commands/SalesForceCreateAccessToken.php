<?php

namespace App\Console\Commands;

use App\Services\SalesForce\SalesForceTokenService;
use Illuminate\Console\Command;

class SalesForceCreateAccessToken extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sales-force:oauth:create-access-token';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Authenticate and authorize this application with the configured SalesForce instance';

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
        $authCodeUrl = $this->tokenService->getAuthUrl();

        $this->info(\sprintf(
            'Please navigate to %s and enter your authorization code below:',
            $authCodeUrl
        ));

        $authCode = $this->ask('Enter Authorization Code:');

        try {

            $result = $this->tokenService->requestAccessToken($authCode);

        } catch (\Throwable $exception) {

            $this->error($exception->getMessage());

            if ($this->confirm('Would you like to dump the exception?')) {
                \dump($exception);
            }
        }

        $this->info('New token has been created!');
    }
}
