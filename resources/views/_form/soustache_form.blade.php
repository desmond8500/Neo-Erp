<div class="row">
    <div class="col-2 mb-3">
        <label class="form-label">Tache_id</label>
        <input type="text" class="form-control" wire:model="soustache_form.tache_id" placeholder="tache_id" disabled>
        @error('soustache_form.tache_id') <span class='text-danger'>{{ $message }}</span> @enderror
    </div>

    <div class="col-md-10 mb-3">
        <label class="form-label">Nom de la tache</label>
        <input type="text" class="form-control" wire:model="soustache_form.name" placeholder="Description de la tache">
        @error('soustache_form.name') <span class='text-danger'>{{ $message }}</span> @enderror
    </div>

    <div class="col-md-12 mb-3">
        <label class="form-label">Progression</label>
        <select class="form-control" wire:model="soustache_form.status_id">
            @foreach ($progressions as $progression)
            <option value="{{ $progression->id }}">{{ $progression->name }}</option>
            @endforeach
        </select>
        @error('soustache_form.status_id') <span class='text-danger'>{{ $message }}</span> @enderror
    </div>

    <div class="col-md-12 mb-3">
        <label class="form-label">Description</label>
        <textarea class="form-control" wire:model="soustache_form.description" placeholder="Description" cols="30"
            rows="5"></textarea>
        @error('soustache_form.description') <span class='text-danger'>{{ $message }}</span> @enderror
    </div>

</div>
