<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Shop;
use Validator;
use App\Http\Resources\Shop as ShopResource;
   
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
    
        return $this->sendResponse(ShopResource::collection($shops), 'Shops retrieved successfully.');
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
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $shop = Shop::create($input);
   
        return $this->sendResponse(new ShopResource($shop), 'Shop created successfully.');
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
            return $this->sendError('Shop not found.');
        }
   
        return $this->sendResponse(new ShopResource($shop), 'Shop retrieved successfully.');
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shop $shop)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'name' => 'required',
            'capacity' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $shop->name = $input['name'];
        $shop->capacity = $input['capacity'];
        $shop->save();
   
        return $this->sendResponse(new ShopResource($shop), 'Shop updated successfully.');
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shop $shop)
    {
        $shop->delete();
   
        return $this->sendResponse([], 'Shop deleted successfully.');
    }
}