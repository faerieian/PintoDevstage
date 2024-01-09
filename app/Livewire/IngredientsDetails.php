<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Ingredient;

class IngredientsDetails extends Component
{

    public $Ingredients;

    public $sortField = 'created_at'; // Default sort field
    public $sortDirection = 'desc'; // Sort direction

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
        $this->Ingredients = Ingredient::orderBy($this->sortField, $this->sortDirection)->get();
    }

    public function render()
    {
        $this->Ingredients = Ingredient::orderBy($this->sortField, $this->sortDirection)->get() ?? collect();

        return view('livewire.ingredients-details', ['ingredients' => $this->Ingredients]);
    }
}