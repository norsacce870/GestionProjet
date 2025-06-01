<?php

namespace App\Http\Controllers;
use App\Models\Palmares;

use Illuminate\Http\Request;

class palmaresPublicController extends Controller
{
    //
    public function index(){
        $palmares = Palmares::all();
        return view('palmaresPublic.index',compact('palmares'));
    }

}
