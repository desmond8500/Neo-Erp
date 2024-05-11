<div>
    @component('components.page-header', ['title'=>'Projet', 'breadcrumbs'=>$breadcrumbs])
    @livewire('tache-add', ['projet_id' => $projet->id])
    @endcomponent

    <div class="row">
        <div class="col-md-3">
            <div class="mb-2">
                @include('_card.projet_card',['projet'=> $projet])
            </div>

            <div class="card mb-2">
                <div class="card-header">
                    <div class="card-title">Informations sur le projet</div>
                </div>
                <div class="card-body">
                    {!! nl2br($projet->description) !!}
                </div>
                <div class="card-body">
                    @if ($projet->start_date)
                        <div class="d-flex justify-content-between">
                            <div class="fw-bold text-primary">Date de début : </div>
                            <div class="fw-bold">{{ $projet->start_date }}</div>
                        </div>
                    @endif
                    @if ($projet->end_date)
                        <div class="d-flex justify-content-between">
                            <div class="fw-bold text-primary">Date de fin :</div>
                            <div class="fw-bold">{{ $projet->end_date }}</div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-9">
            @livewire('resume-card',['projet_id'=> $projet->id])
            {{-- @livewire('resume-suivi',['projet_id'=> $projet->id]) --}}
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
        <script> window.addEventListener('open-editProjet', event => { $('#editProjet').modal('show'); }) </script>
        <script> window.addEventListener('close-editProjet', event => { $('#editProjet').modal('hide'); }) </script>
    @endcomponent

    @component('components.info-modal', ["id"=>'infoModal', 'title'=> 'Information', 'type'=>'danger'])
        {!! nl2br($message ?? 'Description') !!}

        <script> window.addEventListener('open-infoModal', event => { $('#infoModal').modal('show'); }) </script>
        <script> window.addEventListener('close-infoModal', event => { $('#infoModal').modal('hide'); }) </script>
    @endcomponent
</div>
