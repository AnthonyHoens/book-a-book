@php
    if (\Illuminate\Support\Facades\Auth::user()->isAdmin) {
        $notifsHref = route('admin.notifs.page');
        $profileHref = route('admin.profile.show', Illuminate\Support\Facades\Auth::user()->slug);

    } else {
        $notifsHref = route('notifs.page');
        $profileHref = route('profile.show', Illuminate\Support\Facades\Auth::user()->slug);
    }

@endphp


<div class="profil">
    <div class="icons">
        <a href="{{ $notifsHref }}">
            <img src="{{ asset('/images/icons/notification_icon.svg') }}" alt="">
        </a>
    </div>
    <div class="profil_img">
        <a href="{{ $profileHref }}">
            <img src="{{ asset('images/users/small/' . \Illuminate\Support\Facades\Auth::user()->image) }}" alt="Photo de profil de {{ $user->first_name . ' ' . $user->name }}">
        </a>
    </div>
    <div class="content">
        <h2 role="heading" aria-level="2">
            <a href="{{ $profileHref }}">{{ $user->first_name . ' ' . $user->name }}</a>
        </h2>
    </div>
</div>
