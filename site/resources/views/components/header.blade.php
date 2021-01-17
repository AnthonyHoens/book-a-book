
<!-- Container -->
<div class="container">

    <!-- Logos parts -->
    <div class="logo">
        <h1 role="heading" aria-level="1">
            <a href="{{ route('home.page') }}">
                <img src="{{ asset('images/logo/book_a_book.svg') }}" alt="Logo de {{ config('app.name') }}">
            </a>
        </h1>
    </div>

    <!-- Navigation -->
    <x-nav></x-nav>

    <!-- Search Bar -->
    @livewire('search-bar')


    <!-- Notifications and profile -->
    <div class="profil_info">
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

    <x-nav></x-nav>
</div>

<script src="{{ asset('js/menu.js') }}"></script>

