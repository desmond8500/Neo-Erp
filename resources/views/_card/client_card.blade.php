<div class="card p-1 bg-light rounded  border-primary">
    <div class="bg-primary p-2 rounded">
        <div class="row ">
            <a class="col-auto cursor-pointer" href="{{ route('client', ['client_id'=>$client->id ?? 1]) }}">
                @isset ($client->logo)
                    <img src="{{ asset($client->logo) }}" alt="C" class="avatar">
                @else
                    <img src="{{ asset('img/avatar/office.png') }}" alt="C" class="avatar">
                @endisset
            </a>
            <a class="col cursor-pointer text-white" href="{{ route('client', ['client_id'=>$client->id ?? 1]) }}"
                style="text-decoration: none">
                @if ($client->type)
                    <div class="">Particluer</div>
                @else
                    <div class="">Entreprise</div>
                @endif
                <div class="fw-bold">{{ $client->name ?? 'Nom' }}</div>
            </a>
            <div class="col-auto">
                <button class="btn btn-light btn-icon" wire:click="edit()"><i class="ti ti-edit"></i></button>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-between pt-2 pb-2">
        @isset ($client)
        <div class="d-flex align-content-center"> <i class="ti ti-box"></i> Projets <b class="ms-2 badge bg-primary" >{{ $client->projets->count() ?? '0' }}</b></div>
        <div class="d-flex align-content-center"> <i class="ti ti-box"></i> Taches en cours <b class="ms-2 badge bg-primary" >??</b></div>
        @endisset
    </div>

</div>
