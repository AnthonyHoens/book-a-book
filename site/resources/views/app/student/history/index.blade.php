<x-layout>
    <x-slot name="title">{{ __('Mes commandes')  }}</x-slot>
    <x-slot name="content">
        <div class="profil_flex">
            <x-profil-nav></x-profil-nav>
            <hr>
            <x-history :histories="$histories" :userName="false">
                <x-slot name="title">Historique</x-slot>
            </x-history>
        </div>
    </x-slot>
</x-layout>
