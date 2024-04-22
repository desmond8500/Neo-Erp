<div>
    @component('components.page-header', ['title'=>'Client', 'breadcrumbs'=>$breadcrumbs])
        @livewire('projet-add',['client_id'=>$client->id])
    @endcomponent

    <div class="row g-2">
        <div class="col-md-3">
            <div class="mb-3">
                @include('_card.client_card',['client'=>$client])
            </div>
            {{-- <div>
                @forelse ($projets as $projet)
                    <div class="mb-1">
                        @include('_card.projet_card',['projet'=> $projet])
                    </div>
                @empty
                    @component('components.no-result')

                    @endcomponent
                @endforelse
            </div> --}}
        </div>
        <div class="col-md-9">
            {{-- @if ($selected)
                @livewire('resume-suivi',['projet_id'=> $selected], key($selected))
            @endif --}}
            <div class="row g-2">
                @forelse ($projets as $projet)
                    <div class="col-md-4">
                        @include('_card.projet_card',['projet'=> $projet])
                    </div>
                @empty
                    @component('components.no-result')

                    @endcomponent
                @endforelse
            </div>


        </div>

    </div>

    @component('components.modal', ["id"=>'editProjet', 'title'=> 'Editer un projet'])
        <form class="row" wire:submit="projet_update">
            @include('_form.projet_form')
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-primary">Valider</button>
            </div>
        </form>
            <button type="button" class="btn btn-danger btn-icon" wire:click="projet_delete()"><i class="ti ti-trash"></i></button>
        <script>
            window.addEventListener('open-editProjet', event => { $('#editProjet').modal('show'); })
        </script>
        <script>
            window.addEventListener('close-editProjet', event => { $('#editProjet').modal('hide'); })
        </script>
    @endcomponent

    @component('components.info-modal', ["id"=>'infoModal', 'title'=> 'Information', 'type'=>'danger'])

        {!! nl2br($message ?? 'Description') !!}

        <script>
            window.addEventListener('open-infoModal', event => { $('#infoModal').modal('show'); })
        </script>
        <script>
            window.addEventListener('close-infoModal', event => { $('#infoModal').modal('hide'); })
        </script>
    @endcomponent
</div>
