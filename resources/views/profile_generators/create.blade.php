@extends('welcome')

@section('content')
    <div class="bg-white">
        <div class="mx-auto max-w-7xl py-12 px-4 sm:px-6 lg:py-16 lg:px-8 text-center">
            <h2 class="inline text-3xl font-bold tracking-tight text-gray-900 sm:block sm:text-4xl">En manque d'inspiration?</h2>
            <p class="inline text-3xl font-bold tracking-tight text-indigo-600 sm:block sm:text-4xl">OpenAI peut écrire votre profil.</p>
            <form
                method="post"
                action="{{ route('generate-profile') }}"
                class="mt-8 sm:flex justify-center"
            >
                @csrf
                <label for="content" class="sr-only">Contenu</label>
                <input
                    id="content"
                    name="content"
                    type="text"
                    autocomplete="content"
                    required
                    class="w-full rounded-md border-gray-300 px-5 py-3 placeholder-gray-500 focus:border-indigo-500 focus:ring-indigo-500 sm:max-w-lg"
                    value="{{ request()->content ?? '' }}"
                >
                <div class="mt-3 rounded-md shadow sm:mt-0 sm:ml-3 sm:flex-shrink-0">
                    <button type="submit" class="flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-5 py-3 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Générer 🚀</button>
                </div>
            </form>
        </div>

        @isset($profile)
            <div>
                <label for="profile" class="block text-sm font-medium text-gray-700">Votre super profil</label>
                <div class="mt-1">
                    <textarea
                        id="profile"
                        class="min-h-[720px] w-full mx-auto rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                    >{{ $profile }}</textarea>
                </div>
            </div>
        @endisset
    </div>
@endsection
