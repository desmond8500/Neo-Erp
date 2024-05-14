<div>
    @component('components.page-header', ['title'=>'Réglages', 'breadcrumbs'=>$breadcrumbs])
        @component('components.off-canvas',['titre'=>'Todos'])
            <ul>
                <li>Limiter l'accès au administrateurs avec les permissions</li>
                <li>Gérer les contraines de supression</li>
            </ul>
        @endcomponent
    @endcomponent

    <div class="row">
        @if ($user->id == 1)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Progression</h2>
                        <div class="card-actions">
                            <button class="btn btn-primary" wire:click="dispatch('open-addProgress')">
                                <i class="ti ti-plus"></i> Progression
                            </button>
                        </div>
                    </div>
                    @foreach ($progressions as $progression)
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="badge bg-{{ $progression->color }} me-1"></span>
                                    {{ $progression->name }}
                                </div>
                                <div>
                                    <button class="btn btn-primary btn-icon" wire:click="progress_edit('{{ $progression->id }}')">
                                        <i class="ti ti-edit"></i>
                                    </button>
                                    <button class="btn btn-danger btn-icon" wire:click="progress_delete('{{ $progression->id }}')">
                                        <i class="ti ti-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
        <div class="col-md-4">

        </div>
        <div class="col-md-4">

        </div>
    </div>


    @component('components.modal', ["id"=>'addProgress', 'title' => 'Ajouter une Progression'])
        <form class="row" wire:submit="progress_store">
            @include('_form.progress_form')
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-primary">Valider</button>
            </div>
        </form>
        <script> window.addEventListener('open-addProgress', event => { $('#addProgress').modal('show'); }) </script>
        <script> window.addEventListener('close-addProgress', event => { $('#addProgress').modal('hide'); }) </script>
    @endcomponent

    @component('components.modal', ["id"=>'editProgress', 'title' => 'Editer une Progression'])
        <form class="row" wire:submit="progress_update">
            @include('_form.progress_form')
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-primary">Valider</button>
            </div>
        </form>
        <script> window.addEventListener('open-editProgress', event => { $('#editProgress').modal('show'); }) </script>
        <script> window.addEventListener('close-editProgress', event => { $('#editProgress').modal('hide'); }) </script>
    @endcomponent
</div>
