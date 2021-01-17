<nav role="navigation">
    <h2 role="heading" aria-level="2" class="sr-only">
        {{ __('Navigation principale') }}
    </h2>
    <ul>
        <x-link href="{{ route('admin.home.page') }}" :active="request()->routeIs('admin.home.page')">{{ __('Accueil') }}</x-link>
        <x-link href="{{ route('admin.profile.show', \Illuminate\Support\Facades\Auth::user()->slug) }}"
                :active="request()->routeIs('admin.profile.show', \Illuminate\Support\Facades\Auth::user()->slug)
                         || request()->routeIs('admin.history.page')
                         || request()->routeIs('admin.notifs.page')
                         || request()->routeIs('admin.settings.page')
                        ">{{ __('Profil') }}</x-link>
        <x-link href="{{ route('admin.book.page') }}" :active="request()->routeIs('admin.book.page')
                                                                || request()->routeIs('admin.book.create')
                                                                || request()->routeIs('book.show')"
                                                        >{{ __('Livres') }}</x-link>
        <x-link href="{{ route('admin.order.page') }}" :active="request()->routeIs('admin.order.page')
                                                               || request()->routeIs('admin.order.user.page')
                                                               || request()->routeIs('admin.order.user.show')
                                                               ">{{ __('Commande') }}</x-link>
    </ul>
</nav>
