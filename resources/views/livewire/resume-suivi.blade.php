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
        <div class="table-responsive">
            <table class="table ">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Taches</th>
                        <th scope="col">Progression</th>
                        <th scope="col">Priorité</th>
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
                            <div class="text-primary"><a href="{{ route('client',['client_id'=>$tache->projet->client->id]) }}">{{ $tache->projet->client->name }}</a> / <a href="{{ route('projet',['projet_id'=> $tache->projet->id]) }}">{{ $tache->projet->name }}</a></div>
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
                        <td> 00 </td>
                        <td>
                            <button class="btn btn-primary btn-icon" wire:click="edit('{{ $tache->id }}')"><i class="ti ti-edit"></i></button>
                        </td>
                    </tr>

                    @endforeach

                </tbody>
            </table>
        </div>
        <div class="card-footer">
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
</div>
