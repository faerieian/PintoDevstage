<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Nutrient;

class CreateNutrients extends Component
{
    public $coden; // Corresponds to 'รหัสสารอาหาร'
    public $name; // Corresponds to 'ชื่อสารอาหาร'

    public $nutrient;



    protected $rules = [
        'coden' => 'required', // 'code' is the field in the database
        'name' => 'required',
    ];


    public function save()
    {
        // dd('saved');
        $this->validate();


        // Save the new recipe to the database
        Nutrient::create([
            'coden' => $this->coden,
            'name' => $this->name,
        ]);

        //Reset the form after save
        $this->reset();

        // Flash a session message for success
        session()->flash('message', 'coden successfully saved.');

        // emit an event to notify other components or for refreshing a list
        // $this->emit('save');
        $this->loadNutrient(); // Reload recipes after save
    }

    public function mount()
    {

    $this->loadNutrient();

    }

    public function loadNutrient()
    {
    $this->nutrient = Nutrient::orderBy('created_at', 'desc')->get(); // Replace 'created_at' with your preferred column
    }
    public function render()
    {
        return view('livewire.create-nutrients');
    }
}
