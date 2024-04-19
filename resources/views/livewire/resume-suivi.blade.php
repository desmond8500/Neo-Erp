<div>
    <div class="card">
        <div class="card-header">
            @if ($projet)
            <div class="card-title">Taches du projet {{ $projet->name }}</div>
            @else
            <div class="card-title">Liste des taches</div>
            @endif
            <div class="card-actions">
                @if ($projet)
                @livewire('tache-add',['projet_id'=>$projet->id])
                @endif
            </div>
        </div>
        <div class="table-responsive d-none d-sm-block">
            <table class="table ">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Taches</th>
                        <th scope="col" style="text-center">Progression</th>
                        <th scope="col" style="text-center">Priorité</th>
                        <th scope="col">Date de début</th>
                        <th scope="col">Echéance</th>
                        <th scope="col">Assigné à</th>
                        <th scope="col">Livrable</th>
                        <th scope="col">Commentaires</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($taches as $key => $tache)
                    <tr class="">
                        <td scope="row" class="fw-bold">{{ $key+1 }}</td>
                        <td>
                            <div class="text-primary fw-bold"><a href="{{ route('client',['client_id'=>$tache->projet->client->id]) }}">{{ $tache->projet->client->name }}</a> / <a href="{{ route('projet',['projet_id'=> $tache->projet->id]) }}">{{ $tache->projet->name }}</a></div>
                            <div>{{ $tache->titre }}</div>
                        </td>
                        <td class="text-center">
                            <div class="badge bg-{{ $tache->progression->color }}">{{ $tache->progression->name }}</div>
                        </td>
                        <td class="text-center">
                            <div class="badge bg-{{ $tache->priorite->color }}">{{ $tache->priorite->name }}</div>
                        </td>
                        <td>{{ $tache->debut }}</td>
                        <td>{{ $tache->echeance }}</td>
                        <td> 00 </td>
                        <td> 00 </td>
                        <td>

                        </td>
                        <td style="width: 10px">
                            {{-- <button class="btn btn-primary btn-icon" wire:click="edit('{{ $tache->id }}')"><i class="ti ti-edit"></i></button> --}}
                            <div class="dropdown">
                                <a href="#" class="btn btn-icon btn-primary " data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="ti ti-dots-vertical"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" wire:click="edit('{{ $tache->id }}')"> Editer</a>
                                    <a class="dropdown-item" wire:click="details('{{ $tache->id }}')">Détails</a>
                                    {{-- <a class="dropdown-item text-danger" href="#">Delete user</a> --}}
                                </div>
                            </div>
                        </td>
                    </tr>

                    @endforeach

                </tbody>
            </table>
        </div>
        <div class="card-footer d-none d-sm-block">
            {{ $taches->links() }}
        </div>

    </div>

    <div class="row g-2 mt-2 d-block d-sm-none">
        @foreach ($taches as $tache)
            <div class="col-md-4" type="button" wire:click="details('{{ $tache->id }}')">
                <div class="card">

                    <div class="card-body row">
                        <div class="col">
                            <div class="text-primary fw-bold">
                                <a href="{{ route('client',['client_id'=>$tache->projet->client->id]) }}">{{ $tache->projet->client->name }}</a> /
                                <a href="{{ route('projet',['projet_id'=> $tache->projet->id]) }}">{{ $tache->projet->name }}</a>
                            </div>
                            <div>{{ $tache->titre }}</div>
                        </div>
                        <div class="col-auto">
                            <div class="d-flex flex-column">
                                <div class="badge mb-1 bg-{{ $tache->progression->color }}">{{ $tache->progression->name }}</div>
                                <div class="badge bg-{{ $tache->priorite->color }}">{{ $tache->priorite->name }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="card">
            {{ $taches->links() }}
        </div>
    </div>

    @component('components.modal', ["id"=>'editTache', 'title' => 'Editer une tache'])
        <form class="row" wire:submit="update">
            @include('_form.tache_form')
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" wire:click='delete()' wire:confirm="Etes vous sur de vouloir supprimer cette tache ?"><i class="ti ti-trash"></i></button>
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

    @component('components.modal', ["id"=>'tacheDetail', 'title' => 'Détail de la tache'])
        <div>
            dd
        </div>

        <script> window.addEventListener('open-tacheDetail', event => { $('#tacheDetail').modal('show'); }) </script>
        <script> window.addEventListener('close-tacheDetail', event => { $('#tacheDetail').modal('hide'); }) </script>
    @endcomponent
</div>
