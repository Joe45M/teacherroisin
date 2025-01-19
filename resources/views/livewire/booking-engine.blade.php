<div class="container mx-auto pt-10">

    <x-slot name="header">
        {{ __('Book a class') }}
    </x-slot>
    <x-card class="-mt-[120px]">
        <div class="flex flex-wrap gap-3">
            @foreach($slots->sortByDesc('slot_at') as $key => $slot)

                <div>
                    <div class="bg-gray-100 p-3 rounded-md">
                        <div class="font-bold">
                            {{ \Illuminate\Support\Carbon::parse($key)->format('d/m/Y') }}
                        </div>
                    </div>

                    <div class=" rounded-[12px] p-3">
                        @foreach($slot as $item)

                            <button
                                wire:click="toggleSlot({{ $item->id }})"
                                class="px-3 py-2 hover:bg-brand-500 hover:text-white
                                {{ $selected->contains($item->id) ? 'bg-brand-500 text-white' : '' }}
                                hover:border-white block border border-gray-400 rounded-md w-full mb-3">
                                {{ $item->slot_at->format('h:i') }}
                            </button>

                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>

        <div x-data="{open: false}" class="flex justify-end">
            <x-button @click="open = true">{{ __('Book') }}</x-button>

            <div x-show="open" class="fixed w-full h-full left-0 top-0 bg-white/50 flex justify-center items-center">
                <x-card class="w-[500px]">

                    @if($booked)
                        <div>
                            <div class="flex justify-center pt-10">
                                <div class="bg-brand-500 p-10 flex rounded-full text-white justify-center items-center">
                                    <i class="fa-solid fa-check text-5xl"></i>
                                </div>
                            </div>

                            <p class="text-3xl mt-5 text-center text-text font-bold mb-3">{{ __('Booking complete') }}</p>

                            <p class="text-center text-text">{{ __('Your Teacher will confirm your booking shortly. We look forward to seeing you!') }}</p>
                        </div>
                        <div class="expand"></div>
                    @else
                        <p class=" pt-3 mb-5">{{ __('You are booking') }} {{ $selected->count() }} {{ \Illuminate\Support\Str::plural('class', $selected->count()) }}:</p>

                        @foreach($selected as $sel)

                            <div class="text-[16px] mb-3">
                                {{ __('class') }} {{ $loop->iteration }}: {{ \App\Models\Slot::find($sel)->slot_at->format('d/m/y H:i') }}
                            </div>

                        @endforeach

                        <div class="pt-5 border-t border-t-gray-400">
                            <div class="flex justify-between">
                                <div>{{ __('tokens') }}:</div>
                                <div>{{ $selected->count() }}</div>
                            </div>
                        </div>
                        <div class="flex justify-end mt-10">
                            <x-button wire:click="confirmBooking">{{ __('Confirm Booking') }}</x-button>

                        </div>
                    @endif
                </x-card>
            </div>
        </div>
    </x-card>


    @script
    <script>
        $wire.on('booked', () => {
            setTimeout(() => {
                console.log('redirecting');
                window.location.href = '/dashboard'
            }, 8000)
        });
    </script>
    @endscript
</div>
