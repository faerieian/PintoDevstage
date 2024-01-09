<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Recipe;

class Counter extends Component
{

    public $code; // Corresponds to 'รหัสสูตร'
    public $name; // Corresponds to 'ชื่อสูตรความต้องการ'

    public $recipes;



    protected $rules = [
        'code' => 'required', // 'code' is the field in the database
        'name' => 'required',
    ];


    public function save()
    {
        // dd('saved');
        $this->validate();


        // Save the new recipe to the database
        Recipe::create([
            'code' => $this->code,
            'name' => $this->name,
        ]);

        //Reset the form after save
        $this->reset();

        // Flash a session message for success
        session()->flash('message', 'Recipe successfully saved.');

        // emit an event to notify other components or for refreshing a list
        // $this->emit('save');
        $this->loadRecipes(); // Reload recipes after save
    }

    public function mount()
    {

    $this->loadRecipes();

    }

    public function loadRecipes()
    {
    $this->recipes = Recipe::orderBy('created_at', 'desc')->get(); // Replace 'created_at' with your preferred column
    }


    public function render()
    {
        return view('livewire.counter');
    }
}