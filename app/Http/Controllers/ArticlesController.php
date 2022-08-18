<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articles;

class ArticlesController extends Controller
{
    
    function getList(){
        $article = Articles::all();
        return view('welcome')->with('this_will_be_used_as_variable_in_views',$article);
    }
}
