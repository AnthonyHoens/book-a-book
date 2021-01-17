<nav role="navigation">
    <h2 role="heading" aria-level="2" class="sr-only">
        {{ __('Navigation principale') }}
    </h2>
    <ul>
        <x-link href="{{ route('home.page') }}" :active="request()->routeIs('home.page')">{{ __('Accueil') }}</x-link>
        <x-link href="{{ route('profile.show', \Illuminate\Support\Facades\Auth::user()->slug ) }}" :active="request()->routeIs('profile.show') ||
                                                            request()->routeIs('history.page') ||
                                                            request()->routeIs('notifs.page') ||
                                                            request()->routeIs('settings.page')">{{ __('Profil') }}</x-link>
        <x-link href="{{ route('book.page') }}" :active="request()->routeIs('book.page') ||
                                                         request()->routeIs('book.show')">{{ __('Livres') }}</x-link>
        <x-link href="{{ route('order.page') }}" :active="request()->routeIs('order.page')
                                                            || request()->routeIs('order.show')
                                                            || request()->routeIs('order.paid.page')">{{ __('Mes commandes') }}</x-link>
    </ul>
</nav>
