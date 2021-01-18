<x-layout>
    <x-slot name="title">{{ __('Mes notifications')  }}</x-slot>
    <x-slot name="content">
        <div class="profil_flex">
            <x-profil-nav></x-profil-nav>
            <hr>
            <x-notification :notifications="$notifications"></x-notification>
        </div>
    </x-slot>
</x-layout>
