<?php

namespace App\Http\Controllers;

use App\Models\MatchingData as Model;
class MatchingDataController extends Controller
{
    function __construct(public Model $repo)
    {}
    public function index()
    {
        return view('matching_data',['records'=>$this->repo->paginate(100)]);
    }

    function matching_data_match ()
    {

    }
}
