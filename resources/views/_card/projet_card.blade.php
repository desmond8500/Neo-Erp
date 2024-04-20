<div class="card p-2 ">
    <div class="row">
        <div class="col-auto" type="button" wire:click="select_project('{{ $projet->id }}')">
            @isset ($projet->client->logo)
                <img class="avatar" src="{{ asset($projet->client->logo)  }}" alt="A">
            @else
                <img class="avatar" src="{{ asset('img/avatar/project.png')  }}" alt="A">
            @endisset
        </div>

        <a class="col" href="{{ route('projet',['projet_id'=> $projet->id]) }}" style="text-decoration: none">
            <div class="fw-bold">{{ $projet->name }}</div>
            <div class="d-flex justify-content-between">
                <div class="fw-bold text-muted">Taches :</div>
                <div class="badge ">{{ $projet->taches->count() }}</div>
            </div>
        </a>

        <div class="col-auto">
            <div class="dropdown open">
                <button class="btn btn-secondary btn-icon dropdown-toggle" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                </button>
                <div class="dropdown-menu" aria-labelledby="triggerId">
                    <button class="dropdown-item" wire:click="projet_edit('{{ $projet->id }}')">Editer</button>
                    <button class="dropdown-item text-danger disabled" >Supprimer
                    </button>
                </div>
            </div>


            {{-- <button class="btn btn-primary btn-icon" wire:click="projet_edit('{{ $projet->id }}')">
                <i class="ti ti-edit"></i>
            </button> --}}
        </div>
        <div class="col-md-12">
            <div class="text-muted mt-1">{{ nl2br($projet->description) }}</div>
        </div>
    </div>
</div>
