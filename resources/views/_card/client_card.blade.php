<div class="card p-1 bg-light rounded  border-primary">
    @if ($client->type)
        <div class="p-2 rounded" style="background: green">
    @else
        <div class="bg-primary p-2 rounded">
    @endif
        <div class="row ">
            <a class="col-auto cursor-pointer" href="{{ route('client', ['client_id'=>$client->id ?? 1]) }}">
                @isset ($client->logo)
                    <img src="{{ asset($client->logo) }}" alt="C" class="avatar">
                @else
                    <img src="{{ asset('img/avatar/office.png') }}" alt="C" class="avatar p-1">
                @endisset
            </a>
            <a class="col cursor-pointer text-white" href="{{ route('client', ['client_id'=>$client->id ?? 1]) }}"
                style="text-decoration: none">
                @if ($client->type)
                    <div class="">Particulier</div>
                @else
                    <div class="">Entreprise</div>
                @endif
                <div class="fw-bold">{{ $client->name ?? 'Nom' }}</div>
            </a>
            <div class="col-auto">
                <div class="dropdown open">
                    <button class="btn btn-light btn-icon dropdown-toggle" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                    </button>
                    <div class="dropdown-menu" aria-labelledby="triggerId">
                        <a class="dropdown-item"  wire:click="edit('{{ $client->id }}')">Editer</a>
                        <a class="dropdown-item text-danger" wire:click="delete('{{ $client->id }}')">Supprimer</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-between pt-2 pb-2">
        @isset ($client)
            @if ($client->type)
                <div class="d-flex align-content-center"> <i class="ti ti-box"></i> Projets <b class="ms-2 badge" style="background: green" >{{ $client->projets->count() ?? '0' }}</b></div>
                <div class="d-flex align-content-center"> <i class="ti ti-box"></i> Taches en cours <b class="ms-2 badge" style="background: green" >{{ $client->taches->count() ?? '0' }}</b></div>
            @else
                <div class="d-flex align-content-center"> <i class="ti ti-box"></i> Projets <b class="ms-2 badge bg-primary" >{{ $client->projets->count() ?? '0' }}</b></div>
                <div class="d-flex align-content-center"> <i class="ti ti-box"></i> Taches en cours <b class="ms-2 badge bg-primary" >{{ $client->taches->count() ?? '0' }}</b></div>
            @endif
        @endisset
    </div>

</div>
