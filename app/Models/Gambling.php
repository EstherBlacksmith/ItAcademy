<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gambling extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'd_1',
        'd_2',
    ];

    /**
     * Set the moves
     */
    public function Users(){
        return $this->belongsToMany(User::class);
    }

   
}
