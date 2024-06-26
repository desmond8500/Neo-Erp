<div>
    <button class="btn btn-primary ms-1" wire:click="$dispatch('open-addProjet')">
        <i class="ti ti-plus"></i> Projet
    </button>
    @component('components.modal', ["id"=>'addProjet', 'title'=> 'Ajouter un projet'])
    <form class="row" wire:submit="store">
        @include('_form.projet_form')

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            <button type="submit" class="btn btn-primary">Valider</button>
        </div>
    </form>
    <script>
        window.addEventListener('open-addProjet', event => { $('#addProjet').modal('show'); })
    </script>
    <script>
        window.addEventListener('close-addProjet', event => { $('#addProjet').modal('hide'); })
    </script>
    @endcomponent
</div>
