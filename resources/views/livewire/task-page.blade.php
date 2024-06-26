<div>
    @component('components.page-header', ['title'=>'Taches', 'breadcrumbs'=>$breadcrumbs])
        @component('components.off-canvas',['titre'=>'Demo'])
            Informations
        @endcomponent
    @endcomponent

    <div class="row g-2">
        <div class="col-md-4">
            <div class="card mb-2">
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

            <div class="card mb-2">
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

            <div class="row g-2">
                {{-- Sous tache --}}
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Sous tache</div>
                            <div class="card-actions">
                                <button class="btn btn-primary" wire:click="add_soustache()"> Ajouter une sous tache</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row g-2">
                                @forelse ($soustaches as $soustache)
                                    <div class="col-md-12 border rounded p-1">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <i class="ti ti-circle"></i>
                                            </div>
                                            <div class="col">
                                                {{ $soustache->name }}
                                            </div>
                                            <div class="col-auto">
                                                <button class="btn btn-primary btn-pill btn-sm btn-icon" wire:click="edit_soustache('{{ $soustache->id }}')">
                                                    <i class="ti ti-edit"></i>
                                                </button>
                                                <button class="btn btn-danger btn-pill btn-sm btn-icon" wire:click="delete_soustache('{{ $soustache->id }}')">
                                                    <i class="ti ti-x"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    @component('components.no-result')

                                    @endcomponent
                                @endforelse

                            </div>

                        </div>
                        <div class="card-footer">

                        </div>
                    </div>
                </div>
                {{-- Liens --}}
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Liens</div>
                            <div class="card-actions">
                                @livewire('document-add', ['tache_id' => $tache->id])
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row g-2">
                                @foreach ($documents as $document)
                                    <div class="col-md-4">
                                        <div class="border rounded p-1 d-flex justify-content-between align-items-center">
                                            <div>
                                                @if ($document->link)
                                                    <a href="{{ $document->link }}" target="_blank">{{ $document->name }}</a>
                                                @else
                                                    {{ $document->name }}
                                                @endif
                                            </div>
                                            <div>
                                                <button class="btn btn-action" wire:click="edit_link('{{ $document->id }}')">
                                                    <i class="ti ti-edit"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        {{-- <div class="card-footer">

                        </div> --}}
                    </div>
                </div>
                {{-- <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Document</div>
                            <div class="card-actions">
                                <button class="btn btn-primary" disabled> Ajouter une sous tache</button>
                            </div>
                        </div>
                        <div class="card-body">

                        </div>
                        <div class="card-footer">

                        </div>
                    </div>
                </div> --}}
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

    @component('components.modal', ["id"=>'editLink', 'title' => 'Editer un lien'])
        <form class="row" wire:submit="update_link">
            @include('_form.document_form')
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" wire:click='delete()'
                    wire:confirm="Etes vous sur de vouloir supprimer cette tache ?"><i class="ti ti-trash"></i></button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-primary">Valider</button>
            </div>
        </form>
        <script> window.addEventListener('open-editLink', event => { $('#editLink').modal('show'); }) </script>
        <script> window.addEventListener('close-editLink', event => { $('#editLink').modal('hide'); }) </script>
    @endcomponent

    {{-- Sous tache --}}
    @component('components.modal', ["id"=>'addSubTask', 'title' => 'Ajouter une soustache'])
        <form class="row" wire:submit="store_soustache">
            @include('_form.soustache_form')
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" wire:click='delete()'
                    wire:confirm="Etes vous sur de vouloir supprimer cette tache ?"><i class="ti ti-trash"></i></button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-primary">Valider</button>
            </div>
        </form>
        <script> window.addEventListener('open-addSubTask', event => { $('#addSubTask').modal('show'); }) </script>
        <script> window.addEventListener('close-addSubTask', event => { $('#addSubTask').modal('hide'); }) </script>
    @endcomponent
    @component('components.modal', ["id"=>'editSubTask', 'title' => 'Editer une soustache'])
        <form class="row" wire:submit="update_soustache">
            @include('_form.soustache_form')
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" wire:click='delete()' wire:confirm="Etes vous sur de vouloir supprimer cette tache ?"><i class="ti ti-trash"></i></button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-primary">Valider</button>
            </div>
        </form>
        <script> window.addEventListener('open-editSubTask', event => { $('#editSubTask').modal('show'); }) </script>
        <script> window.addEventListener('close-editSubTask', event => { $('#editSubTask').modal('hide'); }) </script>
    @endcomponent
</div>
