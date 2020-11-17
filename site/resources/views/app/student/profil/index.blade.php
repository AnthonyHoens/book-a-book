<x-layout>
    <x-slot name="title">{{ __('Mon profil') . ' | ' . $user->name . ' ' . $user->first_name }}</x-slot>
    <x-slot name="content">
        <div class="profil_flex">
            <x-profil-nav></x-profil-nav>
            <hr>
            <x-profil-user :user="$user" :groups="$groups"></x-profil-user>
        </div>
    </x-slot>
</x-layout>
