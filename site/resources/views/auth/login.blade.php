<x-layout>
    <x-slot name="title">Connexion</x-slot>
    <x-slot name="content">
        <section class="auth book_form container">
            <div class="auth_logo">
                <a href="{{ route('login') }}">
                    <img src="{{ asset('images/logo/book_a_book.svg') }}" alt="Logo de Book a book">
                </a>
            </div>
            <h2 class="title">{{ __('Connexion') }}</h2>

            <form method="POST" class="all_page_flex" action="{{ route('login') }}">
                @csrf

                <div class="field">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Adresse e-mail') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Entrer votre adresse e-mail" required autocomplete="email" autofocus>

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
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Entrer votre mot de passe" required autocomplete="current-password">

                        @error('password')
                            <p class="error" role="alert">
                                <strong>{{ $message }}</strong>
                            </p>
                        @enderror
                    </div>
                </div>

                <div class="special_field">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Se souvenir de moi') }}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="submit">
                        <button type="submit" class="link">
                            {{ __('Se connecter') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="forgot" href="{{ route('password.request') }}">
                                {{ __('Mot de passe oublié?') }}
                            </a>
                        @endif
                </div>

                <div class="action">
                    <p>
                        Pas encore de compte
                    </p>
                    <a href="{{ route('register') }}" class="forgot">S'inscrire</a>
                </div>
            </form>
        </section>
    </x-slot>
</x-layout>




