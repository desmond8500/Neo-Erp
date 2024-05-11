<div class="card p-2 ">
    <div class="row">

        <a class="col-12 mb-2" href="{{ route('projet',['projet_id'=> $projet->id]) }}" style="text-decoration: none">
            <div class="d-flex">
                <div class="bg-primary text-white fw-bold rounded p-1 d-flex align-items-center me-1" style="height: 50px; width:50px">
                    Projet
                </div>
                <div>
                    <div class="fw-bold">{{ $projet->name }}</div>
                </div>
            </div>

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
                    <button class="dropdown-item text-danger" wire:click="projet_delete('{{ $projet->id }}')">Supprimer </button>
                </div>
            </div>
        </div>
    </div>
</div>
