<nav role="navigation">
    <h2 role="heading" aria-level="2" class="sr-only">
        {{ __('Navigation principale') }}
    </h2>
    <ul>
        <x-link href="{{ route('admin.home.page') }}" :active="request()->routeIs('admin.home.page')">{{ __('Accueil') }}</x-link>
        <x-link href="{{ route('admin.profile.page') }}" :active="request()->routeIs('admin.profile.page')">{{ __('Mon profil') }}</x-link>
        <x-link href="{{ route('admin.book.page') }}" :active="request()->routeIs('admin.book.page')">{{ __('Livres') }}</x-link>
        <x-link href="{{ route('admin.order.page') }}" :active="request()->routeIs('admin.order.page')">{{ __('Commande') }}</x-link>
    </ul>
</nav>
