<div x-data="{ step: 'welcome', open: true }">
    <div x-cloak x-show="open" class="fixed left-0 z-50 w-full top-0 h-full bg-white/50 flex items-center justify-center">
        <x-card class="lg:w-[400px] overflow-hidden">

            <div x-cloak x-show="step === 'welcome'">
                <div class="w-16 rounded-full mx-auto mb-5 text-text h-16 bg-brand-200 p-10 flex items-center justify-center">
                    <i class="fa-duotone fa-solid fa-hand-wave text-4xl"></i>
                </div>

                <h3 class="text-[32px] text-text text-center font-bold">{{ __('Hi there!') }}</h3>

                <p class="text-center text-text">
                    {{ __('I am excited to teach you! Please take two minutes to learn how to get started.') }}
                </p>

                <div class="flex justify-center pt-10">
                    <button @click="step = 'assessment'" href="http://teacherroisin.test/booking" class="bg-nd-500 self-center items-center px-2 py-2 rounded-full flex gap-3 font-bold text-white">
                        <div class="bg-nd-400 rounded-full w-8 relative h-8">
                            <i class="fa-solid fa-check absolute left-1/2 top-1/2 translate-x-[-50%] translate-y-[-50%]" aria-hidden="true"></i>
                        </div>
                        Ok, let's go!
                    </button>
                </div>
            </div>

            <div x-cloak x-show="step === 'assessment'">
                <div class="w-16 rounded-full mx-auto mb-5 text-text h-16 bg-brand-200 p-10 flex items-center justify-center">
                    <i class="fa-duotone fa-solid fa-bookmark text-4xl"></i>
                </div>

                <h3 class="text-[32px] text-text text-center font-bold">{{ __("Your assessment") }}</h3>

                <p class="text-center text-text">
                    {{ __("Your child will receive tailored curriculum based on their experience with English. To help us tailor your child's experience, please have them complete their assessment.") }}
                </p>

                <div class="bg-brand-100 rounded-md mt-5 flex gap-3 p-3">
                    <div class="w-10 flex-shrink-0 h-10 bg-white/50 flex items-center justify-center rounded-md">
                        <i class="fa-light text-text fa-lightbulb-on"></i>
                    </div>
                    <div class="text-sm text-text">
                        {{ __('You can take it now, or find it on your dashboard.') }}
                    </div>
                </div>

                <div class="flex justify-center gap-3 pt-10">
                    <a target="_blank" href="{{ route('assessment') }}" class="bg-gray-300 self-center items-center px-2 py-2 pr-3 rounded-full flex gap-3 font-bold text-white">
                        <div class="bg-gray-400 rounded-full w-8 relative h-8">
                            <i class="fa-solid fa-star absolute left-1/2 top-1/2 translate-x-[-50%] translate-y-[-50%]" aria-hidden="true"></i>
                        </div>
                        {{ __('Assessment') }}
                    </a>
                    <button @click="step = 'booking'" href="http://teacherroisin.test/booking" class="bg-nd-500 pr-3 self-center items-center px-2 py-2 rounded-full flex gap-3 font-bold text-white">
                        <div class="bg-nd-400 rounded-full w-8 relative h-8">
                            <i class="fa-solid fa-chevron-right absolute left-1/2 top-1/2 translate-x-[-50%] translate-y-[-50%]" aria-hidden="true"></i>
                        </div>
                        {{ __('Buying classes') }}
                    </button>
                </div>
            </div>

            <div x-cloak x-show="step === 'booking'">
                <div class="w-16 rounded-full mx-auto mb-5 text-text h-16 bg-brand-200 p-10 flex items-center justify-center">
                    <i class="fa-duotone fa-solid fa-yen-sign text-4xl"></i>
                </div>

                <h3 class="text-[32px] text-text text-center font-bold">{{ __("Buying Classes") }}</h3>

                <p class="text-center text-text">
                    {{ __("Before you book classes, you must first buy tokens. Tokens are used to book classes, so you can use them whenever you'd like.") }}
                </p>

                <div class="bg-brand-100 rounded-md mt-5 flex gap-3 p-3">
                    <div class="w-10 flex-shrink-0 h-10 bg-white/50 flex items-center justify-center rounded-md">
                        <i class="fa-light text-text fa-lightbulb-on"></i>
                    </div>
                    <div class="text-sm text-text">
                        {{ __('We accept card and WeChat. Your tokens never expire.') }}
                    </div>
                </div>

                <div class="flex justify-center gap-3 pt-10">
                    <button @click="step = 'classes'" href="http://teacherroisin.test/booking" class="bg-nd-500 pr-3 self-center items-center px-2 py-2 rounded-full flex gap-3 font-bold text-white">
                        <div class="bg-nd-400 rounded-full w-8 relative h-8">
                            <i class="fa-solid fa-chevron-right absolute left-1/2 top-1/2 translate-x-[-50%] translate-y-[-50%]" aria-hidden="true"></i>
                        </div>
                        {{ __('Booking classes') }}
                    </button>
                </div>
            </div>
            <div x-cloak x-show="step === 'classes'">
                <div class="w-16 rounded-full mx-auto mb-5 text-text h-16 bg-brand-200 p-10 flex items-center justify-center">
                    <i class="fa-duotone fa-solid fa-calendars text-4xl"></i>
                </div>

                <h3 class="text-[32px] text-text text-center font-bold">{{ __("Booking Classes") }}</h3>

                <p class="text-center text-text">
                    {{ __("You can book classes for whenever works for you. You can book your classes from the dashboard. Once booked, your class will be confirmed.") }}
                </p>

                <div class="flex justify-center gap-3 pt-10">
                    <button wire:click="onboard" @click="open = false" href="http://teacherroisin.test/booking" class="bg-nd-500 pr-3 self-center items-center px-2 py-2 rounded-full flex gap-3 font-bold text-white">
                        <div class="bg-nd-400 rounded-full w-8 relative h-8">
                            <i class="fa-solid fa-chevron-right absolute left-1/2 top-1/2 translate-x-[-50%] translate-y-[-50%]" aria-hidden="true"></i>
                        </div>
                        {{ __('Ok, thanks!') }}
                    </button>
                </div>
            </div>

        </x-card>
    </div>
</div>
