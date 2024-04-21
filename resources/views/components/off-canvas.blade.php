<div>
    <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#{{ $id ?? 'offcanvasExample' }}"
        aria-controls="{{ $id ?? 'offcanvasExample' }}">
        Button with data-bs-target
    </button>

    <div class="offcanvas offcanvas-start" tabindex="-1" id="{{ $id ?? 'offcanvasExample' }}" aria-labelledby="{{ $id ?? 'offcanvasExample' }}Label">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="{{ $id ?? 'offcanvasExample' }}Label">{{ $titre ?? '' }}</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            {{ $slot }}
        </div>
    </div>
</div>
