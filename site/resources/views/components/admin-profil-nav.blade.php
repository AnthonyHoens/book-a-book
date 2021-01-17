<div class="imgClicker">
    <img src="{{ asset('images/icons/arrow.svg') }}" class="arrow_right" alt> <span>Afficher la navigation secondaire</span>
</div>
<nav role="navigation" class="profil_nav closed">
    <h2 role="heading" aria-level="2" class="title">
        {{ __('Profil') }}
    </h2>


    <ul>
        <x-link href="{{ route('admin.profile.show', \Illuminate\Support\Facades\Auth::user()->slug) }}" :active="request()->routeIs('admin.profile.show', \Illuminate\Support\Facades\Auth::user()->slug)">{{ __('Information utilisateur') }}</x-link>
        <x-link href="{{ route('admin.history.page') }}" :active="request()->routeIs('admin.history.page')">{{ __('Historique') }}</x-link>
        <x-link href="{{ route('admin.notifs.page') }}" :active="request()->routeIs('admin.notifs.page')">{{ __('Notifications') }}</x-link>
        <x-link href="{{ route('admin.settings.page') }}" :active="request()->routeIs('admin.settings.page')">{{ __('Paramètres') }}</x-link>
    </ul>
    <form action="{{ route('logout') }}" method="post" class="logout">
        @csrf
        <input type="submit" id="logout" name="logout" value="{{ __('Se déconnecter') }}">
    </form>

    <script src="{{ asset('js/secondaryNav.js') }}"></script>
</nav>
