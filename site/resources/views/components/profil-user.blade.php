<section class="user">
    <form action="{{ route('profile.show', \Illuminate\Support\Facades\Auth::user()->slug) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="user__info">
            <div class="user__img">
                <img src="{{ asset('images/users/full/' . $user->image) }}" alt="Photo de profil de {{ $user->first_name . ' ' . $user->name }}">
            </div>
            <div class="user__description">
                <h3 role="heading" aria-level="3">
                    {{ $user->name . ' ' . $user->first_name }}
                </h3>
                <p>
                    @foreach($user->roles as $role)
                        <span>{{ $role->name }}</span>
                    @endforeach
                </p>
                <p>
                    <span>
                        {{ $user->group->number }}
                    </span>
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

        <div class="custom-select" style="width: 333px">
            <label for="group">{{ __('Groupe') }}</label>
            <noscript>
                <select name="group" id="group" class="show">
                    @foreach($groups as $group)
                        <option value="{{ $group->id }}"
                                @if($group->number == $user->group->number)
                                selected
                            @endif
                        >{{ $group->number }}</option>
                    @endforeach
                </select>
            </noscript>
            <select name="group" id="group">
                @foreach($groups as $group)
                    <option value="{{ $group->id }}"
                    @if($group->number == $user->group->number)
                        selected
                    @endif
                        >{{ $group->number }}</option>
                @endforeach
            </select>
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
