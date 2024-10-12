<x-guest-layout>
            <h2 class="text-3xl font-bold text-center mb-6 text-gray-700">Login to Your Account</h2>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="relative mb-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full p-2 pl-4 border border-gray-300 rounded-lg focus:ring-1 focus:ring-[#00B4D8] focus:border-[#00B4D8]" type="email" name="email" :value="old('email')" required autofocus />
                    <i class="fas fa-envelope absolute left-3 top-3 text-gray-400"></i>
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
                </div>

                <!-- Password -->
                <div class="relative mb-6">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full p-2 pl-4 border border-gray-300 rounded-lg focus:ring-1 focus:ring-[#00B4D8] focus:border-[#00B4D8]"
                                  type="password" name="password" required autocomplete="current-password" />
                    <i class="fas fa-lock absolute left-3 top-3 text-gray-400"></i>
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                        <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-between mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-primary-button class="ms-3" style="background-color: #00B4D8; color: white; font-bold; py-2; px-4; border-radius: 0.375rem; transition: background-color 0.3s ease-in-out;">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
