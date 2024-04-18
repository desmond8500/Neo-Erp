<div>
    @component('components.page-header', ['title'=> 'Tableau de bord'])

    @endcomponent

    <div class="row">
        @auth
            <div class="col-md-12">
                @livewire('resume-suivi')
            </div>
            
        @endauth
    </div>
</div>
