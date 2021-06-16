<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Shop;
//use App\Models\Collar;
//use App\Http\Resources\Shop as ShopResource;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ShopController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shops = Shop::all();

        if (Auth::check()) {
            $token = auth()->user()->createToken('Personal Access Token')->accessToken;

            return view('shops/index', compact('shops','token'));

           // return response()->json(['token' => $token], 200);
        } else {
           
            return view('shops/index', compact('shops'));

            // abort(404);
           // return response(['error' => 'Unauthorized']);
            //return response()->json(['error' => 'Unauthorized'], 401);
        }  

    //   return view('shops/index', compact('shops'));
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
    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required',
            'capacity' => 'required'
        ]);

        if($validator->fails()){
            return Redirect::back()->with('errors', $validator->errors());
        }

        $shop = Shop::create($input);

        return Redirect::back()->with('success','Shop created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shop = Shop::find($id);

        if (is_null($shop)) {
            return Redirect::back()->with('errors','Shop not found.');
        }

        return Redirect::back()->with('success','Shop retrieved successfully.');

    }

    public function updateView(Shop $shop)
    {
        return view('shops/update', compact('shop'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request){  
        
        
        $validator = Validator::make($request->only('elemento', 'id','valor'), [
            'elemento' => 'required',
            'id' => 'required',
            'valor' => 'required'
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

        /*try {
            $request->validate([
                'elemento' => 'required',
                'id' => 'required',
                'valor' => 'required'
            ]);

            /*if($validated->fails()){
                return response()->json(['Errors',404]);
            }*/
            
      /*  } catch (Throwable $e) {           
            dd($e);
        }*/
        
              
        $shop = Shop::find($request->id);
        $collars = $shop->collars();    


        /*if($request->capacity < count($i)){
             return Redirect::back()->with('errors','The amount of necklaces stored is greater than the new capacity of the shop');
        }*/
       
         if ($request->elemento == "capacity"){
            $shop->capacity = $request->valor;
         }else{
            $shop->name = $request->valor;
         }
         
         $shop->save();         
         
        return response()->json(['success','Shop updated successfully'],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Shop $shop)
    {
        $shop->delete();
        return Redirect::back()->with('success','Shop deleted successfully.');
    }
}
