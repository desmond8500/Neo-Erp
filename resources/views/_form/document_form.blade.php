<div class="col-auto mb-3">
    <input type="file" id="file" accept="image/*" style="display: none" wire:model="document_form.logo">
    <label for="file" href="#" class="avatar avatar-upload rounded">
        <i class="ti ti-plus"></i>
        <span class="avatar-upload-text">Ajouter</span>
    </label>
</div>
<div class="col mb-3">
    <label class="form-label">Nom du document / liens</label>
    <input type="text" class="form-control" wire:model='document_form.name' />
    @error('document_form.name') <span class="text-danger">{{ $message }}</span> @enderror
</div>

<div class="w-100"></div>

<div class="col-md-9 mb-3">
    <label class="form-label">Lien</label>
    <input type="text" class="form-control" wire:model="document_form.link" placeholder="Lien vers une adresse">
    @error('document_form.link') <span class="text-danger">{{ $message }}</span> @enderror
</div>


