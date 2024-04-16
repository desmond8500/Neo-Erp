<div class="col-auto mb-3">
    @if ($clientForm->logo)
    {{-- @if($clientForm->logo?->temporaryUrl())
    <img src="{{ $clientForm->logo?->temporaryUrl() }}" alt="" class="logo rounded logo-upload">
    @else --}}

    <img src="{{ $clientForm->logo }}" alt="" class="avatar rounded avatar-upload">
    {{-- @endif --}}

    @else
    <input type="file" id="file" accept="image/*" style="display: none" wire:model="clientForm.logo">
    <label for="file" href="#" class="avatar avatar-upload rounded">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
            stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M12 5l0 14" />
            <path d="M5 12l14 0" />
        </svg>
        <span class="avatar-upload-text">Add</span>
    </label>
    @endif
</div>
<div class="col mb-3">
    <label class="form-label">Nom du client</label>
    <input type="text" class="form-control" wire:model='clientForm.name' />
    @error('clientForm.name') <span class="text-danger">{{ $message }}</span> @enderror
</div>

<div class="w-100"></div>

<div class="col-md-4 mb-3">
    <label class="form-label">Type de client</label>
    <select class="form-control" wire:model="clientForm.type">
        <option value="false">Entreprise</option>
        <option value="true">Particulier</option>
    </select>
</div>

<div class="col-md-8 mb-3">
    <label class="form-label">Adresse</label>
    <input type="text" class="form-control" wire:model="clientForm.adresse" placeholder="Adresse du client">
</div>

<div class="col-md-12 mb-3">
    <label class="form-label">Description</label>
    <textarea class="form-control" wire:model="clientForm.description" placeholder="Description du client" id=""
        cols="30" rows="3"></textarea>
</div>
