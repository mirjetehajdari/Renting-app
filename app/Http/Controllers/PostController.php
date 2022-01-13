<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datas = Post::all();
        // dd($datas);

        return view('index',[
            'datas'=>$datas,

        ]);
    }

    public function my_posts(){

        $datas = Post::where('email',Auth::user()->email)->get();
        // dd($datas);

        return view('my_posts',[
            'datas'=>$datas,

        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());
        // foreach($request->file('files') as $f){

        //     $name = time() . $f->getClientOriginalName();
        //     $f->move('assets/TopProducts/',$name);

        // }
        if($file = $request->file('main_photo')){
            $name = time().$file->getClientOriginalName();
            $file->move('images/',$name);
        }
        if($file2 = $request->file('second_photo')){
            $name2 = time().$file2->getClientOriginalName();
            $file2->move('images/',$name2);
        }
        if($file3 = $request->file('third_photo')){
            $name3 = time().$file3->getClientOriginalName();
            $file3->move('images/',$name3);
        }
        Post::create([

            'last_name'=>$request->last_name,
            'first_name'=>$request->first_name,
            'bike_type'=>$request->bike_type,
            'city_location' =>$request->location,
            'price_hour' =>$request->price_hour,
            'price_day'=>$request->price_day,
            'price_week'=>$request->price_week,
            'description' =>$request->description,
            'main_photo'=>$name,
            'second_photo'=>$name2,
            'third_photo' =>$name3,
            'email' => Auth::user()->email

        ]);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
        // dd($request->all());
        // dd('here');
        $datas = Post::where('id', $request->id)->get();
        // dd($datas);

        return view('more_details',[
            'datas'=>$datas,
        ]);

    }

    public function search(Request $request){
        // dd($request->search);
        $datas = Post::where('bike_type', 'like', '%'.$request->search.'%')->get();
        // dd($datas);

        return view('index',[
            'datas'=>$datas,

        ]);
    }

    public function sort(Request $request){

        // dd($request->sort);
        if($request->sort == 'a-z'){

            $datas = Post::orderBy('bike_type', 'asc')->get();
        }
        else{

            $datas = Post::orderBy('bike_type', 'desc')->get();
        }

        return view('index',[
            'datas'=>$datas,

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        // dd($id);
        $datas = Post::whereId($id)->first();
        return view('edit_view',[
            'datas' => $datas
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        Post::whereId($request->id)->update([

            'last_name'=>$request->last_name,
            'first_name'=>$request->first_name,
            'bike_type'=>$request->bike_type,
            'city_location' =>$request->location,
            'price_hour' =>$request->price_hour,
            'price_day'=>$request->price_day,
            'price_week'=>$request->price_week,
            'description' =>$request->description,

        ]);

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
    public function delete($id)
    {
        // dd($id);
        //
        Post::whereId($id)->delete();
        return back();
    }
}
