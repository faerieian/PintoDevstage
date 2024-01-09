<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

       // The table associated with the model.
       protected $table = 'categories';

       // Indicates if the model should be timestamped.
       public $timestamps = true;

       // The attributes that are mass assignable.
       protected $fillable = [
           'name',
       ];

       // Define relationships
       public function ingredients()
       {
           return $this->hasMany(Ingredient::class);
       }
}