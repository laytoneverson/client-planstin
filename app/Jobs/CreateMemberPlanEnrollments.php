<?php

namespace App\Jobs;

use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use stdClass;

class CreateMemberPlanEnrollments implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var stdClass
     */
    private $memberRecord;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($memberRecord)
    {

        $this->memberRecord = $memberRecord;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(EntityManagerInterface $entityManager)
    {

    }
}
