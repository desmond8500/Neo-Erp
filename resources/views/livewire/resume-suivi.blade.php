<div class="card">
    <div class="card-header">
        <div class="card-title">Taches du projet {{ $projet->name }}</div>
        <div class="card-actions">
            @livewire('tache-add',['projet_id'=>$projet->id])
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
                        <td>{{ $tache->titre }}</td>
                        <td>{{ $tache->progression->name }}</td>
                        <td>{{ $tache->priorite->name }}</td>
                        <td>{{ $tache->debut }}</td>
                        <td>{{ $tache->echeance }}</td>
                        <td> 00  </td>
                        <td> 00 </td>
                        <td> 00 </td>
                        <td>
                            <button class="btn btn-primary btn-icon" ><i class="ti ti-edit"></i></button>
                            <button class="btn btn-danger btn-icon" ><i class="ti ti-trash"></i></button>
                        </td>
                    </tr>

                @endforeach

            </tbody>
        </table>
    </div>
</div>
