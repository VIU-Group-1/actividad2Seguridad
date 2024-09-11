<style>
    /* Mover a resources/css/app.css */
    .input-error {
        border-color: #dc3545 !important;
        background-color: #f8d7da;
    }
</style>
<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name"
                          class="block mt-1 w-full {{ $errors->has('name') ? 'input-error' : '' }}"
                          type="text"
                          name="name"
                          :value="old('name')"
                          required
                          autofocus
                          autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2 error-message" />
        </div>
        <!-- Surnames -->
        <div class="mt-4">
            <div>
                <x-input-label for="surnames" :value="__('Surnames')" />
                <x-text-input
                    id="surnames"
                    name="surnames"
                    class="block mt-1 w-full {{ $errors->has('surnames') ? 'input-error' : '' }}"
                    type="text"
                    :value="old('surnames')"
                    required
                    autocomplete="family-name"
                />
                <x-input-error :messages="$errors->get('surnames')" class="mt-2" />
            </div>
        </div>
        <!-- DNI -->
        <div class="mt-4">
            <x-input-label for="dni" :value="__('DNI')" />
            <x-text-input
                id="dni"
                name="dni"
                class="block mt-1 w-full {{ $errors->has('dni') ? 'input-error' : '' }}"
                type="text"
                :value="old('dni')"
                required
                autocomplete="dni"
            />
            <x-input-error :messages="$errors->get('dni')" class="mt-2" />
        </div>
        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email"
                          class="block mt-1 w-full {{ $errors->has('email') ? 'input-error' : '' }}"
                          type="email"
                          name="email"
                          :value="old('email')"
                          required
                          autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 error-message" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password"
                          class="block mt-1 w-full {{ $errors->has('password') ? 'input-error' : '' }}"
                          type="password"
                          name="password"
                          required
                          autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 error-message" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation"
                          class="block mt-1 w-full {{ $errors->has('password_confirmation') ? 'input-error' : '' }}"
                          type="password"
                          name="password_confirmation"
                          required
                          autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 error-message" />
        </div>
        <!-- Telephone -->
        <div class="mt-4">
            <x-input-label for="telephone" :value="__('Telephone')" />
            <x-text-input
                id="telephone"
                name="telephone"
                class="block mt-1 w-full {{ $errors->has('telephone') ? 'input-error' : '' }}"
                type="text"
                :value="old('telephone')"
                autocomplete="telephone"
            />
            <x-input-error :messages="$errors->get('telephone')" class="mt-2" />
        </div>
        <!-- Country -->
        <div class="mt-4">
            <x-input-label for="country" :value="__('Country')" />
            <x-dropdown-select :values="config('countries')" text="Select your country" name="country" id="country" />
            <x-input-error :messages="$errors->get('country')" class="mt-2" />
        </div>
        <!-- About you -->
        <div class="mt-4">
            <div>
                <x-input-label for="aboutYou" :value="__('About you')" />
                <x-text-input
                    id="aboutYou"
                    name="aboutYou"
                    class="block mt-1 w-full {{ $errors->has('aboutYou') ? 'input-error' : '' }}"
                    type="text"
                    :value="old('aboutYou')"
                    autocomplete="about-you"
                />
                <x-input-error :messages="$errors->get('aboutYou')" class="mt-2" />
            </div>
        </div>
        <!-- Already registered? -->
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
