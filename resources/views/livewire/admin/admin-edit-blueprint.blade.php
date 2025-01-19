<div>
    <div class="container mx-auto mt-5">

        <a href="{{ route('admin.blueprints') }}" class="text-brand-500 mb-5 inline-block underline">Back to Blueprints</a>


        <x-success></x-success>

        <x-card title="Edit {{ $blueprint->unit . ' ' . $blueprint->name }}">


            <div class="mb-3">

                <x-input-label>
                    Unit Name:
                </x-input-label>
                <x-text-input wire:model="blueprint.unit"></x-text-input>

            </div>
            <div class="mb-3">

                <x-input-label>
                    Lesson Name/Number:
                </x-input-label>
                <x-text-input wire:model="blueprint.lesson"></x-text-input>

            </div>
            <div class="mb-3">

                <x-input-label>
                    Description
                </x-input-label>
                <x-text-input wire:model="blueprint.description"></x-text-input>

            </div>

            <x-button wire:click="save">Save Blueprint</x-button>

        </x-card>
    </div>
</div>
