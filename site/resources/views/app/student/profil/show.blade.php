<x-layout>
    <x-slot name="title">{{ __('Mon profil') . ' | ' . $user->name . ' ' . $user->first_name }}</x-slot>
    <x-slot name="content">
        <div class="all_page_flex profil_page profil_container">
            <x-profil-nav></x-profil-nav>
            <hr>
            <x-profil-user :user="$user" :groups="$groups"></x-profil-user>
        </div>
    </x-slot>
</x-layout>
