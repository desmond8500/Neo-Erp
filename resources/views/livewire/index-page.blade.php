<div>
    @component('components.page-header', ['title'=> 'Tableau de bord'])

    @endcomponent

    <div class="row g-2">
        @auth
            <div class="col-md-12">
                @livewire('resume-suivi')
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Planning Hobdomadaire</div>
                        <div class="card-actions">
                            <button class="btn btn-primary" disabled>Editer</button>
                        </div>
                    </div>
                </div>
            </div>
        @else

        <div class="card">
            <div class="card-body">
                Vous devez etre connecté pour accéder aux ressouces de cette application.
            </div>
        </div>

        @endauth
    </div>

</div>
