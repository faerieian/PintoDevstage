<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Ingredient;
use App\Models\Category;

class Ingredients extends Component
{
    public $currentTab = 'ingredients-tab';
    public $tabs = ['ingredients-tab', 'nutrition'];

    public $name;
    public $selectedCategory = null;

    public $nutritionType;
    public $typeNutrition;
    public $nutrients = []; // Array to hold nutrient data


    public function mount()
    {
        $this->nutrients[] = ['name' => '', 'value' => '', 'unit' => ''];
    }

    public function setTab($tabName)
    {
        $this->currentTab = $tabName;
    }

    public function goToNextTab()
    {
        // Toggle between 'ingredients_details' and 'nutrition'
        if ($this->currentTab === 'ingredients-tab') {
            $this->currentTab = 'nutrition';
        } else {
            $this->currentTab = 'ingredients-tab';
        }
    }

    public function save()
    {
         // Validate the input
       // Validation
       $this->validate([
        'name' => 'required',
        'nutritionType' => 'required',
        'typeNutrition' => 'required',
        'nutrients.*.name' => 'required',
        'nutrients.*.value' => 'required|numeric',
        'nutrients.*.unit' => 'required',
    ]);

    // Find or create the category
    $category = Category::firstOrCreate(['name' => $this->selectedCategory]);

    // Saving the ingredient
    $ingredient = new Ingredient;
    $ingredient->name = $this->name;
    $ingredient->category_id = $category->id; // Associate with the category
    $ingredient->nutrition_type = $this->nutritionType;
    $ingredient->type_nutrition = $this->typeNutrition;
    $ingredient->nutrients = json_encode($this->nutrients);
    $ingredient->save();

    // Reset the form
    $this->resetForm();

        // // Reset the input fields or give some success message
        // $this->resetInputFields();

    }

    private function resetForm()
    {
        $this->name = '';
        $this->selectedCategory = null;
        $this->nutritionType = '';
        $this->typeNutrition = '';
        $this->nutrients = [['name' => '', 'value' => '', 'unit' => '']];
    }


    public function addNutrientField()
    {
        $this->nutrients[] = ['name' => '', 'value' => '', 'unit' => ''];
    }



    public function render()
    {
        return view('livewire.ingredients');
    }
}
