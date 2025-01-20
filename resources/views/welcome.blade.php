<x-app-layout>
    <div class="bg-gradient-to-br from-brand-500 to-brand-300 min-h-[50vh]">
        <div class="container pt-[20vh] mx-auto pb-10">
            <div class="grid lg:grid-cols-2">
                <div>
                    <h1 data-aos="fade-up" data-aos-duration="500" class="text-[54px] text-white font-bold leading-[1.05] mb-10">{{ __('Enjoy learning') }}, <br> {{ __('Enjoy growing') }}.</h1>

                    <p data-aos="fade-up" data-aos-delay="400"
                       class="text-[28px] text-white max-w-[550px] font-bold leading-10 mb-16">{{ __('Empower your child with the knowledge of English with fun lessons.') }}</p>


                    <div class="flex gap-5" data-aos="fade-up" data-aos-delay="600">
                        <a href="{{ route('register') }}" class="bg-white flex gap-5 items-center text-brand-500 p-3 px-5 font-bold border-glow hover:scale-110 hover:shadow-xl duration-100 transition-all rounded-[12px] text-[18px]">{{ __('Sign up') }}

                            <i class="fa-solid fa-arrow-right"></i>

                        </a>

                        <div class="w-[2px] self-center h-[25px] bg-white/50"></div>

                        <a href="#learn" class="flex items-center gap-3 text-white self-center text-[18px] font-bold">{{ __('Learn more') }}

                            <i class="fa-solid fa-chevron-down"></i>
                        </a>
                    </div>
                </div>


                <div class="flex justify-center">
                    <video class="rounded-3xl border-[10px] border-white mt-10 lg:mt-0 rounded-[12px]" controls width="250">

                        <source src="/video/bannerVideo.mp4.mp4" type="video/mp4" />

                    </video>
                </div>
                </div>
            </div>
            <div
                data-aos="fade-up" data-aos-delay="800"
                class="mt-10 bg-white/20 rounded-[20px] p-10 grid lg:grid-cols-3 lg:px-16">
                <div>
                    <div class="flex mb-10 lg:mb-0 items-center text-white gap-5">
                        <i class="fa-duotone fa-solid fa-hourglass-start text-[32px]"></i>
                        <div>
                            <div class="flex text-[32px] font-bold">
                                <p id="count-first">5000</p> +
                            </div>
                            <p class="text-[18px]">{{ __('Classes taught') }}</p>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="flex mb-10 lg:mb-0 items-center text-white gap-5">
                        <i class="fa-regular fa-face-smile-relaxed fa-hourglass-start text-[32px]"></i>
                        <div>

                            <div class="flex text-[32px] font-bold">
                                <p id="count-second">500</p> +
                            </div>
                            <p class="text-[18px]">{{ __('Students taught') }}</p>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="flex mb-10 lg:mb-0 items-center text-white gap-5">
                        <i class="fa-duotone fa-solid fa-earth-americas text-[32px]"></i>
                        <div>
                            <div class="flex text-[32px] font-bold">
                                <p id="count-third">10</p> +
                            </div>
                            <p class="text-[18px]">{{ __('Countries educated') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="mb-10" data-aos="fade-up" data-aos-delay="1200">
        <div class="container mx-auto pt-10">
            <div class="bg-gradient-to-r from-nd-500 to-nd-300 p-10 rounded-[12px] grid-flow-row lg:flex gap-10">
                <div class="text-white mb-5 lg:mb-0">
                    <h2 class="text-[32px] font-bold ">{{ __('Offer: Save 40% on your first class') }}</h2>
                    <p class="text-[18px]">{{ __('To welcome you to the platform, we are offering you 40% off your first English class to let you see if we are right for you. This lets you see what we have to offer, and helps you get to know teacher Roisin.') }}</p>
                </div>
                <div class="flex-grow lg:w-[270px] self-center">
                    <a href="{{ route('register') }}" class="bg-white flex gap-5 items-center text-brand-500 p-3 px-5 font-bold border-glow hover:scale-110 hover:shadow-xl duration-100 transition-all rounded-[12px] text-[18px]">{{ __('Sign up') }}
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>


    <div class="bg-white rounded-t-[100px] pb-20 mb-20" id="learn">
        <div class="container mx-auto pt-10">
            <h3 class="text-center text-[32px] text-text mb-10 font-bold">
                {{ __('Empower your children') }}
            </h3>

            <div class="grid lg:grid-cols-3 gap-16 lg:max-w-5xl mx-auto">
                <div class="w-2/3 mx-auto lg:w-[250px]" data-aos="fade-up" data-aos-delay="300">
                    <img src="{{ asset('images/home-2.png') }}" alt="Home child one">

                    <p class="font-bold text-[22px] text-text text-center leading-[1.1]">
                        {{ __('Unique Curriculum for every student') }}
                    </p>

                </div>
                <div class="w-2/3 mx-auto lg:w-[250px]" data-aos="fade-up" data-aos-delay="600">
                    <img src="{{ asset('images/home-1.png') }}" alt="Home child one">


                    <p class="font-bold text-[22px] text-text text-center leading-[1.1]">
                       {{ __('All taught by native speakers') }}
                    </p>
                </div>
                <div class="w-2/3 mx-auto lg:w-[250px]" data-aos="fade-up" data-aos-delay="900">
                    <img src="{{ asset('images/home-3.png') }}" alt="Home child one">
                    <p class="font-bold text-[22px] text-text text-center leading-[1.1]">
                        {{ __('Flexible times around your schedule') }}
                    </p>
                </div>
            </div>

        </div>
    </div>

    <div>
        <div class="container mx-auto">
            <h3 class="text-center text-[32px] text-brand-500 mb-4 font-bold">
                {{ __('Our Approach') }}
            </h3>

            <div class="w-[90px] h-2 block mx-auto rounded-full bg-nd-500 mb-4"></div>

            <p class="text-center text-text mb-10 text-[20px]">
                {{ __('We believe learning should be fun!') }} <br> {{ __('Through storytelling, role-play, and interactive games, your child will:') }}
            </p>



            <div class="flex lg:max-w-4xl mx-auto justify-center flex-wrap gap-5 pb-20">
                <div class="p-3 text-center rounded-[12px] bg-brand-500 text-white text-[18px]" data-aos="fade-up" data-aos-delay="100">
                    {{ __('Build confidence in speaking English') }}
                </div>
                <div class="p-3 text-center rounded-[12px] bg-brand-800 text-white text-[18px]" data-aos="fade-up" data-aos-delay="200">
                    {{ __('Expand their vocabulary') }}
                </div>
                <div class="p-3 text-center rounded-[12px] bg-nd-500 text-white text-[18px]" data-aos="fade-up" data-aos-delay="300">
                    {{ __('Improve grammar and pronunciation') }}
                </div>
                <div class="p-3 text-center rounded-[12px] bg-nd-400 text-white text-[18px]" data-aos="fade-up" data-aos-delay="400">
                    {{ __('Develop critical thinking skills') }}
                </div>
                <div class="p-3 text-center rounded-[12px] bg-brand-500 text-white text-[18px]" data-aos="fade-up" data-aos-delay="500">
                    {{ __('Foster a love for learning') }}
                </div>
                <div class="p-3 text-center rounded-[12px] bg-brand-500 text-white text-[18px]" data-aos="fade-up" data-aos-delay="600">
                    {{ __('Learn problem-solving skills for life') }}
                </div>
            </div>
        </div>
    </div>

    <div class="bg-nd-500 py-32">
        <div class="lg:max-w-4xl mx-auto">
            <div class="">
                <div>
                    <h3 class="lg:text-[52px] font-bold text-white mb-0 text-center">{{ __('Start learning') }}</h3>
                    <h3 class="text-[32px] text-white mb-4 font-bold text-center">
                        {{ __('Contact Teacher Roisin') }}
                    </h3>
                </div>

                <img src="{{ asset('images/wechat.png') }}" class="rounded-[20px] lg:w-1/2 mx-auto" alt="Wechat url">

            </div>
        </div>
    </div>

    <div class="bg-brand-500 py-16">
        <h3 class="text-center mb-10 text-[32px] text-white font-bold">
            {{ __('Get started') }}
        </h3>


        <div class="flex justify-center">
            <a href="{{ route('register') }}" class="bg-white flex gap-5 items-center text-brand-500 p-3 px-5 font-bold border-glow hover:scale-110 hover:shadow-xl duration-100 transition-all rounded-[12px] text-[18px]">{{ __('Sign up') }}
                <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>

    </div>

</x-app-layout>
