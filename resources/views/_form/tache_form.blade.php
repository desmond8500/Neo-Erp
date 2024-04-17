<div class="row">
    <div class="col-md mb-3">
        <label class="form-label">Nom de la tache</label>
        <input type="text" class="form-control" wire:model="tache.titre" placeholder="Titre">
        @error('tache.titre') <span class='text-danger'>{{ $message }}</span> @enderror
    </div>

    <div class="w-100"></div>

    <div class="col-md-4 mb-3">
        <label class="form-label">Progression</label>
        <select class="form-control" wire:model="tache.progression_id">
            @foreach ($progressions as $progression)
            <option value="{{ $progression->id }}">{{ $progression->name }}</option>
            @endforeach
        </select>
        @error('tache.progression_id') <span class='text-danger'>{{ $message }}</span> @enderror
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label">Priorité</label>
        <select class="form-control" wire:model="tache.priorite_id">
            @foreach ($priorites as $key => $priorite)
            <option value="{{ $priorite->id }}">{{ $priorite->name }}</option>
            @endforeach
        </select>
        @error('tache.priorite_id') <span class='text-danger'>{{ $message }}</span> @enderror
    </div>

    <div class="col-md-4 mb-3">
        <label class="form-label">Echéance</label>
        <input type="date" class="form-control" wire:model="tache.echeance" placeholder="Nom">
        @error('tache.echeance') <span class='text-danger'>{{ $message }}</span> @enderror
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label">Début</label>
        <input type="date" class="form-control" wire:model="tache.debut" >
        @error('tache.debut') <span class='text-danger'>{{ $message }}</span> @enderror
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label">Fin</label>
        <input type="date" class="form-control" wire:model="tache.fin" >
        @error('tache.fin') <span class='text-danger'>{{ $message }}</span> @enderror
    </div>

    <div class="col-md-12 mb-3">
        <label class="form-label">Description</label>
        <textarea class="form-control" wire:model="tache.description" placeholder="Description" cols="30"
            rows="5"></textarea>
        @error('tache.description') <span class='text-danger'>{{ $message }}</span> @enderror
    </div>


</div>
