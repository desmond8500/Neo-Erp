<div>
    @component('components.page-header', ['title'=>'Projet', 'breadcrumbs'=>$breadcrumbs])
    @endcomponent


    <div class="row">
        <div class="col-md-3">
            @include('_card.projet_card',['projet'=> $projet])
        </div>
        <div class="col-md-9">
            @livewire('resume-suivi',['projet_id'=> $projet->id])
        </div>
    </div>
</div>
