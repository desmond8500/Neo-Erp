<div class="col-auto mb-3">
    @if ($clientForm->logo)
        {{-- <img src="{{ $clientForm->logo->temporaryUrl() ?? '' }}"  alt="" class="avatar p-1 rounded avatar-upload"> --}}
    @else
        <input type="file" id="file" accept="image/*" style="display: none" wire:model="clientForm.logo">
        <label for="file" href="#" class="avatar avatar-upload rounded">
            <i class="ti ti-plus"></i>
            <span class="avatar-upload-text">Ajouter</span>
        </label>
    @endif
</div>



<div class="col mb-3">
    <label class="form-label">Nom du client</label>
    <input type="text" class="form-control" wire:model='clientForm.name' />
    @error('clientForm.name') <span class="text-danger">{{ $message }}</span> @enderror
</div>

<div class="w-100"></div>

<div class="col-md-3 mb-3">
    <label class="form-label">Type de client</label>
    <select class="form-control" wire:model="clientForm.type">
        <option value="false">Entreprise</option>
        <option value="true">Particulier</option>
    </select>
</div>

<div class="col-md-9 mb-3">
    <label class="form-label">Adresse</label>
    <input type="text" class="form-control" wire:model="clientForm.adresse" placeholder="Adresse du client">
    @error('clientForm.adresse') <span class="text-danger">{{ $message }}</span> @enderror
</div>

<div class="col-md-12 mb-3">
    <label class="form-label">Description</label>
    <textarea class="form-control" wire:model="clientForm.description" placeholder="Description du client" cols="30" rows="3"></textarea>
    @error('clientForm.description') <span class="text-danger">{{ $message }}</span> @enderror
</div>
