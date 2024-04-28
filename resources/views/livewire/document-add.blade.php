<div>
    <button class='btn btn-primary' wire:click="dispatch('open-addDocument')" ><i class='ti ti-plus'></i> Document</button>

    @component('components.modal', ["id"=>'addDocument', 'title' => 'Ajouter un document/lien'])
        <form class="row" wire:submit="store">
            @include('_form.document_form')

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-primary">Valider</button>
            </div>
        </form>
        <script> window.addEventListener('open-addDocument', event => { $('#addDocument').modal('show'); }) </script>
        <script> window.addEventListener('close-addDocument', event => { $('#addDocument').modal('hide'); }) </script>
    @endcomponent
</div>
