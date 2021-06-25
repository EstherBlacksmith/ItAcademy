<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ShopController extends Controller{

   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $shops = Shop::all();
        return view('shops/show',compact('shops'));           
    }    

    public function create()
    {
        return view('shops/create');
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required',
            'capacity' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'error' => $validator->errors(),
                'messages' =>$validator->messages(),
            ], 200);
        }
        
        $shop = Shop::create($input);

        return Redirect::back()->with('success','Shop created successfully.');
    }

    public function edit(int $id){
        $shop = Shop::find($id);
        return view('shops/edit', compact('shop'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request){         
        $validator = Validator::make($request->only('name', 'id','capacity'), [
            'name' => 'required',
            'id' => 'required',
            'capacity' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'error' => $validator->errors(),
                'messages' =>$validator->messages(),
            ], 200);
        }

        $shop = Shop::find($request->id);
        $shop->capacity = $request->capacity;
        $shop->name = $request->name;
        $shop->save();         
         
        return response()->json(['success','Shop updated successfully'],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shop $shop){
        $shop->delete();
        
        return Redirect::back()->with('success','Shop deleted successfully.');
    }


}