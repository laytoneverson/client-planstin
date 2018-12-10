<?php

namespace App\Console\Commands;

use App\Services\SalesForce\ApiCall\GetObjectMetadata;
use App\Services\SalesForce\Dto\GetObjectMetadataDto;
use Illuminate\Console\Command;

class SalesForceGetObjectMetaData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sales-force:api:get-object-metatdata';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pull object metadata';

    /**
     * @var GetObjectMetadata
     */
    private $getObjectMetadata;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(GetObjectMetadata $getObjectMetadata)
    {
        $this->getObjectMetadata = $getObjectMetadata;

        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $object = $this->ask(
            'What object would you like to pull metadata for (leave blank for all objects)'
        );

        $describe = ($object)
            ? $this->confirm('Would you like to describe this object: '. $object)
            : false;

        try {

            $dto = new GetObjectMetadataDto($object);
            $dto->setDescribeObject($describe);
            $this->getObjectMetadata->setData($dto);
            $this->getObjectMetadata->execute();
            $data = $dto->getReturnData();

            if ($describe) {
                $this->sayRelationships($data->childRelationships);
                $this->sayFields($data->fields);
                $this->sayUrls($data->urls);
            }

        } catch (\Throwable $exception) {

            $this->error($exception->getMessage());

            if ($this->confirm('Would you like to dump the exception?')) {
                \dump($exception);
            }
        }

        $this->info('Command Complete');
    }

    private function sayUrls($urls)
    {
        $headers = ['Label', 'URL'];

        $rows = [];
        foreach((array)$urls as $k=>$v) {
            $rows[] = [$k, $v];
        }
        $this->table($headers, $rows);
    }

    private function sayFields(array $fields)
    {
        $headers = ['Type', 'Name', 'Label', 'Length', 'Default Value', 'Relationship Name', 'Custom', 'Unique'];

        $rows = [];
        foreach ($fields as $f) {
            $rows[] =[
                $f->type,
                $f->name,
                $f->label,
                $f->length,
                $f->defaultValue,
                $f->relationshipName,
                $f->custom,
                $f->unique
            ];
        }

        $this->table($headers, $rows);
    }

    private function sayRelationships(array $relationships)
    {
        $headers = ['Child Object', 'Field', 'Relationship Name'];

        $rows = [];
        foreach($relationships as $relationship) {
            $rows[] = [
                $relationship->childSObject,
                $relationship->field,
                $relationship->relationshipName
            ];
        }

        $this->table($headers, $rows);
    }
}
