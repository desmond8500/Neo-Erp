<div>
    <div>
        @component('components.page-header', ['title'=>'Profile', 'breadcrumbs'=>$breadcrumbs])
        @endcomponent
    </div>

    <div class="card">
        <div class="row g-0">
            <div class="col-12 col-md-3 border-end">
                <div class="card-body">
                    <h4 class="subheader">Profile Utilisateur</h4>
                    <div class="list-group list-group-transparent">
                        @foreach ($tabs as $tab)
                            <a href="" class="list-group-item list-group-item-action d-flex align-items-center @if($selected_tab == $tab->id) active @endif" wire:click="$selected_tab('{{ $tab->id }}')">{{ $tab->name }}</a>
                        @endforeach
                    </div>
                    <h4 class="subheader mt-4">A venir</h4>
                    <div class="list-group list-group-transparent">
                        {{-- <a href="#" class="list-group-item list-group-item-action">Give Feedback</a> --}}
                    </div>
                </div>
            </div>


            <div class="col-12 col-md-9 d-flex flex-column">
                <div class="card-body">
                    @if ($selected_tab ==0)

                        @livewire('settings.compte', key($selected_tab))
                    @else

                    @endif

                </div>
            </div>
        </div>
    </div>


</div>
