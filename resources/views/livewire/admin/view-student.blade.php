<div>
    <div class="container mx-auto mt-5">
        <div class="bg-white rounded-[12px] p-5 shadow-main">
            <h3 class="text-[32px] font-bold mb-5 text-text">Student: {{ $user->name }}</h3>

            <div class="flex gap-5 mb-5">
                <div class="p-3 bg-brand-500 text-white rounded-[12px] w-full">
                    <p class="text-[20px]">{{ $user->assessment ? 'Yes' : 'No' }}</p>
                    <p>Assessment complete</p>
                </div>
                <div class="p-3 bg-brand-500 text-white rounded-[12px] w-full">
                    <p class="text-[20px]">0</p>
                    <p>Classes taken</p>
                </div>
            </div>


            <div x-data="{show: false}">

                <button @click="show = !show" class="flex mb-3 w-full justify-between">
                    Show Assessment

                    <i class="fa-solid fa-chevron-down"></i>
                </button>

                <div x-show="show">
                    @foreach($user->assessment->assessment as $q)

                        @if(!$q['answered'])
                            @php
                                continue
                            @endphp
                        @endif

                        <div class="p-5 border border-gray-500 mb-5 rounded-[12px] @if($q['is_correct']) bg-green-300 @else bg-red-300 @endif">

                            <p class="font-bold mb-3">
                                {{ $q['question'] }}
                            </p>

                            <p class="mb-3 italic">
                                Answer: {{ $q['answer'] }}

                            </p>
                        </div>

                    @endforeach

                </div>


            </div>

        </div>
    </div>
</div>
