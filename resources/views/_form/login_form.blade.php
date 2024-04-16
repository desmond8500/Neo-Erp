<div class="bg-blue mx-auto" style="
                border-radius: 25px;
                width: 50px;
                height: 50px;
                color: white;
            ">
    <i class="ti ti-user" style=" display: block; padding: 10px; font-size: 30px; "> </i>
</div>

<form class="row" wire:submit="login">

    <div class="col-md-10 offset-1 mb-3">
        <label class="form-label">Email</label>
        <input type="text" class="form-control" wire:model="email" placeholder="Email">
        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="col-md-10 offset-1 mb-3">
        <label class="form-label">Mot de passe</label>
        <div class="input-group input-group-flat">
            <input type="{{ $formtype ? 'password' : " text" }}" class="form-control" wire:model="password"
                placeholder="Mot de passe">
            <span class="input-group-text">
                <a href="#" class="input-group-link" title="Afficher le mot de passe" wire:click="$toggle('formtype')">
                    @if ($formtype)
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                        <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6">
                        </path>
                    </svg>
                    @else
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye-off" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M10.585 10.587a2 2 0 0 0 2.829 2.828" />
                        <path
                            d="M16.681 16.673a8.717 8.717 0 0 1 -4.681 1.327c-3.6 0 -6.6 -2 -9 -6c1.272 -2.12 2.712 -3.678 4.32 -4.674m2.86 -1.146a9.055 9.055 0 0 1 1.82 -.18c3.6 0 6.6 2 9 6c-.666 1.11 -1.379 2.067 -2.138 2.87" />
                        <path d="M3 3l18 18" />
                    </svg>
                    @endif
                </a>
            </span>
        </div>
        @error('password') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="col-md-12 text-danger">
        {{ $errorMessage }}
    </div>

    <div class="modal-foote">
        <div class="d-flex justify-content-evenly">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            <button type="submit" class="btn btn-primary">Valider</button>
        </div>
    </div>
</form>
