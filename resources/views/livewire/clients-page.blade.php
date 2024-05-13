<div>
    <div>
        @component('components.page-header', ['title'=>'Clients', 'breadcrumbs'=>$breadcrumbs])
        <div class="d-flex">
            <input type="text" class="form-control" wire:model.live="search" placeholder="Rechercher">
            @livewire('client-add')
        </div>
        @endcomponent
    </div>

    <div class="row row-deck g-2">

        @forelse ($clients as $client)
            <div class="col-md-3">
                @include('_card.client_card')
            </div>
        @empty
            <div class="col-md-12">
               @component('components.no-result')

               @endcomponent
            </div>
        @endforelse

        <div class="card p-2">
            {{ $clients->links() }}
        </div>
    </div>

    @component('components.modal', ["id"=>'editClient', 'title'=>'Modifier un client'])
        <form class="row" wire:submit="update">
            @include('_form.client_form')

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-primary">Valider</button>
            </div>
        </form>
        <button type="button" class="btn btn-danger" wire:click="delete()">
            <i class="ti ti-trash"></i> Supprimer
        </button>
        <script> window.addEventListener('open-editClient', event => { $('#editClient').modal('show'); }) </script>
        <script> window.addEventListener('close-editClient', event => { $('#editClient').modal('hide'); }) </script>
    @endcomponent

    @component('components.info-modal', ["id"=>'infoModal', 'title'=> 'Information', 'type'=>$message_type])

        {!! nl2br($message ?? 'Description') !!}

        <script> window.addEventListener('open-infoModal', event => { $('#infoModal').modal('show'); }) </script>
        <script> window.addEventListener('close-infoModal', event => { $('#infoModal').modal('hide'); }) </script>
    @endcomponent
</div>
