<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Watch;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function showCategory(){
        $category = Category::orderBy('id','desc')->paginate(5);
        return response()->json(['success' => true, 'data' => $category]);
    }
    
    public function showProduct(){
        $product = Watch::orderBy('id','desc')
        ->with('category')
        ->paginate(5);
        return response()->json(['success' => true, 'data' => $product]);
    }
}
