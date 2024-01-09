<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Route;

class Sidebar extends Component
{
    public $activeTab = 'dashboard'; // Default to 'dashboard'

    public function mount()
    {
        $currentRouteName = Route::currentRouteName();
        // \Log::debug("Current route name in mount: " . $currentRouteName);

        switch ($currentRouteName) {
            case 'userdetails':
                $this->activeTab = 'customer';
                break;
            // ... other cases ...
            case 'user':
                $this->activeTab = 'customer';
                break;
            case 'recipes':
                    $this->activeTab = 'customer';
                    break;
            case 'ingredients':
                $this->activeTab = 'ingredients';
                break;
            case 'nutrients':
                    $this->activeTab = 'ingredients';
                    break;
        }
    }

    public function setActiveTab($tabName)
    {
        $this->activeTab = $tabName;
    }
    public function render()
    {
        return view('livewire.sidebar');
    }
}