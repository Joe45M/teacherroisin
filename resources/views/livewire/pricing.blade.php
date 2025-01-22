<div>
    <header class="bg-gradient-to-br z-10 relative from-brand-500 to-brand-400 text-white py-32 text-[72px]">
        <div class="grid container mx-auto lg:grid-cols-2">
            <div class="">
                <h1 class="text-[48px] font-[800] text-white">
                    Affordable English Classes
                </h1>
            </div>
            <div>
                <img src="{{asset('images/subjects/2.png')}}" class="absolute hidden lg:block bottom-0 w-1/2 right-0" alt="">
            </div>
        </div>
    </header>


    <div class="max-w-2xl relative z-20 mx-auto -mt-[50px] mb-10">
        <div class="grid lg:grid-cols-2 gap-10">
            <div class="bg-white p-5 rounded-[12px] text-text">
                <div class="flex justify-between mb-5">
                    <span class="text-2xl font-[900]">
                        {{ __('Trial class') }}
                    </span>

                    <span class="bg-white px-2 py-1 self-center rounded-[5px] text-xs text-text font-bold">
                        60 CNY
                    </span>
                </div>
                <div class="leading-tight mb-10">
                    {{ __('Try a trial English lesson to see if we are right for your child.') }}
                </div>
                <div class="flex justify-end">
                    <a href="{{ route('register') }}" class="bg-white flex gap-5 items-center text-brand-500 py-2 px-3 font-bold hover:scale-110 hover:shadow-xl duration-100 transition-all rounded-[6px]">{{ __('Sign up') }}
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>
            <div class="bg-nd-500 p-5 rounded-[12px] text-white">
                <div class="flex justify-between mb-5">
                    <span class="text-2xl font-[900]">
                        {{ __('Single class') }}
                    </span>

                    <span class="bg-white px-2 py-1 self-center rounded-[5px] text-xs text-text font-bold">
                        100 CNY
                    </span>
                </div>
                <div class="leading-tight mb-5">
                    {{ __('Each student receives a tailored curriculum based on their assessment & knowledge of English.') }}
                </div>
                <div class="flex justify-end">
                    <a href="{{ route('register') }}" class="bg-white flex gap-5 items-center text-brand-500 py-2 px-3 font-bold hover:scale-110 hover:shadow-xl duration-100 transition-all rounded-[6px]">{{ __('Sign up') }}
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    @include('vanity.contact')
</div>
