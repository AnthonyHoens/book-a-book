<x-layout>
    <x-slot name="title">{{ __('Mon Historique')  }}</x-slot>
    <x-slot name="content">
        <div class="all_page_flex profil_page profil_container">
            <x-admin-profil-nav></x-admin-profil-nav>
            <hr>
            <x-history :histories="$histories" :userName="false">
                <x-slot name="title">Historique</x-slot>
            </x-history>
        </div>
    </x-slot>
</x-layout>
