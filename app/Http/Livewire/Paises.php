<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Paises extends Component
{
    public $paises = ['México','Perú','Argentina','Chile'];

    public $pais;

    public function render()
    {
        return view('livewire.paises');
    }

    public function agregar()
    {
        array_push($this->paises,$this->pais);
        $this->reset('pais');
    }
}
