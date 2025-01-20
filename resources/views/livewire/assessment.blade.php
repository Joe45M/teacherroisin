<div>
    <div class="container mx-auto">
        @if(!$complete)
            @if(!$begun)

                <h3 class="text-[32px] font-bold mb-10 pt-32 text-text">
                    {{ __("Your child's assessment") }}
                </h3>

                <p class="lg:w-1/2 text-text">{{ __("This assessment is used to understand your child's knowledge of English. Please have your child complete this assessment independently. It will take no more than 5 minutes.") }}</p>

                <div class="bg-brand-100 rounded-md mt-5 lg:w-1/2 self-center flex gap-3 p-3">
                    <div class="w-10 flex-shrink-0 h-10 bg-white/50 flex items-center justify-center rounded-md">
                        <i class="fa-light text-text fa-lightbulb-on"></i>
                    </div>
                    <div class="text-sm text-text self-center">
                        {{ __('This is not a test. We use this to offer the tailored education.') }}
                    </div>
                </div>

                <button wire:click="$set('begun', true)" class="bg-white mt-10 flex-grow px-10 flex-shrink-0 self-center p-3 rounded-[12px] font-bold text-text">{{ __("Begin") }}</button>

            @else
                <div class="grid gap-10 lg:grid-cols-2 pt-32">
                    <div>
                        <h3 class="text-[32px] text-text font-bold mb-10">
                            {{ $questions[$question]['question'] }}
                        </h3>

                        @if(isset($questions[$question]['hint']))
                            <div class="p-3 italic mb-10">
                                {{ $questions[$question]['hint'] }}
                            </div>
                        @endif

                        <div>
                            @foreach($questions[$question]['options'] as $answer)

                                <div class="block">
                                    <label for="id-{{ $loop->iteration }}-{{ \Illuminate\Support\Str::slug($answer) }}" class="border border-gray-500 p-5 rounded-[12px] block mb-3 bg-white hover:bg-gray-100 cursor-pointer shadow-main">
                                        <input wire:change="resolveAnswer('{{ $answer }}')" id="id-{{ $loop->iteration }}-{{ \Illuminate\Support\Str::slug($answer) }}" type="radio" class="w-10 h-10">

                                        {{ $answer }}

                                    </label>
                                </div>

                            @endforeach
                        </div>
                    </div>
                    <div>
                        @if(isset($questions[$question]['image']))
                            <img src="{{ $questions[$question]['image'] }}" class="rounded-[12px]  object-cover" alt="Image">
                        @endif
                    </div>
                </div>
            @endif
        @endif

        @if($complete)
            <h1 class="text-[48px] font-bold pt-32 text-text">{{ __('Assessment Complete!') }}</h1>

            <p class="mb-5 text-text text-[18px]">{{ __('Thank you for completing the assessment.') }} <br> {{ __('Your Teacher will use this to assess your English Knowledge.') }}</p>

            <a class="underline text-brand-600 text-[18px]" href="{{ route('dashboard') }}">{{ __('Back to dashboard') }}</a>
        @endif
    </div>
</div>
