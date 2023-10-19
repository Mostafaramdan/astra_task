<?php

namespace App\Action;

use App\Models\{MainData, MappingData, MatchingData};
class MatchDataActions
{
    public string $column;
    public array $data = [];
    function setColumn(string $column)
    {
        $this->column = $column;
        return $this;
    }

    function matching_data () {
        MatchingData::chunk(50,function ($records){   // using chunks to avoid memory error
            foreach($records as $match_record)
            {
                $keywords = $this->extractKeywords($match_record[$this->column]); // using keywords that will be used for matching
                MappingData::with('main_data')
                ->where(function ($query) use ($keywords) {
                    foreach ($keywords as $keyword) {
                        $query->orWhereRaw("UPPER(description) LIKE ?", ['%' . strtoupper($keyword) . '%']); // for case-insensitive search
                    }
                })
                ->chunk(50,function ($records) use ($match_record,$keywords){
                    foreach($records as $mapping_record)
                    {
                        // result table
                        $this->data[]=[
                            'matching_table_id'=> $match_record->id,
                            'column_value'=> $match_record[$this->column],
                            'mapping_table_id'=> $mapping_record->id,
                            'mapping_table_reason'=> $mapping_record->reason,
                            'main_table_id'=> $mapping_record->main_data_id,
                            'percentage'=> $this->matchingPercentage($keywords,$mapping_record->description),
                        ];
                    }
                });

            }
        });
        return $this;
    }

    function extractKeywords(string $text): array
    {
        // Replace non-alphanumeric characters with spaces
        $cleanedText = preg_replace('/[^a-zA-Z0-9]+/', ' ', $text);

        // Use a regular expression to split the cleaned text by spaces
        $keywords = preg_split('/\s+/', $cleanedText);

        // Remove empty values and trim each keyword
        $keywords = array_map('trim', array_filter($keywords));

        // Remove duplicates
        $keywords =  array_unique($keywords);
        return $this->removeNotImportantWords($keywords);
    }

    function removeNotImportantWords(array $words): array
    {
        // Remove words that are not important, these words not indicating any information
        $NotImportant=[
            "eg",
            "and",
            "or",
            "the",
            "of",
            "a",
            "to",
            "in",
            "is",
            "for",
            "with",
            "on",
            "by",
            "as",
            "from",
            "at",
            "an",
            "that",
        ];

        foreach($NotImportant as $word)
        {
            unset($words[array_search($word, $words)]);
        }
        return $words;
    }
    function matchingPercentage(array $words, $keyword): float
    {
        $count = 0;

        foreach ($words as $word) {
            // Check if the keyword is present in the text
            if(strpos(strtoupper($keyword), strtoupper($word)) !== false) {
                $count++;
            }
        }

            // Avoid division by zero
        $totalWords = count($words);
        $percentage = $count > 0 ? ($count / $totalWords) * 100 : 0;
        return round($percentage, 2);
    }

    function checkMAtchingTable3(string $column)
    {
        $cols=['x','y','z'];
        unset($cols[array_search($column, $cols)]); // unset column to make comparison with others two columns only
        $records = MatchingData::all();
        foreach($records as $record)
        {
            $check = 0;
            foreach($cols as $col){
                if(strpos(strtoupper($record->{$column}), strtoupper($record->{$col})) !== false) {
                    $check++;
                }
            }
            $record->matching_result = $check;
        }
        return $records;
    }
}
