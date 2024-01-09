<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nutrient extends Model
{
    use HasFactory;

     // The table associated with the model.
     protected $table = 'nutrients';

     // Indicates if the model should be timestamped.
     public $timestamps = true;

     // The attributes that are mass assignable.
     protected $fillable = [
         'coden',
         'name',
     ];

     // Define relationships
     public function ingredients()
     {
         // Assuming you have a nutrient_of_ingredients table for the many-to-many relationship
         return $this->belongsToMany(Ingredient::class, 'nutrient_of_ingredients')
                    //  ->withPivot('amount')
                     ->withTimestamps();
     }
}