<div class="card p-2 ">
    <div class="row">
        <div class="col-auto" type="button" wire:click="select_project('{{ $projet->id }}')">
            @isset ($projet->client->logo)
                <img class="avatar" src="{{ asset($projet->client->logo)  }}" alt="A">
            @else
                <img class="avatar" src="{{ asset('img/avatar/project.png')  }}" alt="A">
            @endisset
        </div>
        {{-- Hidden only on xs --}}
        <div class="col d-none d-sm-block" type="button" wire:click="select_project('{{ $projet->id }}')" style="text-decoration: none">
            <div class="fw-bold">{{ $projet->name }}</div>
        </div>

        {{-- <a class="col-auto" href="{{ route('projet',['projet_id'=> $projet->id]) }}">
            <img class="avatar " src="{{ asset($projet->client->logo ?? 'img/avatar/project.png')  }}" alt="A">
        </a> --}}

        {{-- Visible only on xs --}}
        <a class="col d-block d-sm-none" href="{{ route('projet',['projet_id'=> $projet->id]) }}" style="text-decoration: none">
            <div class="fw-bold">{{ $projet->name }}</div>
        </a>

        <div class="col-auto">
            <button class="btn btn-primary btn-icon" wire:click="projet_edit('{{ $projet->id }}')">
                <i class="ti ti-edit"></i>
            </button>
        </div>
        <div class="col-md-12">
            <div class="text-muted mt-1">{{ nl2br($projet->description) }}</div>
        </div>
    </div>
</div>
