<div class="col-2 mb-3">
    <label class="form-label">Tache_id</label>
    <input type="text" class="form-control" wire:model='document_form.tache_id' />
    @error('document_form.tache_id') <span class="text-danger">{{ $message }}</span> @enderror
</div>
<div class="col-10 mb-3">
    <label class="form-label">Nom du document / liens</label>
    <input type="text" class="form-control" wire:model='document_form.name' />
    @error('document_form.name') <span class="text-danger">{{ $message }}</span> @enderror
</div>

<div class="w-100"></div>

<div class="col-md-12 mb-3">
    <label class="form-label">Lien</label>
    <input type="text" class="form-control" wire:model="document_form.link" placeholder="Lien vers une adresse">
    @error('document_form.link') <span class="text-danger">{{ $message }}</span> @enderror
</div>


