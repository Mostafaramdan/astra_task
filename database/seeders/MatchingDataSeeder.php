<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MatchingData;
class MatchingDataSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
             'Albumin',
             'urine',
             'alkaloids',
             'not',
             'alkaloids',
             'otherwise',
             'specified',
             'barbiturates',
             'Benzodiazepines',
             '1-12',
             'cocaine',
             'metabolite',
             'heroin',
             'skeletal',
             'relaxants',
             'muscle',
             'Tramadol',
             'natural',
             'cannabinoids,',
             'more',
             'specified; 7 or more',
             'qualitative or quantitative',
             'Drug(s) or substance(s)',
             'releasing',
             'luteinizing',
             '(LRH)',
             'factor',
        ];
        foreach($data as $d)
        MatchingData::create([
            'x'=> $data[rand(0,count($data)-1)] . $data[rand(0,count($data)-1)],
            'y'=> $data[rand(0,count($data)-1)] . $data[rand(0,count($data)-1)],
            'z'=> $data[rand(0,count($data)-1)] . $data[rand(0,count($data)-1)]
        ]);
    }
}
