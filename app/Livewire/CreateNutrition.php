<?php

namespace App\Livewire;

use Livewire\Component;

class CreateNutrition extends Component
{

    public $rows = [];

    public function mount()
    {
        // Start with one row
        $this->rows[] = ['nutrient' => '', 'value' => '', 'unit' => ''];
    }

    public function addRow()
    {
        $this->rows[] = ['nutrient' => '', 'value' => '', 'unit' => ''];
    }
    public function render()
    {
        return view('livewire.create-nutrition');
    }
}
