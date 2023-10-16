<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table3 as Model;
class Table3Controller extends Controller
{
    function __construct(public Model $repo)
    {}
    public function index()
    {
        return view('table_3',['records'=>$this->repo->paginate(100)]);
    }
}
