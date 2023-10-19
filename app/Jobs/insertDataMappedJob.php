<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Facades\MatchDataFacade;
use Illuminate\Support\Facades\DB;
use App\Models\{MainData,MappingData};
class insertDataMappedJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(private string $column)
    {
        //
    }


    public function handle(): void
    {
        DB::beginTransaction();
        $data =  $this->getData();

        try {
            foreach($data as $record){

                // check if data already exists
                if(MainData::where('description', $record['column_value'])->exists()) continue;

                MappingData::create([
                    'description'=>$record['column_value'],
                    'reason'=>$record['mapping_table_reason'],
                    'main_data_id'=>MainData::create(['description'=>$record['column_value']])->id,
                ]);
            }
            DB::commit();
        }catch (\Exception $e){
            DB::rollBack();
            throw $e;
        }

    }

    function getData()
    {
        $matching_data= MatchDataFacade::setColumn($this->column)->matching_data();
        return  collect($matching_data->data)->where('percentage', 100);
    }
}
