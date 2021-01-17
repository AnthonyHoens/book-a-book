<x-layout>
    <x-slot name="title">Mot de passe oublié</x-slot>
    <x-slot name="content">
        <section class="container all_page_flex book_form">
            <div class="auth_logo">
                <a href="{{ route('login') }}">
                    <img src="{{ asset('images/logo/book_a_book.svg') }}" alt="Logo de Book a book">
                </a>
            </div>
            <h2 class="title">{{ __('Réinitialiser le mot de passe') }}</h2>

            @if (session('status'))
                <div class="success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="field">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Adresse e-mail') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Entrer votre mot de passe" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <p class="error" role="alert">
                                <strong>{{ $message }}</strong>
                            </p>
                        @enderror
                    </div>
                </div>

                <div class="submit">
                    <button type="submit" class="link">
                        {{ __('Confirmer') }}
                    </button>
                </div>
            </form>

        </section>
    </x-slot>
</x-layout>







