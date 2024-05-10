<div class="row">
    <div class="col-2 mb-3">
        <label class="form-label">Projet_id</label>
        <input type="text" class="form-control" wire:model="tache_form.projet_id" placeholder="projet_id" disabled>
        @error('tache_form.projet_id') <span class='text-danger'>{{ $message }}</span> @enderror
    </div>
    <div class="col-md-10 mb-3">
        <label class="form-label">Nom de la tache</label>
        <input type="text" class="form-control" wire:model="tache_form.titre" placeholder="Titre">
        @error('tache_form.titre') <span class='text-danger'>{{ $message }}</span> @enderror
    </div>

    <div class="w-100"></div>

    <div class="col-md-4 mb-3">
        <label class="form-label">Progression</label>
        <select class="form-control" wire:model="tache_form.progression_id">
            @foreach ($progressions as $progression)
            <option value="{{ $progression->id }}">{{ $progression->name }}</option>
            @endforeach
        </select>
        @error('tache_form.progression_id') <span class='text-danger'>{{ $message }}</span> @enderror
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label">Priorité</label>
        <select class="form-control" wire:model="tache_form.priorite_id">
            @foreach ($priorites as $key => $priorite)
            <option value="{{ $priorite->id }}">{{ $priorite->name }}</option>
            @endforeach
        </select>
        @error('tache_form.priorite_id') <span class='text-danger'>{{ $message }}</span> @enderror
    </div>

    <div class="col-md-4 mb-3">
        <label class="form-label">Echéance</label>
        <input type="date" class="form-control" wire:model="tache_form.echeance" placeholder="Nom">
        @error('tache_form.echeance') <span class='text-danger'>{{ $message }}</span> @enderror
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label">Début</label>
        <input type="date" class="form-control" wire:model="tache_form.debut" >
        @error('tache_form.debut') <span class='text-danger'>{{ $message }}</span> @enderror
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label">Fin</label>
        <input type="date" class="form-control" wire:model="tache_form.fin" >
        @error('tache_form.fin') <span class='text-danger'>{{ $message }}</span> @enderror
    </div>

    <div class="col-md-12 mb-3">
        <label class="form-label">Description</label>
        <textarea class="form-control"  wire:model="tache_form.description" placeholder="Description" cols="30"
            rows="5"></textarea>
        @error('tache_form.description') <span class='text-danger'>{{ $message }}</span> @enderror
    </div>

</div>
