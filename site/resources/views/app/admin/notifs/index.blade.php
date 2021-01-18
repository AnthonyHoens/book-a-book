<x-layout>
    <x-slot name="title">{{ __('Mes notifications')  }}</x-slot>
    <x-slot name="content">
        <div class="all_page_flex profil_page profil_container">
            <x-admin-profil-nav></x-admin-profil-nav>
            <hr>
            <x-notification :notifications="$notifications"></x-notification>
        </div>
    </x-slot>
</x-layout>
