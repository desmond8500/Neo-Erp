<div class="card p-2 ">
    <div class="row">
        {{-- <div class="col-auto" type="button" wire:click="select_project('{{ $projet->id }}')">
            @isset ($projet->client->logo)
                <img class="avatar" src="{{ asset($projet->client->logo)  }}" alt="A">
            @else
                <img class="avatar" src="{{ asset('img/avatar/project.png')  }}" alt="A">
            @endisset
        </div> --}}

        <a class="col-12 mb-2" href="{{ route('projet',['projet_id'=> $projet->id]) }}" style="text-decoration: none">
            <div class="fw-bold">{{ $projet->name }}</div>

        </a>


        <div class="col">
            <div class="d-flex justify-content-between border rounded p-1 mt-1">
                <div class="fw-bold text-muted">Taches :</div>
                <div class="badge ">{{ $projet->taches->count() }}</div>
            </div>
        </div>
        <div class="col-auto">
            <div class="dropdown open">
                <button class="btn btn-secondary btn-icon dropdown-toggle" type="button" id="triggerId"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                </button>
                <div class="dropdown-menu" aria-labelledby="triggerId">
                    <button class="dropdown-item" wire:click="projet_edit('{{ $projet->id }}')">Editer</button>
                    <button class="dropdown-item text-danger disabled">Supprimer
                    </button>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="text-muted mt-1">{{ nl2br($projet->description) }}</div>
        </div>
    </div>
</div>
