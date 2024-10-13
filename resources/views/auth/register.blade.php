<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full border-gray-300 rounded-lg focus:!ring-[#00B3D6] focus:!border-[#00B3D6]" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Jenis Kelamin -->
        <div class="mt-4">
            <x-input-label for="jenis_kelamin" :value="__('Jenis Kelamin')" />
            <select id="jenis_kelamin" name="jenis_kelamin" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-[#00B5DA] focus:border-[#00B5DA]">
                <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('jenis_kelamin')" />
        </div>

        <!-- No Telepon -->
        <div class="mt-4">
            <x-input-label for="no_telepon" :value="__('No Telepon')" />
            <x-text-input id="no_telepon" name="no_telepon" type="text" class="mt-1 block w-full focus:ring-[#00B5DA] focus:border-[#00B5DA]" :value="old('no_telepon')" required autocomplete="tel" />
            <x-input-error class="mt-2" :messages="$errors->get('no_telepon')" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full border-gray-300 rounded-lg focus:!ring-[#00B3D6] focus:!border-[#00B3D6]" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full border-gray-300 rounded-lg focus:!ring-[#00B3D6] focus:!border-[#00B3D6]"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full border-gray-300 rounded-lg focus:!ring-[#00B3D6] focus:!border-[#00B3D6]"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4 rounded-lg focus:!ring-[#00B3D6] focus:!border-[#00B3D6]" style="background-color: #00B4D8;">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
