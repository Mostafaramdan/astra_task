<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Table1;
class Table1Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['description' => 'Albumin urine or other source, quantitative, each specimen'],
            ['description' => 'alkaloids, not otherwise specified'],
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
        Table1::insert($data);
    }
}
