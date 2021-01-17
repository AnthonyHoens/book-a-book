<section class="user">
    <form action="{{ route('profile.show', \Illuminate\Support\Facades\Auth::user()->slug) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="user__info">
            <div class="user__img__container">
                <div class="user__img">
                    <img src="{{ asset('images/users/full/' . $user->image) }}" id="profilImg" alt="Photo de profil de {{ $user->first_name . ' ' . $user->name }}">
                </div>
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
                @if($user->group)
                    <p>
                        <span>
                            {{ $user->group->number }}
                        </span>
                    </p>
                @endif
            </div>
        </div>

        <div class="field">
            <label for="name">{{ __('Nom') }}</label>
            <input type="text" id="name" name="name" value="{{ $user->name }}" placeholder="Entrer votre nom">
            @error('name')
                <p class="error">
                    {{ $message }}
                </p>
            @enderror
        </div>

        <div class="field">
            <label for="firstName">{{ __('Prénom') }}</label>
            <input type="text" id="firstName" name="firstName" value="{{ $user->first_name }}" placeholder="Entrer votre prénom">
            @error('firstName')
                <p class="error">
                    {{ $message }}
                </p>
            @enderror
        </div>

        <div class="field">
            <label for="email">{{ __('Adresse e-mail') }}</label>
            <input type="email" id="email" name="email" value="{{ $user->email }}" placeholder="Entrer votre adresse e-mail">
            @error('email')
                <p class="error">
                    {{ $message }}
                </p>
            @enderror
        </div>

        @if($user->group)
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
        @endif

        <div id="file_container" class="field">
            <label for="file">{{ __('Changez de photo de profil') }}</label>
            <input type="file" id="file" name="file">
        </div>

        <div class="submit">
            <input type="submit" value="{{ __('Sauvegarder mon profil') }}">
        </div>

        <script>
            const container = document.querySelector('#file_container');
            const input = document.querySelector('#file_container input')
            const newImg = document.createElement('img');
            container.classList.add('sr-only');

            document.onload = load();

            function load() {
                const div = document.querySelector('.user__img__container');
                newImg.src = '{{ asset('images/icons/profil_file.svg') }}';
                newImg.classList.add('img_file');

                div.appendChild(newImg);
            }

            newImg.addEventListener('click', function () {
               input.click();
            });

            input.addEventListener('change', function (){
                const curFiles = input.files;

                for(const file of curFiles) {
                    if(file) {
                        const image = document.querySelector('#profilImg');
                        image.src = URL.createObjectURL(file);
                    }
                }

            }, false);
        </script>
    </form>
</section>
