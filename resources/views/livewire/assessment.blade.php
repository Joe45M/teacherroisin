<div>
    <div class="container mx-auto">
        @if(!$complete)
            <div class="grid gap-10 lg:grid-cols-2 pt-32">
                <div>
                    <h3 class="text-[32px] font-bold mb-10">
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

        @if($complete)
            <h1 class="text-[48px] font-bold pt-32 text-text">Assessment Complete!</h1>

            <p class="mb-5 text-text text-[18px]">Thank you for completing the assessment. <br> Your Teacher will use this to assess your English Knowledge.</p>

            <a class="underline text-brand-600 text-[18px]" href="{{ route('dashboard') }}">Back to dashboard</a>
        @endif
    </div>
</div>
