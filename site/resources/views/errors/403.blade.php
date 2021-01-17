<x-layout>
    <x-slot name="title">Erreur 403</x-slot>
    <x-slot name="content">
        <div class="internal_error_container">
            <p class="internal_error">
                Erreur 403
            </p>
            <a href="{{ route('home.page') }}" class="redirect">Retourner à la page d'accueil</a>
        </div>
    </x-slot>
</x-layout>
