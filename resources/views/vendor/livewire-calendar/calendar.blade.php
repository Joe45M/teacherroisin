<div
    @if($pollMillis !== null && $pollAction !== null)
        wire:poll.{{ $pollMillis }}ms="{{ $pollAction }}"
    @elseif($pollMillis !== null)
        wire:poll.{{ $pollMillis }}ms
    @endif
>
    <div x-data="{adding: false}">

        <div class="p-5">
            <x-button @click="adding=true"> Add slot </x-button>
        </div>


        <div x-show="adding" class="fixed left-0 w-full h-full top-0 bg-white/50 flex items-center justify-center">

            <x-card title="Add slot" class="w-[600px]" @click.outisde="adding = false">
                <div class="grid lg:grid-cols-2 gap-3">
                    <div>
                        <div class="mb-3 w-full">
                            <x-input-label>Date:</x-input-label>
                            <input
                                type="datetime-local"
                                wire:change="dateChange"
                                wire:model="time"
                                class="border-gray-300 w-full focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                        </div>

                        @if($timeObj)
                            <div class="border-gray-300 text-sm border p-3 rounded-md">
                                <label for="repeat">
                                    <input wire:change="generateRhythm" type="checkbox" class="rounded-sm mr-2" id="repeat" name="repeat" wire:model="repeat">
                                    Repeat every {{ $timeObj->format('l') }} at {{ $timeObj->format('h:i') }}
                                </label>

                                @if($repeat)
                                    <div class="mt-3">
                                        <x-input-label>Repeat for how many weeks?</x-input-label>
                                        <x-text-input wire:model="repeatFor" wire:change="generateRhythm" type="number"></x-text-input>
                                    </div>
                                @endif
                            </div>
                        @endif
                    </div>

                    <div>
                        @if($rhythm)
                            <p class="font-bold">Class Rhythm:</p>
                            <div class="border rounded-md h-[170px] overflow-y-auto border-gray-300">
                                @foreach($rhythm as $rhy)

                                    <div class="p-3">
                                        {{ $rhy->format('l dS F h:i') }}
                                    </div>

                                @endforeach
                            </div>

                        @endif
                    </div>
                </div>


                <div class="flex justify-end pt-3">
                    <x-button @click="adding = false" wire:click="SaveSlot">Save</x-button>
                </div>
            </x-card>

        </div>
    </div>

    <div class="flex">
        <div class="overflow-x-auto w-full">
            <div class="inline-block min-w-full overflow-hidden">

                <div class="w-full flex flex-row">
                    @foreach($monthGrid->first() as $day)
                        @include($dayOfWeekView, ['day' => $day])
                    @endforeach
                </div>

                @foreach($monthGrid as $week)
                    <div class="w-full flex flex-row">
                        @foreach($week as $day)
                            @include($dayView, [
                                    'componentId' => $componentId,
                                    'day' => $day,
                                    'dayInMonth' => $day->isSameMonth($startsAt),
                                    'isToday' => $day->isToday(),
                                    'events' => $getEventsForDay($day, $events),
                                ])
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div>
        @includeIf($afterCalendarView)
    </div>
</div>
