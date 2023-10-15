<div>
    <div class="mb-8">
        <label class="inline-block w-32 font-bold">Empresa:</label>
        <select name="empresa" wire:model="country" class="form-control custom-select d-block w-100">
                <option value=''>Seleccione una empresa</option>
            @foreach($countries as $country)
                <option value={{ $country->id}}>{{ $country->name }}</option>
            @endforeach
        </select>
    </div>
    @if(count($cities) > 0)
        <div class="mb-8">
            <label class="inline-block w-32 font-bold">Cliente:</label>
            <select name="cliente" wire:model="city" 
                class="form-control custom-select d-block w-100">
                <option value=''>Seleccione un cliente</option>
                @foreach($cities as $city)
                    <option value={{$city->id}}>{{ $city->cliente}}</option>
                @endforeach
            </select>
        </div>
    @endif
    @if(count($users) > 0)
        <div class="mb-8">
            <label class="inline-block w-32 font-bold">Usuario:</label>
            <select wire:model="user" 
                class="form-control custom-select d-block w-100">
                <option value=''>Seleccione un usuario</option>
                @foreach($users as $user)
                    <option name="usuario" value={{$user->name}}>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
    @endif
</div>