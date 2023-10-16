<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table1 as Model;
class Table1Controller extends Controller
{
    function __construct(public Model $repo)
    {}
    public function index()
    {
        return view('table_1',['records'=>$this->repo->paginate(5)]);
    }
}
