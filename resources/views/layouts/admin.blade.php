<html>
    <head>
        <title>{{ $title ?? 'Brand management' }}</title>
    </head>
    <body>
        <!-- header -->
        @if (isset($header))
            {{ $header }}
        @endif

        <!-- content -->
        <main class="">
            @if ($slot->isEmpty())
                This is default contt ent if the slot is empty
            @else
                {{ $slot }}
            @endif
        </main>
        <!-- footer -->

        <x-admin.footer />
    </body>
</html>

