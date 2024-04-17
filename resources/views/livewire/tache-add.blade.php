<div>
    <button class='btn btn-primary' data-bs-toggle="modal" data-bs-target="#addTache"><i class='ti ti-plus'></i> Tache </button>
    {{-- <button class='btn btn-primary' wire:click="$dispatch('open-addTache')"><i class='ti ti-plus'></i> Tache</button> --}}


    @component('components.modal', ["id"=>'addTache', 'title' => 'Ajouter une tache'])
    <form class="row" wire:submit="store">
        @include('_form.tache_form')
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            <button type="submit" class="btn btn-primary">Valider</button>
        </div>
    </form>
    <script> window.addEventListener('open-addTache', event => { $('#addTache').modal('show'); }) </script>
    <script> window.addEventListener('close-addTache', event => { $('#addTache').modal('hide'); }) </script>
    @endcomponent
</div>

