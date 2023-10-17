<?php
namespace App\Imports;

use App\Models\MappingData;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;

class MappingDataImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            MappingData::create([
                'description' => $row['description'],
                'main_data_id' => $row['main_data_id'],
                'reason' => $row['reason'],
                // Adjust these keys based on your actual CSV columns
            ]);
        }
    }
}
