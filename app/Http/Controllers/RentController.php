<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Rent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
        // $bike_id = Post::where('email',Auth::user()->email)->get();

        // dd($bike_id[0]->id);
        $rents = Post::select('rents.*')->rightJoin('rents', function($join) {
            $join->on('posts.id', '=', 'rents.bike_id');
          })
          ->where('posts.email',Auth::user()->email)->get();

        //  dd($rents);
        return view('orders',[
            'rents' => $rents
        ]);
    }

    public function confirm_order(Request $request){

        // dd($request->all());
        $rent = Rent::where('bike_id',$request->bike_id)
                    ->where('created_at', $request->created_at)
                    ->get();

        if(count($rent) > 0){
            if($rent[0]->confirmed == 1){

                Rent::where('bike_id',$request->bike_id)
                    ->where('created_at', $request->created_at)
                    ->update(['confirmed'=> 0]);
            }
            else{

                Rent::where('bike_id',$request->bike_id)
                    ->where('created_at', $request->created_at)
                    ->update(['confirmed'=> 1]);
            }
        }

        return back();
    }

    public function my_orders()
    {
        //
        // $bike_id = Post::where('email',Auth::user()->email)->get();

        // dd($bike_id[0]->id);
        $my_rents = Rent::where('user_id',Auth::id())->get();
        

        //  dd($rents);
        return view('my_orders',[
            'my_rents' => $my_rents
        ]);
    }

    public function rent($id)
    {

        $data = Post::whereId($id)->first();
        //
        return view('rent_view',[
            'datas' => $data
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
    public function rent_bike(Request $request)
    {
        // dd(Auth::id());
        //
        Rent::create([
            'bike_id'=>$request->id,
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'email'=>$request->email,
            'user_id'=>Auth::id(),
            'phone_number' =>$request->phone_number,
            'time_type' =>$request->time_type,
            'quantity_time'=>$request->quantity_time,
            'comment'=>$request->comment,
            'confirmed' => 0

        ]);

        return back();

    }

    public function update_order(Request $request){

        Rent::whereId($request->id)->update([

            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'email'=>$request->email,
            'phone_number' =>$request->phone_number,
            'time_type' =>$request->time_type,
            'quantity_time'=>$request->quantity_time,
            'comment'=>$request->comment,

        ]);

        return redirect('/my_orders');
    }

    public function delete_order($id)
    {
        //
        Rent::whereId($id)->delete();
        return back();
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rent  $rent
     * @return \Illuminate\Http\Response
     */
    public function show(Rent $rent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rent  $rent
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datas = Rent::whereId($id)->first();
        if($datas != NULL){
            if($datas->confirmed == 0){
                
                return view('edit_order',[
                    'datas' => $datas
                ]);
            }
            else{
                return back();
            }
        }
        else{
            return back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rent  $rent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rent $rent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rent  $rent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rent $rent)
    {
        //
    }
}
