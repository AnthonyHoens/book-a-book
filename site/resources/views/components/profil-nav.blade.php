<nav role="navigation" class="profil_nav">
    <h2 role="heading" aria-level="2" class="title">
        {{ __('Profil') }}
    </h2>
    <ul>
        <x-link href="{{ route('profile.show', \Illuminate\Support\Facades\Auth::user()->slug) }}" :active="request()->routeIs('profile.show', \Illuminate\Support\Facades\Auth::user()->slug)">{{ __('Information utilisateur') }}</x-link>
        <x-link href="{{ route('order.page') }}" :active="request()->routeIs('order.page')
                                                           || request()->routeIs('order.show')
                                                           || request()->routeIs('order.paid.page')">{{ __('Mes commandes') }}</x-link>
        <x-link href="{{ route('history.page') }}" :active="request()->routeIs('history.page')">{{ __('Historique') }}</x-link>
        <x-link href="{{ route('notifs.page') }}" :active="request()->routeIs('notifs.page')">{{ __('Notifications') }}</x-link>
        <x-link href="{{ route('settings.page') }}" :active="request()->routeIs('settings.page')">{{ __('Paramètres') }}</x-link>
    </ul>
    <form action="{{ route('logout') }}" method="post" class="logout">
        @csrf
        <input type="submit" id="logout" name="logout" value="{{ __('Se déconnecter') }}">
    </form>
</nav>
