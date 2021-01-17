<!-- Container -->
<div class="container">

    <!-- Logos parts -->
    <div class="logo">
        <h1 role="heading" aria-level="1">
            <a href="{{ route('admin.home.page') }}">
                <img src="{{ asset('images/logo/book_a_book.svg') }}" alt="Logo de {{ config('app.name') }}">
            </a>
        </h1>
    </div>

    <!-- Admin Navigation -->
    <x-admin-nav></x-admin-nav>

    <!-- Notifications and profile -->
    <div class="profil_info">

        <!-- Search Bar -->
        @livewire('search-bar')

        <!--  Profile -->
        <x-user-banner :user="Auth::user()"></x-user-banner>
        <div id="clicker" class="clicker_open">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</div>

<div id="menu" class="menu_closed">
    @livewire('search-bar')

    <x-admin-nav></x-admin-nav>
</div>

<script src="{{ asset('js/menu.js') }}"></script>
