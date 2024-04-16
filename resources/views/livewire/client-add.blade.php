<div>
    <div class="d-flex">
        {{-- <input type="text" class="form-control" wire:model.live="search" placeholder="Rechercher"> --}}

        <button type="button" class="btn btn-primary mx-1" data-bs-toggle="modal" data-bs-target="#addClient">
            <i class="ti ti-plus me-2"></i> Client
        </button>

    </div>
    @component('components.modal', ["id"=>'addClient', 'title'=>'Ajouter un client'])
        <form class="row" wire:submit="store">
            @include('_form.client_form')

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-primary">Valider</button>
            </div>
        </form>
        <script> window.addEventListener('open-addClient', event => { $('#addClient').modal('show'); }) </script>
        <script> window.addEventListener('close-addClient', event => { $('#addClient').modal('hide'); }) </script>
    @endcomponent
</div>
