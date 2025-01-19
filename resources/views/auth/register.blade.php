<x-app-layout>
    @if(config('app.launched'))
        <header class="bg-gradient-to-br from-brand-500 to-brand-400 text-white py-32 text-[72px]">
            <div class="container mx-auto">
                <h1 class="text-[48px] font-bold text-white">
                    {{ __('Register') }}
                </h1>
            </div>
        </header>
        <div class="container mx-auto -mt-[60px] bg-white p-5 rounded-[12px]">
            <form method="POST" action="{{ route('register') }}" class="p-5">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- English Name -->
                <div class="mt-4">
                    <x-input-label for="english_name" :value="__('English Name')" />
                    <x-text-input id="english_name" class="block mt-1 w-full" type="text" name="english_name" :value="old('english_name')" required autofocus autocomplete="english_name" />
                    <x-input-error :messages="$errors->get('english_name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input id="password" class="block mt-1 w-full"
                                  type="password"
                                  name="password"
                                  required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                    <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                  type="password"
                                  name="password_confirmation" required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-primary-button class="ms-4">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>

        </div>
    @else
        <header class="bg-gradient-to-br from-brand-500 to-brand-400 text-white py-32 text-[72px]">
            <div class="container mx-auto">
                <h1 class="text-[48px] font-bold text-white">
                    {{ __('Coming soon') }}
                </h1>
            </div>
        </header>
        <div class="container mx-auto -mt-[60px] bg-white p-5 pt-32 rounded-[12px]">

            <div class="flex justify-center mb-10">
                <i class="fa-sharp-duotone fa-solid fa-face-smile-hearts text-[80px] text-brand-500"></i>
            </div>

            <p class="text-3xl text-center font-bold text-text">
                {{ __('Website coming soon') }}
            </p>

            <p class="text-xl text-center font-bold text-text mb-20">
                {{ __('Contact Teacher Roisin') }}
            </p>

            <img src="{{ asset('images/wechat.png') }}" class="rounded-[20px] lg:w-1/3 mx-auto" alt="Wechat url">

        </div>

    @endif
</x-app-layout>
