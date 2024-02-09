<x-layout>
    <x-slot name="header">
        {{ __('Home') }}
    </x-slot>

    <x-panel class="flex flex-col items-center pt-16 pb-16">
        <!-- <x-application-logo class="block h-12 w-auto" /> -->

        <div class="text-2xl">
            Welcome to CRUD application!
        </div>

        <x-splade-link href="{{ route('cruds.index') }}" class="mt-4 btn btn-primary text-white btn-lg flex gap-2 items-center">Let's Try
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-up-right-square-fill" viewBox="0 0 16 16">
            <path d="M14 0a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zM5.904 10.803 10 6.707v2.768a.5.5 0 0 0 1 0V5.5a.5.5 0 0 0-.5-.5H6.525a.5.5 0 1 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 .707.707"/>
            </svg>
        </x-splade-link>
    </x-panel>
</x-layout>