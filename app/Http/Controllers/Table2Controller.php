<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table2 as Model;
class Table2Controller extends Controller
{
    function __construct(public Model $repo)
    {}
    public function index()
    {
        return view('table_2',['records'=>$this->repo->paginate(100)]);
    }
}
