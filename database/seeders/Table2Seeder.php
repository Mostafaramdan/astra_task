<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Table2;
class Table2Seeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['description' => 'Albumin urine '],
            ['description' => 'alkaloids , not otherwise specified'],
            ['description' => 'barbiturates'],
            ['description' => 'Benzodiazepines; 1-12'],
            ['description' => 'cocaine'],
            ['description' => 'heroin metabolite'],
            ['description' => 'skeletal muscle relaxants'],
            ['description' => 'Tramadol'],
            ['description' => 'cannabinoids, natural'],
            ['description' => 'Drug(s) or substance(s), definitive, qualitative or quantitative, not otherwise specified; 7 or more'],
            ['description' => 'luteinizing releasing factor (LRH)'],
        ];
        $counter=1;
        $reasons = ['A','B','C'];
        foreach($data as $d)
        Table2::create([
            'description' => $d['description'],
            'table_1_id' => $counter++,
            'reason'=> $reasons[rand(0,2)]
        ]);
    }
}
