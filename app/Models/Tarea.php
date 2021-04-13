<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Tarea extends Model
{
    use HasFactory;
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'tarea',
        'descripcion',
    ];

    /**
     * Get the comments for the blog post.
     */
    public function empleados()
    {
        return $this->hasMany(Empleado::class,'id_tarea','id');

    }   

}
