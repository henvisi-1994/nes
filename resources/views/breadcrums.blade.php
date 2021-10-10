<ul class="flex py-1  pr-1 text-gray-500 text-sm lg:text-base place-content-end">
    <li>
        @if ($isactive == 'momentos')
            <a href="/" class="p-2 rounded bg-teal-400 text-red-600 shadow-xs">Momentos</a>
        @else
            <a href="/momentos"
                class="p-2 rounded bg-white hover:bg-teal-400 hover:text-red-600 transition ease-out duration-200">Momentos</a>
        @endif

    </li>
    <li>
        @if ($isactive == 'conocer')
            <a href="/" class="p-2 rounded bg-teal-400 text-red-600 shadow-xs">Conocer</a>
        @else
            <a href="/conocer"
                class="p-2 rounded bg-white hover:bg-teal-400 hover:text-red-600 transition ease-out duration-200">Conocer</a>
        @endif

    </li>
    <li>
        @if ($isactive == 'eventos')
            <a href="/" class="p-2 rounded bg-teal-400 text-red-600 shadow-xs">Eventos</a>
        @else
            <a href="/eventos"
                class="p-2 rounded bg-white hover:bg-teal-400 hover:text-red-600 transition ease-out duration-200">Eventos</a>
        @endif
    </li>
    <li>
        @if ($isactive == 'cadfavores')
            <a href="/" class="p-2 rounded bg-teal-400 text-red-600 shadow-xs">Cadena
                de Favores</a>
        @else
            <a href="/cadfavores"
                class="p-2 rounded bg-white hover:bg-teal-400 hover:text-red-600 transition ease-out duration-200">Cadena
                de Favores</a>
        @endif

    </li>
    <li>
        @if ($isactive == 'viajes')
            <a href="/" class="p-2 rounded bg-teal-400 text-red-600 shadow-xs">Viajes</a>
        @else
            <a href="/viajes"
                class="p-2 rounded bg-white hover:bg-teal-400 hover:text-red-600 transition ease-out duration-200">Viajes</a>
        @endif

    </li>
    <li>
        @if ($isactive == 'blog')
            <a href="/" class="p-2 rounded bg-teal-400 text-red-600 shadow-xs">Blog</a>
        @else
            <a href="/blog"
                class="p-2 rounded bg-white hover:bg-teal-400 hover:text-red-600 transition ease-out duration-200">Blog</a>
        @endif

    </li>
    <li>
        @if ($isactive == 'app')
            <a href="/" class="p-2 rounded bg-teal-400 text-red-600 shadow-xs">App</a>
        @else
            <a href="/app"
                class="p-2 rounded bg-white hover:bg-teal-400 hover:text-red-600 transition ease-out duration-200">App</a>
        @endif

    </li>
</ul>
