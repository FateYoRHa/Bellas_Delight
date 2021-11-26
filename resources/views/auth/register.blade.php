<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="firstName" value="{{ __('First Name') }}" />
                <x-jet-input id="firstName" class="block mt-1 w-full @error('firstName') border-red-500 @enderror"
                    type="text" name="firstName" :value="old('firstName')" autofocus
                    autocomplete="firstName" />
                {{-- @error('firstName') <p class="error text-red-500 text-xs italic mt-4">{{ $message }}</p> @enderror --}}
                <x-jet-validation-errors ('firstName') />

            </div>
            {{-- Last Name --}}
            <div>
                <x-jet-label for="lastName" value="{{ __('Last Name') }}" />
                <x-jet-input id="lastName" class="block mt-1 w-full @error('lastName') border-red-500 @enderror"
                    type="text" name="lastName" :value="old('lastName')" autofocus autocomplete="lastName" />
                @error('lastName') <p class="error text-red-500 text-xs italic mt-4">{{ $message }}</p> @enderror
            </div>

            {{-- EMAIL --}}
            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full @error('email') border-red-500 @enderror" type="email"
                    name="email" :value="old('email')" />
                @error('email') <p class="error text-red-500 text-xs italic mt-4">{{ $message }}</p> @enderror
            </div>
            {{-- ADDRESS --}}
            <div>
                <x-jet-label for="address" value="{{ __('Address') }}" />
                <x-jet-input id="address" class="block mt-1 w-full @error('address') border-red-500 @enderror"
                    type="text" name="address" :value="old('address')" autofocus autocomplete="address" />
                @error('address') <p class="error text-red-500 text-xs italic mt-4">{{ $message }}</p> @enderror
            </div>
            {{-- Contact Number --}}
            <div>
                <x-jet-label for="contactNumber" value="{{ __('Contact Number') }}" />
                <x-jet-input id="contactNumber"
                    class="block mt-1 w-full @error('contactNumber') border-red-500 @enderror" type="text"
                    name="contactNumber" :value="old('contactNumber')" autofocus
                    autocomplete="contactNumber" />
                @error('contactNumber') <p class="error text-red-500 text-xs italic mt-4">{{ $message }}</p> @enderror
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
