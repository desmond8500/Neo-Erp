<div class="row">
   <div class="col-md-4 mb-3">
       <label class="form-label">Prénom</label>
       <input type="text" class="form-control" wire:model="user_form.prenom" placeholder="Prénom">
       @error('user_form.prenom') <span class='text-danger'>{{ $message }}</span> @enderror
   </div>
   <div class="col-md-4 mb-3">
       <label class="form-label">Nom</label>
       <input type="text" class="form-control" wire:model="user_form.nom" placeholder="Nom">
       @error('user_form.nom') <span class='text-danger'>{{ $message }}</span> @enderror
   </div>
   {{-- <div class="col-md-4 mb-3">
       <label class="form-label">Email</label>
       <input type="text" class="form-control" wire:model="user_form.email" placeholder="Email">
       @error('user_form.email') <span class='text-danger'>{{ $message }}</span> @enderror
   </div> --}}
   <div class="col-md-4 mb-3">
       <label class="form-label">Fonction</label>
       <input type="text" class="form-control" wire:model="user_form.fonction" placeholder="Fonction ou poste">
       @error('user_form.fonction') <span class='text-danger'>{{ $message }}</span> @enderror
   </div>

</div>
