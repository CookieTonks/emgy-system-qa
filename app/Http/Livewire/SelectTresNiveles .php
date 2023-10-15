<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Empresas;
use App\Models\Cliente;
use App\Models\usuarios;

class SelectTresNiveles extends Component
{
    public $empresas;
    public $clientes;
    public $usuarios;
    public $selectedEmpresa;
    public $selectedCliente;
    public $selectedUsuario;

    public function mount()
    {
        $this->empresas = Empresas::all();
    }

    public function updatedSelectedEmpresa($empresaId)
    {
        $this->clientes = Cliente::where('empresa_id', $empresaId)->get();
        $this->selectedCliente = null;
        $this->usuarios = [];
        $this->selectedUsuario = null;
    }

    public function updatedSelectedCliente($clienteId)
    {
        $this->usuarios = usuarios::where('cliente_id', $clienteId)->get();
        $this->selectedUsuario = null;
    }

    public function render()
    {
        return view('livewire.select-tres-niveles');
    }
}
