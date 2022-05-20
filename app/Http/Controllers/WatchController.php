<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Watch;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 

// use Illuminate\Support\Facades\File as File;

class WatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $watches = Watch::orderBy('id','desc')
        ->with('category')
        ->paginate(5);
        return view('watch.watch_index',compact('watches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('watch.watch_create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'category_id' => 'required',
            'name' => 'required|max:255',
            'image' => 'required',
            'price' => 'required',
            'description' => 'required',
        ],[
            'category_id.required' => 'product အမျိုးစားရွေးပေးပါ',
            'name.required' => 'product အမည်ထည့်ပေးပါ',
            'image.required' => 'ပုံထည့်ပေးပါ',
            'price.required' => ' စျေးနှုန်းထည့်ပေးပါ',
            'description.required' => 'ဖော်ပြချက်ထည့်ပေးပါ',
        ]);

        // image upload
        $file = $request->file('image');
        $file_name = uniqid().$file->getClientOriginalName();
        $file->move(public_path('/images'),$file_name);
        // store db
        Watch::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'image' => $file_name,
            'price' => $request->price,
            'description' => $request->description
        ]);
        return redirect(route('watches.index'))->with('success','Watch အသစ်ထည့်ပီး!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $watch = Watch::find($id);
        return view('watch.watch_edit',compact('categories','watch'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'category_id' => 'required',
            'name' => 'required|max:255',
            // 'image' => 'required',
            'price' => 'required',
            'description' => 'required',
        ],[
            'category_id.required' => 'product အမျိုးစားရွေးပေးပါ',
            'name.required' => 'product အမည်ထည့်ပေးပါ',
            // 'image.required' => 'ပုံထည့်ပေးပါ',
            'price.required' => ' စျေးနှုန်းထည့်ပေးပါ',
            'description.required' => 'ဖော်ပြချက်ထည့်ပေးပါ',
        ]);

        $watch = Watch::where('id',$id);
        if($request->file('image')){
            File::delete(public_path('/images/'.$watch->first()->image));
            $file = $request->file('image');
            $file_name = uniqid().$file->getClientOriginalName();
            $file->move(public_path('/images'),$file_name);
        } else {
            $file_name = $watch->first()->image;
        }

        $watch->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'image' => $file_name,
            'price' => $request->price,
            'description' => $request->description
        ]);
        return redirect(route('watches.index'))->with('success','Product ပြင်ပီး!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $watch = Watch::where('id',$id);
        File::delete(public_path('/images/'.$watch->first()->image));
        $watch->delete();
        return redirect(route('watches.index'))->with('success','Product ကိုဖျက်ပီး!');
    }
}
