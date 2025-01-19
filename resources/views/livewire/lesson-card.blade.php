<x-card x-data="{ addBlueprint: false, addLink: false }">
    <div class="flex justify-between">
        <p class="font-bold">
            {{ $lesson->student->name }}
        </p>
        <p>
            {{ $lesson->lesson_at->format('h:i') }}
        </p>
    </div>
    <hr class="my-3">

    @if(!$lesson->blueprint->count())
        <div class="bg-gray-100 p-3 rounded-md mb-3">
            <i class="fa-duotone fa-solid fa-circle-exclamation"></i>
            No blueprint.
            <button @click="addBlueprint = true" class="text-brand-500 underline">Add</button>
        </div>
    @else
        <div>
            {{ $lesson->blueprint[0]->unit }} / lesson {{ $lesson->blueprint[0]->lesson }}
        </div>
    @endif

    @if(!$lesson->link)
        <div class="bg-gray-100 p-3 rounded-md mb-3">
            <i class="fa-duotone fa-solid fa-circle-exclamation"></i>
            No classroom link.
            <button @click="addLink = true" class="text-brand-500 underline">Add</button>
        </div>
    @else
        <div>
            <a href="{{ $lesson->link }}" class="text-brand-500 underline mt-3 block">Join classroom</a>
        </div>
    @endif



    <div class="flex bg-gray-100 p-3 items-center rounded-md mb-3 gap-3">
        <i class="fa-duotone fa-solid fa-calendar"></i>
        {{ $lesson->lesson_at->format('d/m/y h:i') }}
    </div>

    <div class="flex mt-3 bg-gray-100 p-3 items-center rounded-md mb-3 gap-3">
        <i class="fa-duotone fa-solid fa-book"></i>
        Assessment level: {{ $lesson->student->assessment->level }}
    </div>

    @if($lesson->status === 'unconfirmed')
        <div class="items-center text-xs mt-3 mb-5 flex justify-between bg-orange-500 text-white font-bold p-1 text-xs rounded-md">
            CLASS UNCONFIRMED
            <button wire:click="change({{ $lesson->id }}, 'confirmed')" class="px-5 bg-black/10 py-3 rounded-md"> Confirm class</button>
        </div>
    @endif
    @if($lesson->status === 'cancelled')
        <div class="items-center mt-3 mb-5 flex justify-between bg-red-500 text-white font-bold p-1 text-xs rounded-md">
            CLASS CANCELLED
        </div>
    @endif

    @if($lesson->status === 'confirmed')
        <div class="items-center text-xs mt-3 mb-5 flex justify-between bg-green-500 text-white font-bold px-1 py-1 rounded-md">
            CLASS CONFIRMED

            <button wire:click="change({{ $lesson->id }}, 'cancelled')"
                    wire:confirm="Are you sure you want to cancel this lesson?"

                    class="px-5 bg-black/10 py-3 rounded-md"> Cancel class</button>
        </div>
    @endif


    <div x-cloak x-show="addBlueprint" class="fixed w-full h-full z-50  top-0 left-0 bg-white/50 flex items-center justify-center">
        <x-card title="Add Blueprint" class="lg:w-1/3 h-1/3 overflow-y-auto">
            @foreach($blueprints as $blueprint)

                <button @click="addBlueprint = false" wire:click="addBlueprint({{ $blueprint }})" class="bg-gray-100 p-3 rounded-md block w-full mb-5">
                    <div class="flex justify-between">
                        <div> {{ $blueprint->lesson }}</div>
                        {{ $blueprint->unit }}
                    </div>

                    <hr class="my-3">

                    <div class="text-left">
                        {{ $blueprint->description }}
                    </div>
                </button>

            @endforeach
        </x-card>
    </div>


    <div x-cloak x-show="addLink" class="fixed w-full h-full z-50  top-0 left-0 bg-white/50 flex items-center justify-center">
        <x-card title="Add link" class="lg:w-1/3 h-1/3 overflow-y-auto">
            <x-input-label>Add classroom link</x-input-label>
            <x-text-input wire:model="link"></x-text-input>
            <x-button @click="addLink = false" wire:click="saveLink">Save</x-button>
        </x-card>
    </div>
</x-card>
