<?php

namespace App\Livewire;

use Livewire\Component;

class Header extends Component
{
    public $dropdownOpen = false;

    public function toggleDropdown()
    {
        $this->dropdownOpen = !$this->dropdownOpen;
    }
    public function render()
    {
        return view('livewire.header');
    }
}