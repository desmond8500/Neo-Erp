<div>
    @component('components.page-header', ['title'=>'Taches', 'breadcrumbs'=>$breadcrumbs])
    @endcomponent

    <div class="row g-2">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">{{ $tache->titre }}</div>
                    <div class="card-actions">
                        <button class="btn btn-primary btn-icon" wire:click="edit_tache('{{ $tache->id }}')"><i class="ti ti-edit"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="fw-bold">Description</div>
                    <p>
                        {!! nl2br($tache->description) !!}
                    </p>
                </div>
            </div>

            <div class="card mt-2">
                <div class="card-header">
                    <div class="card-title">Informations sur la tache</div>
                </div>
                <div class="card-body">
                    <div class="row g-2 mb-2">
                        <div class="col-md-6">
                            <div class="bg-{{ $tache->priorite->color }} rounded text-center text-white p-1">
                                <div class="">Priorite</div>
                                <div class="fw-bold">{{ $tache->priorite->name }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="bg-{{ $tache->progression->color }} rounded text-center text-white p-1">
                                <div class="">Progression</div>
                                <div class="fw-bold">{{ $tache->progression->name }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="border border-primary rounded p-2">
                        <div class="d-flex justify-content-between">
                            <div class="fw-bold">Date de debut de la tache : </div>
                            <div>{{ $tache->debut ?? 'Non défini' }}</div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="fw-bold">Date de fin de la tache : </div>
                            <div>{{ $tache->fin ?? 'Non défini' }}</div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="fw-bold">Date d'expiration : </div>
                            <div>{{ $tache->echance ?? 'Non défini' }}</div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">
                    <div class="card-title">Sous tache</div>
                    <div class="card-actions">
                        <button class="btn btn-primary" disabled> Ajouter une sous tache</button>
                    </div>
                </div>
                <div class="card-body">

                </div>
                <div class="card-footer">

                </div>
            </div>

        </div>
    </div>


    @component('components.modal', ["id"=>'editTache', 'title' => 'Editer une tache'])
        <form class="row" wire:submit="update_tache">
            @include('_form.tache_form')
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" wire:click='delete()'
                    wire:confirm="Etes vous sur de vouloir supprimer cette tache ?"><i class="ti ti-trash"></i></button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-primary">Valider</button>
            </div>
        </form>
        <script> window.addEventListener('open-editTache', event => { $('#editTache').modal('show'); }) </script>
        <script> window.addEventListener('close-editTache', event => { $('#editTache').modal('hide'); }) </script>
    @endcomponent






    @component('components.off-canvas',['titre'=>'Demo'])
        sfsdqf
    @endcomponent
</div>
