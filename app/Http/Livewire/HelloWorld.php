<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models;

class HelloWorld extends Component
{

    public $country;
    public $cities = [];
    public $city;
    public $users = [];
    public $user;

    public function render()
    {
        if (!empty($this->country)) {
            $this->cities = Models\cliente::where('empresa_id', $this->country)->get();
        }
        if (!empty($this->city)) {
            $this->users = Models\usuarios::where('cliente_id', $this->city)->get();
        }
        return view('livewire.hello-world')
            ->withCountries(Models\Empresas::orderBy('name')->get());
    }
}
