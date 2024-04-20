<div>
    <div class="d-flex justify-content-between">
        <h2 class="mb-4">Mon compte</h2>
        @if ($edit)
            <div>
                <a class="btn btn-primary" wire:click="edit_user()">Modifier</a>
            </div>
        @endif
    </div>

    <h3 class="card-title">Détails du profile</h3>
    @if ($edit)
        <div class="row">
            <div class="col-auto">
                @if ($user->avatar)
                    <img src="{{ asset($user->avatar) }}" class="avatar avatar-xl" alt="A">
                @else
                    <img src="{{ asset('img/avatar/user.png') }}" class="avatar avatar-xl" alt="A">
                @endif
            </div>
            <div class="col-md-5 border rounded p-2">
                <div class="d-flex justify-content-between">
                    <div class="fw-bold">Prénom :</div> <div>{{ $user->prenom }}</div>
                </div>
                <div class="d-flex justify-content-between">
                    <div class="fw-bold">Nom :</div> <div>{{ $user->nom }}</div>
                </div>
                <div class="d-flex justify-content-between">
                    <div class="fw-bold">Email :</div> <div>{{ $user->email }}</div>
                </div>
                <div class="d-flex justify-content-between">
                    <div class="fw-bold">Fonction ou poste :</div> <div>{{ $user->fonction }}</div>
                </div>
            </div>
        </div>
    @else

        <form wire:submit="update_user()">
            @include('_form.user_form')

            <div class="card-footer bg-transparent mt-auto">
                <div class="btn-list justify-content-end">
                    <a href="#" class="btn" wire:click="$toggle('edit')"> Annuler </a>
                    <button type="submit" class="btn btn-primary" > Modifier </button>
                </div>
            </div>
        </form>




    @endif

</div>
