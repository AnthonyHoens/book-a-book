<x-layout>
    <x-slot name="title">Inscription</x-slot>
    <x-slot name="content">
        <section class="container all_page_flex book_form">
            <div class="auth_logo">
                <a href="{{ route('login') }}">
                    <img src="{{ asset('images/logo/book_a_book.svg') }}" alt="Logo de Book a book">
                </a>
            </div>
            <h2 class="title">{{ __('S\'inscrire') }}</h2>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="field">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Entrer votre nom" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <p class="error" role="alert">
                                <strong>{{ $message }}</strong>
                            </p>
                        @enderror
                    </div>
                </div>

                <div class="field">
                    <label for="firstName" class="col-md-4 col-form-label text-md-right">{{ __('Prénom') }}</label>

                    <div class="col-md-6">
                        <input id="firstName" type="text" class="form-control @error('firstName') is-invalid @enderror" placeholder="Entrer votre prénom" name="firstName" value="{{ old('firstName') }}" required  autofocus>

                        @error('firstName')
                            <p class="error" role="alert">
                                <strong>{{ $message }}</strong>
                            </p>
                        @enderror
                    </div>
                </div>

                <div class="field">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Adresse e-mail') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Entrer votre adresse e-mail" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <p class="error" role="alert">
                                <strong>{{ $message }}</strong>
                            </p>
                        @enderror
                    </div>
                </div>

                <div class="custom-select">
                    <label for="group" class="col-md-4 col-form-label text-md-right">{{ __('Groupe') }}</label>

                    <div class="col-md-6">
                        <select id="group" name="group" class="form-control @error('email') is-invalid @enderror" value="{{ old('group') }}" required>
                            @foreach($groups as $group)
                                <option value="{{ $group->id }}">{{ $group->number }}</option>
                            @endforeach
                        </select>
                        @error('group')
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
                        {{ __('S\'inscrire') }}
                    </button>
                </div>

                <div class="action">
                    <p>
                        Vous avez déja un compte
                    </p>
                    <a href="{{ route('login') }}" class="forgot">Se connecter</a>
                </div>
            </form>
        </section>
    </x-slot>
</x-layout>


