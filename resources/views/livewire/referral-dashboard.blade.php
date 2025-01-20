<div>

    <x-slot name="header">
        {{ __('Referrals') }}
    </x-slot>

    <div class="container mx-auto">
        <x-card title="{{ __('Refer your friends') }}" class="-mt-[60px] mb-5">
            <p class="text-text mb-5">
                {{ __('For each successful referral, you will receive 5 free classes.') }}

                <br><br>

                {{ __('Share this URL with your friends, and when they book their first class you will receive your tokens.') }}
            </p>

            <x-text-input class="w-full" value="{{ route('referral', $user->referral_code) }}"></x-text-input>
        </x-card>

        @if($user->referralTrackers->count())


            <x-card title="{{ __('Refer your friends') }}" class="mb-5">
                @foreach($user->referralTrackers as $tracker)

                    <p class="mt-5">
                        {{ $tracker->user->name }}

                        <span class="text-gray-500 bg-gray-100 p-2 rounded-sm">
                        {{ $tracker->complete ? 'Completed' : 'Pending' }}
                        </span>
                    </p>

                @endforeach
            </x-card>

        @else
            <p class="text-gray-500">{{ __('Your referrals will appear here.') }}</p>
        @endif
    </div>
</div>
