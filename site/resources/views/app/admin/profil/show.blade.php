<x-layout>
    <x-slot name="title">{{ __('Mon profil') . ' | ' . $user->full_name }}</x-slot>
    <x-slot name="content">
        <div class="profil_flex">
            <x-profil-nav></x-profil-nav>
            <hr>
            <section class="user">
                <form action="{{ route('profile.show', \Illuminate\Support\Facades\Auth::user()->slug) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="user__info">
                        <div class="user__img">
                            <img src="{{ asset('images/users/full/' . $user->image) }}" alt="Photo de profil de {{ $user->full_name }}">
                        </div>
                        <div class="user__description">
                            <h3 role="heading" aria-level="3">
                                {{ $user->full_name }}
                            </h3>
                            <p>
                                @foreach($user->roles as $role)
                                    <span>{{ $role->name . ',' }}</span>
                                @endforeach
                            </p>
                        </div>
                    </div>

                    <div class="field">
                        <label for="name">{{ __('Nom') }}</label>
                        <input type="text" id="name" name="name" value="{{ $user->name }}">
                        @error('name')
                        <p class="error">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="firstName">{{ __('Prénom') }}</label>
                        <input type="text" id="firstName" name="firstName" value="{{ $user->first_name }}">
                        @error('firstName')
                        <p class="error">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="email">{{ __('Adresse e-mail') }}</label>
                        <input type="email" id="email" name="email" value="{{ $user->email }}">
                        @error('email')
                        <p class="error">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="email">{{ __('Profession') }}</label>
                        <input type="text" id="email" name="email" value="{{ $user->roles[count($user->roles) - 1]->name }}">
                        @error('email')
                        <p class="error">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>


                    <div class="field">
                        <label for="file">{{ __('Changez de photo de profil') }}</label>
                        <input type="file" id="file" name="file">
                    </div>

                    <div class="submit">
                        <input type="submit" value="{{ __('Sauvegarder mon profil') }}">
                    </div>
                </form>
            </section>

        </div>
    </x-slot>
</x-layout>
