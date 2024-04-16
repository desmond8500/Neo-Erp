<div>
    <div>
        @component('components.page-header', ['title'=>'Clients', 'breadcrumbs'=>$breadcrumbs])
            @livewire('client-add')
        @endcomponent
    </div>

    <div class="row row-deck g-2">

        @forelse ($clients as $client)
            <div class="col-md-3">
                @include('_card.client_card')
            </div>
            @empty

            <div class="empty">
                <div class="empty-icon">
                    <i class="ti ti-mood-empty"></i>
                </div>
                <p class="empty-title">Pas de client trouvé</p>
                <p class="empty-subtitle text-secondary">
                    Ajoutez de nouveaux clients ou changez de critères de recherche.
                </p>
                <div class="empty-action">
                    <button class="btn btn-primary" wire:click='clientSearch()'>
                        <i class="ti ti-mood-empty"></i>
                        Rechercher de nouveau
                    </button>
                </div>
            </div>

        @endforelse

        <div>
            {{ $clients->links() }}
        </div>
    </div>

    @component('components.modal', ["id"=>'editClient', 'title'=>'Modifier un client'])
        <form class="row" wire:submit="update">
            @include('_form.client_form')

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" wire:click="delete()">
                    <i class="ti ti-trash"></i>
                </button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-primary">Valider</button>
            </div>
        </form>
        <script> window.addEventListener('open-editClient', event => { $('#editClient').modal('show'); }) </script>
        <script> window.addEventListener('close-editClient', event => { $('#editClient').modal('hide'); }) </script>
    @endcomponent
</div>
