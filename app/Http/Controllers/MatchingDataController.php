<?php

namespace App\Http\Controllers;

use App\Models\MatchingData as Model;
use App\Facades\MatchDataFacade;
use Illuminate\Http\Request;
class MatchingDataController extends Controller
{
    function __construct(public Model $repo)
    {}
    public function index()
    {
        return view('matching_data',['records'=>$this->repo->paginate(100)]);
    }

    function matching_data_match (Request $request)
    {
        return view ('match_data_result',['data'=>MatchDataFacade::setColumn($request->column)->matching_data()]);
    }
}
