<?php

namespace App\Http\Controllers;

use App\Models\MainData as Model;
class MainDataController extends Controller
{
    function __construct(public Model $repo)
    {}
    public function index()
    {
        return view('main_data',['records'=>$this->repo->paginate(5)]);
    }
}
