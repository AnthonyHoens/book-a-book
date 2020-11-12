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
        <form action="" method="get">
            <x-search-bar></x-search-bar>
        </form>

        <!--  Profile -->
        <x-user-banner :user="Auth::user()"></x-user-banner>
    </div>
</div>
