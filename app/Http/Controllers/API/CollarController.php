<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Collar;
use App\Models\Shop;
use Validator;
use App\Http\Resources\Collar as CollarResource;
use Redirect;

class CollarController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collars = Collar::all();

        return view('collars/index', compact('collars'));
    }

    public function create()
    {   $shops = Shop::all();
        return view('collars/create',compact('shops'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required',
            'author' => 'required',
            'date' => 'required',
            'shop_id' => 'required'
        ]);

        if($validator->fails()){
            return Redirect::back()->with('errors', $validator->errors());

        }

        //max items alowed
        $shop = Shop::find($input['shop_id']);
        $count = count( $shop->collars->all());

        if ($count < $shop->capacity){

            $collar = Collar::create($input);

            return Redirect::back()->with('success','Collar created successfully.');
        }else{
            return Redirect::back()->with('errors','The shop is full.');

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $collar = Collar::find($id);

        if (is_null($collar)) {
            return Redirect::back()->with('errors','Collar not found.');

        }

        return Redirect::back()->with('success','Collar retrieved successfully.');
    }

    public function updateView($id)
    {  
        $collar = Collar::find($id);

        return view('collars/update', compact('collar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {   dd($request);
        $collar = Collar::find($request->id);

        $validator = Validator::make($request->only('elemento', 'id','valor'), [
            'name' => 'required',
            'author' => 'required',
            'date' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'error' => $validator->errors(),
                'messages' =>$validator->messages(),
            ], 200);
        }else{
            return response()->json([
                'success' => true,
                'ok' => $validator,      
                'messages' =>'Shop updated successfully',
            ], 200);

        }

        /*
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required',
            'author' => 'required',
            'date' => 'required',
        ]);

        if($validator->fails()){
            return Redirect::back()->with('errors',$validator->errors());
        }*/

        $collar->name = $validator->name;
        $collar->author = $validator->author;
        $collar->capacity = $validator->capacity;
        $collar->save();

        return response()->json(['success','Collar updated successfully'],200);

        //return Redirect::back()->with('success','Collar updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Collar $collar)
    {
        try {
            $collar->delete();
        } catch (\Throwable $th) {
            return Redirect::back()->with('errors','The necklaces could not be burned.');
        }

        return Redirect::back()->with('success','The necklaces have been burned.');
    }

    //Burn all the content from one shop
    public function burnCollars (Shop $shop){

        $collars = $shop->collars->all();
        foreach($collars as $collar){
            try {
                $this->destroy($collar);
            } catch (\Throwable $th) {
               echo $th;
               return Redirect::back()->with('errors','The necklaces could not be burned.');

            }
        }
        return Redirect::back()->with('success','All the necklaces have been burned.');

    }
}
