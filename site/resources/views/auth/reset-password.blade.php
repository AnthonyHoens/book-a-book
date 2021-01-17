<x-layout>
    <x-slot name="title">Réinitialisation du mot de passe</x-slot>
    <x-slot name="content">
        <section class="container all_page_flex book_form">
            <div class="auth_logo">
                <a href="{{ route('login') }}">
                    <img src="{{ asset('images/logo/book_a_book.svg') }}" alt="Logo de Book a book">
                </a>
            </div>
            <h2 class="title">{{ __('Changement du mot de passe') }}</h2>

            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ request()->route('token') }}">

                <div class="field">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Adresse e-mail') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Entrer votre adresse e-mail" value="{{ request()->get('email') ?? old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <p class="error" role="alert">
                                <strong>{{ $message }}</strong>
                            </p>
                        @enderror
                    </div>
                </div>

                <div class="field">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mot de passe') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Entrer votre mot de passe" name="password" required autocomplete="new-password">

                        @error('password')
                            <p class="error" role="alert">
                                <strong>{{ $message }}</strong>
                            </p>
                        @enderror
                    </div>
                </div>

                <div class="field">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmation du mot de passe') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirmer votre mot de passe" required autocomplete="new-password">
                    </div>
                </div>

                <div class="submit">
                    <button type="submit" class="link">
                        {{ __('Réinitialiser votre mot de passe') }}
                    </button>
                </div>
            </form>
        </section>
    </x-slot>
</x-layout>

