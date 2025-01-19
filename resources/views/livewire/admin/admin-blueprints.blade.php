<div>
    <div class="container mx-auto pt-10">


        <a href="{{ route('admin.home') }}" class="text-brand-500 mb-5 inline-block underline">Back to admin</a>

        <x-success></x-success>



        <div x-data="{ open: false }">
            <button @click="open = !open" class="px-10 bg-brand-500 rounded-[12px] py-3 text-white mb-10">

                <span x-show="!open">Create</span>
                <span x-show="open">Cancel</span>

                new blueprint</button>

            <x-card x-show="open" title="New Blueprint">
                <div class="mb-3">

                    <x-input-label>
                        Unit Name:
                    </x-input-label>
                    <x-text-input wire:model="unit"></x-text-input>

                </div>
                <div class="mb-3">

                    <x-input-label>
                        Lesson Name/Number:
                    </x-input-label>
                    <x-text-input wire:model="lesson"></x-text-input>

                </div>
                <div class="mb-3">

                    <x-input-label>
                        Description
                    </x-input-label>
                    <x-text-input wire:model="description"></x-text-input>

                </div>

                <x-button wire:click="save">Save Blueprint</x-button>
            </x-card>
        </div>


        @if(!$blueprints->count())

            <div>
                <h3 class="text-[32px] text-text font-bold mt-10">No blueprints yet.</h3>
            </div>

        @endif


        @if($blueprints->count())

            <div>
                <h3 class="text-[32px] text-text font-bold mb-5 mt-10">Blueprints.</h3>

                <div class="grid grid-cols-3 gap-10">
                    @foreach($blueprints as $blueprint)

                        <x-card title="{{ $blueprint->unit }}">
                            <p class="font-bold mb-3">{{ $blueprint->lesson }}</p>

                            <p class="text-gray-400">
                                {{ $blueprint->description }}
                            </p>

                            <div class="flex justify-end">
                                <a class="text-brand-500 underline" href="{{ route('admin.blueprints.edit', $blueprint->id) }}">Edit Blueprint</a>

                            </div>
                        </x-card>

                    @endforeach
                </div>
            </div>

        @endif

    </div>
</div>
