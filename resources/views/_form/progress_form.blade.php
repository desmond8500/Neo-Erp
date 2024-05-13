<div class="col mb-3">
    <label class="form-label">Nom de la progression</label>
    <input type="text" class="form-control" wire:model='progress_name' />
    @error('progress_name') <span class="text-danger">{{ $message }}</span> @enderror
</div>

<div class="col-md-5 mb-3">
    <label class="form-label">Couleur de la progression</label>
    <select class="form-control" wire:model="progress_color">
        <option value="blue"> Bleu </option>
        <option value="azure"> Azur </option>
        <option value="indigo"> Indigo </option>
        <option value="purple"> Violet </option>
        <option value="pink"> Rose </option>
        <option value="red"> Rouge </option>
        <option value="orange"> Orange </option>
        <option value="yellow"> Jaune </option>
        <option value="lime"> Citron  vert</option>
        <option value="green"> Vert </option>
        <option value="teal"> Teal </option>
        <option value="cyan"> Cyan </option>
    </select>
    @error('progress_color') <span class="text-danger">{{ $message }}</span> @enderror
</div>

