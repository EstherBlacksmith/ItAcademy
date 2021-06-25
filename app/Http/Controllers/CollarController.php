<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Collar;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class CollarController extends Controller
{
    public function index(){
       
        $collars = Collar::all();
        return view('collars/show',compact('collars'));      
    }

    public function create()
    {
        $shops = Shop::all();
        return view('collars/create',compact('shops'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){             

        $validator = Validator::make($request->only('name', 'author','date','shop_id'), [
            'name' => 'required',
            'author' => 'required',
            'date' => 'required',
            'shop_id' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'error' => $validator->errors(),
                'messages' =>$validator->messages(),
            ], 200);
        }


        $collar = new Collar();

        $collar->name = $request->name;   
        $collar->author = $request->author;
        $collar->date = $request->date;
        $collar->shop_id = $request->shop_id;
        
        $collar->save();    

        return Redirect::back()->with('success','Collar created successfully.');

    }

     public function edit(int $id){
        $shops = Shop::all();
        $collar = Collar::find($id);
        return view('collars/edit', compact('collar','shops'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request){    
         
        $validator = Validator::make($request->only('name', 'author','date','shop_id'), [
            'name' => 'required',
            'author' => 'required',
            'date' => 'required',
            'shop_id'=> 'required',
        ]);
       
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'error' => $validator->errors(),
                'messages' =>$validator->messages(),
            ], 200);
        }
       
        $collar = Collar::find($request->id);

        $collar->name=$request->name;   
        $collar->author = $request->author;
        $collar->date = $request->date;
        $collar->shop_id = $request->shop_id;

        $collar->save();         
         
        return response()->json(['success','Collar updated successfully'],200);
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $collar = Collar::find($id);
        $collar->delete();
        
        return Redirect::back()->with('success','Collar deleted successfully.');
    }
}
