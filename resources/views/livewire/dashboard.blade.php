<div>
    <x-slot name="header">
        {{ __('Dashboard') }}
    </x-slot>

    @if(!$user->onboarded)
        <livewire:onboarding></livewire:onboarding>
    @endif

    @if($checkedOut)

        <div class="fixed left-0 z-50 w-full top-0 h-full bg-white/50 flex items-center justify-center">
            <x-card class="lg:w-[400px]">

                <div class="w-16 rounded-full mx-auto mb-5 text-text h-16 bg-brand-200 p-10 flex items-center justify-center">
                    <i class="fa-solid fa-check text-4xl"></i>
                </div>

                <h3 class="text-[32px] text-text text-center font-bold">{{ __('Thanks for your order!') }}</h3>

                <p class="text-center text-text">
                    {{ __('You may now book your classes.') }}
                </p>

                <div class="flex justify-center pt-10">
                    <a href="http://teacherroisin.test/booking" class="bg-nd-500 self-center items-center px-2 py-2 rounded-full flex gap-3 font-bold text-white">
                        <div class="bg-nd-400 rounded-full w-8 relative h-8">
                            <i class="fa-solid fa-cart-shopping absolute left-1/2 top-1/2 translate-x-[-50%] translate-y-[-50%]" aria-hidden="true"></i>
                        </div>
                        Book classes
                    </a>
                </div>

            </x-card>
        </div>

    @endif

    <div class="container mx-auto">
        <div class="grid grid-cols-2 lg:grid-cols-7 mt-[-50px] mb-20 gap-5">
            @if(!$user->assessment)
                <a href="{{ route('assessment') }}" class="text-center text-xs h-full w-full text-white flex items-center  rounded-[22px] justify-center p-10 aspect-square bg-pink-400">
                    <div>
                        <i class="fa-duotone text-5xl fa-solid mb-3 fa-pencil"></i>

                        <div class="font-bold">
                            {{ __('Take assessment') }}
                        </div>
                    </div>
                </a>
            @endif
            <a href="{{ config('app.stripe.10') }}?prefilled_email={{ $user->email }}" class="text-center text-xs h-full w-full text-white flex items-center  rounded-[22px] justify-center p-10 aspect-square bg-pink-400">
                <div>
                    <i class="fa-duotone text-5xl fa-solid mb-3 fa-cart-shopping"></i>

                    <div class="font-bold">
                        {{ __('Buy classes') }}
                    </div>
                </div>
            </a>
            <a href="{{ route('booking') }}" class="text-center text-xs h-full w-full text-white flex items-center  rounded-[22px] justify-center p-10 aspect-square bg-pink-400">
                <div>
                    <i class="fa-duotone text-5xl fa-solid mb-3 fa-calendar"></i>

                    <div class="font-bold">
                        {{ __('Book Classes') }}
                    </div>
                </div>
            </a>
            <a href="{{ route('profile.edit') }}" class="text-center text-xs h-full w-full text-white flex items-center  rounded-[22px] justify-center p-10 aspect-square bg-pink-400">
                <div>
                    <i class="fa-duotone text-5xl fa-solid mb-3 fa-user"></i>

                    <div class="font-bold">
                        {{ __('Profile') }}
                    </div>
                </div>
            </a>
            <a href="{{ route('referrals') }}" class="text-center text-xs h-full w-full text-white flex items-center  rounded-[22px] justify-center p-10 aspect-square bg-pink-400">
                <div>
                    <i class="fa-duotone text-5xl fa-solid mb-3 fa-calendar-users"></i>

                    <div class="font-bold">
                        {{ __('Refer friends') }}
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="py-12 mt-[-150px]">
        <div class="container mx-auto">

            <div class="grid gap-5 lg:grid-cols-5 pt-10">
                <div class="lg:col-span-4">

                    @if(!$user->assessment)
                        <div class="mb-5">
                            <x-assessment-prompt></x-assessment-prompt>
                        </div>
                    @endif


                    <div class="bg-white shadow-main rounded-[12px] p-5 rounded-[12px]">
                        <div class="lg:flex justify-between">
                            <h3 class="text-[32px] font-bold mb-5 text-text">{{ __('Upcoming lessons') }}</h3>
                            <a href="{{ route('booking') }}" class="bg-nd-500 mb-5 lg:mb-0 self-center items-center px-2 py-2 rounded-full flex gap-3 font-bold text-white">
                                <div class="bg-nd-400 rounded-full w-8 relative h-8">
                                    <i class="fa-solid fa-cart-shopping absolute left-1/2 top-1/2 translate-x-[-50%] translate-y-[-50%]"></i>
                                </div>
                                {{ __('Book classes') }}
                            </a>
                        </div>
                        <div class="mb-5">


                            @if(!auth()->user()->lessons()->untaken()->get()->sortBy('lesson_at')->count())
                                <div class="text-gray-500">
                                    {{ __('You have no upcoming lessons.') }}
                                </div>
                            @endif

                            <div class="grid gap-5 mt-5 lg:grid-cols-3">

                                @foreach($todayLessons as $lesson)
                                    <div class="lg:col-span-3 bg-brand-500 text-white rounded-[12px] border border-brand-400/10">
                                        <div class="p-3 border-b border-b-brand-500/10 font-bold flex justify-between">
                                            <span>{{ $lesson->lesson_at->format('jS F') }}</span>
                                            <span>{{ $lesson->lesson_at->format('h:i') }}</span>
                                        </div>
                                        <div class="p-3">
                                            @if($lesson->blueprint->count())
                                                {{ $lesson->blueprint->first()->description }}
                                            @else
                                                {{ __('Lesson details pending') }}
                                            @endif
                                        </div>

                                        <div class="p-3 flex justify-end">
                                            @if($lesson->link)
                                                <a href="{{ $lesson->link }}" class="bg-white p-3 rounded-[12px] font-bold text-text">{{ __("Enter Classroom") }}</a>
                                            @else
                                                {{ __('Your classroom will appear here') }}.
                                            @endif
                                        </div>
                                    </div>
                                @endforeach

                                @foreach(auth()->user()->lessons()->untaken()->get()->sortBy('lesson_at') as $lesson)



                                    @if($loop->iteration === 1)

                                    @else
                                        <div class="bg-white shadow-main text-black rounded-[12px] border border-brand-400/10">
                                            <div class="p-3 border-b border-b-brand-500/10 font-bold flex justify-between">
                                                <span>{{ $lesson->lesson_at->format('jS F') }}</span>
                                                <span>{{ $lesson->lesson_at->format('h:i') }}</span>
                                            </div>
                                            <div class="p-3">
                                                @if($lesson->blueprint->count())
                                                    {{ $lesson->blueprint->first()->description }}
                                                @else
                                                    {{ __('Lesson details pending') }}
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>


                <div>

                    <div class="mb-5">
                        <x-card title="{{ __('Your balance') }}">
                            <p class="text-text">{{ __('You currently have') }} <span class="font-bold">{{ $user->balance }} {{ __('tokens') }}</span> {{ __('remaining') }}.</p>
                        </x-card>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
