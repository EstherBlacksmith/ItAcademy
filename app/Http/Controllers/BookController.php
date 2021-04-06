<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    /**
     * Show the form to create a new blog post.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('catalog.create');
    }

    /**
    * Store a new blog post.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {    
      $validation = Validator::make($request->all() ,[
              'titulo'  => 'required | max:255',
              'autor'   => 'required | max: 50',
              'anyo'    => 'required | digits:4|integer|min:1900|max:'.(date('Y')+1),
              'contenido' => 'required',

      ]);

      if($validation->fails()) {
        return redirect('catalog/create')
                        ->withErrors($validation)
                        ->withInput();
      }else{
        return view('catalog/createOK');
      }

   }

   public function update()
   {
      return view('catalog.update');
   }

   public function storeUpdate(Request $request)
   {

      $validation = Validator::make($request->all() ,[
        'titulo' => 'required',
        'tituloNew' => 'required',
        'autor' => 'required',
        'autorNew' => 'required',
        'anyo' => 'required',
        'anyoNew' => 'required',
        'contenido' => 'required',
        'contenidoNew' => 'required',

      ]);

      if($validation->fails()) {
        return redirect('catalog/update')
                        ->withErrors($validation)
                        ->withInput();
      }else{
        return view('catalog/updateOK');
      }
   }
}
