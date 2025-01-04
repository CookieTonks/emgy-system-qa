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
        // Obtener las ciudades asociadas con la empresa seleccionada, ordenadas alfabéticamente
        if (!empty($this->country)) {
            $this->cities = Models\cliente::where('empresa', $this->country)
                ->orderBy('cliente', 'asc') // Ordenar las ciudades alfabéticamente
                ->get();
        }

        // Obtener los usuarios asociados con la ciudad seleccionada, ordenados alfabéticamente
        if (!empty($this->city)) {
            $this->users = Models\usuarios::where('cliente', $this->city)
                ->orderBy('name', 'asc') // Ordenar los usuarios alfabéticamente
                ->get();
        }

        // Devolver las empresas ordenadas alfabéticamente
        return view('livewire.country-dropdown')
            ->withCountries(Models\Empresas::orderBy('name', 'asc')->get());
    }
}
