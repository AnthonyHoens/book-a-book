<x-layout>
    <x-slot name="title">{{ __('Mon profil') . ' | ' . $user->full_name }}</x-slot>
    <x-slot name="content">
        <div class="all_page_flex profil_page profil_container">
            <x-admin-profil-nav></x-admin-profil-nav>
            <hr>
            <section class="user">
                <form action="{{ route('admin.profile.update', \Illuminate\Support\Facades\Auth::user()->slug) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="user__info">
                        <div class="user__img__container">
                            <div class="user__img">
                                <img src="{{ asset('images/users/full/' . $user->image) }}" id="profilImg" alt="Photo de profil de {{ $user->full_name }}">
                            </div>
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

                    <div class="field">
                        <label for="role">{{ __('Profession') }}</label>
                        <input type="text" id="role" name="role" value="{{ $user->roles[count($user->roles) - 1]->name }}" placeholder="Entrer votre profession" disabled>
                        @error('role')
                        <p class="error">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>


                    <div id="file_container" class="field">
                        <label for="file">{{ __('Changez de photo de profil') }}</label>
                        <input type="file" id="file" name="file">
                        @error('file')
                        <p class="error">
                            {{ $message }}
                        </p>
                        @enderror
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

        </div>
    </x-slot>
</x-layout>
