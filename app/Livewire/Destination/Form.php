<?php

namespace App\Livewire\Destination;

use App\Models\Destination;
use Livewire\Component;

class Form extends Component
{

    public $destination;
    public $name;

    public function mount(Destination $destination){
        $this->destination = $destination;
    }



    public function render()
    {
        return view('livewire.destination.form');
    }
}
