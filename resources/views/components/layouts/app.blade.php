<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/js/tabler.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/css/tabler.min.css">
        {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@3.2.0/tabler-icons.min.css"> --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.30.0/tabler-icons.min.css">
        <title>{{ $title ?? 'Planning NEO' }}</title>
    </head>

    <style>
        .ti{
            font-size: 20px;
        }
    </style>

    <body>
        @livewire('src.navbar')

        <div class="page-wrapper">
            {{-- <div class="page-body"> --}}
                <div class="container-xl">

                    {{ $slot }}

                </div>
            {{-- </div> --}}
        </div>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    </body>
</html>
