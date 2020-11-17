<div class="profil">
    <div class="icons">
        <a href="{{ route('notifs.page') }}">
            <img src="{{ asset('/images/icons/notification_icon.svg') }}" alt="">
        </a>
    </div>
    <div class="profil_img">
        <a href="{{ route('profile.show', \Illuminate\Support\Facades\Auth::user()->slug) }}">
            <img src="{{ asset('images/users/small/' . \Illuminate\Support\Facades\Auth::user()->image) }}" alt="Photo de profil de {{ $user->first_name . ' ' . $user->name }}">
        </a>
    </div>
    <div class="content">
        <h2 role="heading" aria-level="2">
            <a href="{{ route('profile.show', \Illuminate\Support\Facades\Auth::user()->slug) }}">{{ $user->first_name . ' ' . $user->name }}</a>
        </h2>
    </div>
</div>
