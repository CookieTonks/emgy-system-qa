<?php

namespace App\Http\Livewire;
use App\Models;
use Livewire\Component;

class CountryDropdown extends Component
{
    public $country;
    public $cities = [];
    public $city;
    public $users = [];
    public $user;

    public function render()
    {
        if (!empty($this->country)) {
            $this->cities = Models\cliente::where('empresa', $this->country)->get();
        }
        if (!empty($this->city)) {
            $this->users = Models\usuarios::where('cliente', $this->city)->get();
        }
        return view('livewire.country-dropdown')
            ->withCountries(Models\Empresas::orderBy('name')->get());
    }
}