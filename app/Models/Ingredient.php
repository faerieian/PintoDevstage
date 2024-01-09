<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    // The table associated with the model.
    protected $table = 'ingredients';

    // Indicates if the model should be timestamped.
    public $timestamps = true;

    // The attributes that are mass assignable.
    protected $fillable = [
        'name', 'category_id', 'nutrition_type', 'type_nutrition', 'nutrients'
    ];

    // Relationships
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // public function nutrients()
    // {
    //     // Assuming you have a nutrient_of_ingredients table for the many-to-many relationship
    //     // and it has an 'amount' field to store the amount of nutrient.
    //     return $this->belongsToMany(Nutrient::class, 'nutrient_of_ingredients')
    //                 ->withPivot('amount')
    //                 ->withTimestamps();
    // }
}
