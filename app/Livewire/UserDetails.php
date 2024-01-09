<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class UserDetails extends Component
{
    public $users;

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
        $this->users = User::orderBy($this->sortField, $this->sortDirection)->get();
    }


    public function redirectToEdit($userId)
    {
    return redirect()->to('/user/edituser/' . $userId);
    }


    // public function mount()
    // {
    //     $this->users = User::orderBy($this->sortField, $this->sortDirection)->get();
    //     $this->users = User::all(); // Retrieve all users
    // }

    public function render()
    {
        $this->users = User::orderBy($this->sortField, $this->sortDirection)->get() ?? collect();
        return view('livewire.user-details', ['users' => $this->users]);
        // return view('livewire.user-details', ['users' => $this->users]);
    }
}