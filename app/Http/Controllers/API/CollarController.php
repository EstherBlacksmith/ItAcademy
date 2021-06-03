<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Collar;
use Validator;
use App\Http\Resources\Collar as CollarResource;
   
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
    
        return $this->sendResponse(CollarController::collection($collars), 'Collars retrieved successfully.');
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
        $collar->delete();
   
        return $this->sendResponse([], 'Collar deleted successfully.');
    }
}