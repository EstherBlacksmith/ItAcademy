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

        //return $this->sendResponse(CollarController::collection($collars), 'Collars retrieved successfully.');
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
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $collar = Collar::create($input);
   
        return $this->sendResponse(new CollarController($collar), 'Collar created successfully.');
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
            return $this->sendError('Collar not found.');
        }
   
        return $this->sendResponse(new CollarController($collar), 'Collar retrieved successfully.');
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Collar $collar)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'name' => 'required',
            'author' => 'required',
            'date' => 'required',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $collar->name = $input['name'];
        $collar->author = $input['author'];
        $collar->capacity = $input['capacity'];
        $collar->save();
   
        return $this->sendResponse(new CollarController($collar), 'Collar updated successfully.');
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
            echo $th;        }
   
        return Redirect::back();
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