<div x-data="{ tab: 'classes' }">
    <div class="relative group">

        {{ $student->name }} ({{ $student->english_name }})

        <div class="hidden group-hover:block absolute top-0 rounded-[12px] w-[350px] z-20 left-0 bg-white p-3 shadow-main">
            <p class="text-xl font-bold">
                {{ $student->name }} ({{ $student->english_name }})

            </p>

            <div>
                {{ $student->assessment?->level ?? 'Has not taken assessment.' }}
            </div>
            <hr class="my-3">

            <div class="flex gap-2x text-sm mb-3">
                <button @click="tab = 'classes'">Classes</button>
            </div>

            <div x-show="tab === 'classes'" class="max-h-[100px] overflow-y-auto">

                @if($untaken->count())

                    <div class="p-2 bg-brand-100 rounded-md mb-3">
                        {{ $untaken->first()->lesson_at->format('d/m/y h:i') }}
                    </div>
                @endif

                @foreach($student->lessons->sortByDesc('lesson_at') as $lesson)

                    <div class="p-2 bg-gray-100 rounded-md mb-3">
                        <div>
                            {{ $lesson->lesson_at->format('d/m/y h:i') }}
                        </div>
                        @if($lesson->blueprint->first())
                            {{ $lesson->blueprint->first()->unit }} / {{ $lesson->blueprint->first()->lesson }}
                        @endif
                    </div>

                @endforeach
            </div>
        </div>

    </div>
</div>
