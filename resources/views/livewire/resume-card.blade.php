<div class="row g-2">
    @foreach ($taches as $key => $tache)
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <div class="fw-bold mt-1">
                            <a class="text-dark fs-3" href="{{ route('tache',['tache_id'=>$tache->id]) }}">{{ $tache->titre }}</a>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-12 col-md">
                            <div class="border-bottom pb-2">
                                <div>
                                    <span class="fw-bold">Client : </span><a href="{{ route('client',['client_id'=>$tache->projet->client->id]) }}">{{ $tache->projet->client->name }}</a>
                                </div>
                                <div>
                                    <span class="fw-bold">Projet : </span><a href="{{ route('projet',['projet_id'=> $tache->projet->id]) }}">{{ $tache->projet->name }}</a>
                                </div>
                            </div>


                        </div>
                        <div class="col-6 col-md-auto">
                            <div class="d-flex flex-row-reverse">
                                <div class="mx-1">
                                    <div class="text-center">Progression</div>
                                    <div class="badge rounded-pill bg-{{ $tache->progression->color }}">
                                        {{ $tache->progression->name }}
                                    </div>
                                </div>
                               <div class="mx-1">
                                    <div class="text-center">Priorité</div>
                                    <div class="badge rounded-pill bg-{{ $tache->priorite->color }}">
                                        {{ $tache->priorite->name }}
                                    </div>
                               </div>

                            </div>
                        </div>
                        <div class="col-6 col-md-auto">
                            <div class="dropdown">
                                <a href="#" class="btn btn-icon btn-primary " data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="ti ti-dots-vertical"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" wire:click="edit('{{ $tache->id }}')"> Editer</a>
                                    <a class="dropdown-item" href="{{ route('tache',['tache_id'=> $tache->id]) }}">Détails</a>
                                    <a class="dropdown-item text-danger"> Delete user</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-md-8">
                            @if ($tache->description)
                                <div class="my-2 border rounded p-2">
                                    {!! nl2br($tache->description) !!}
                                </div>
                            @endif
                        </div>
                        <div class="col-md-4 mt-3">
                            @if ($tache->debut || $tache->fin || $tache->echeance)
                                <div class="border border-primary rounded p-2">
                                    @if ($tache->debut)
                                        <div class="d-flex justify-content-between">
                                            <div class="fw-bold">Date de debut : </div>
                                            <div>{{ $carbon->create($tache->debut)->locale('fr_FR')->isoFormat('Do MMMM YYYY') ?? 'Non défini' }}</div>
                                        </div>
                                    @endif
                                    @if ($tache->fin)
                                        <div class="d-flex justify-content-between">
                                            <div class="fw-bold">Date de fin : </div>
                                            <div>{{ $carbon->create($tache->fin)->locale('fr_FR')->isoFormat('Do MMMM YYYY') ?? 'Non défini' }}</div>
                                        </div>
                                    @endif
                                    @if ($tache->echeance)
                                        <div class="d-flex justify-content-between">
                                            <div class="fw-bold">Date d'expiration : </div>
                                            <div>{{ $carbon->create($tache->echeance)->locale('fr_FR')->isoFormat('Do MMMM YYYY') ?? 'Non défini' }}</div>
                                        </div>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @component('components.modal', ["id"=>'editTache', 'title' => 'Editer une tache'])
    <form class="row" wire:submit="update">
        @include('_form.tache_form')
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" wire:click='delete()'
                wire:confirm="Etes vous sur de vouloir supprimer cette tache ?"><i class="ti ti-trash"></i></button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            <button type="submit" class="btn btn-primary">Valider</button>
        </div>
    </form>
    <script>
        window.addEventListener('open-editTache', event => { $('#editTache').modal('show'); })
    </script>
    <script>
        window.addEventListener('close-editTache', event => { $('#editTache').modal('hide'); })
    </script>
    @endcomponent
</div>
