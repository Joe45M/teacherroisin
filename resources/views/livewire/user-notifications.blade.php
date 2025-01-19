<div x-data="{ open: false }" class="self-center relative">

    <button @click="open = !open" class="{{ $notifications->count() ? 'text-brand-500' : 'text-gray-500' }} relative">
        <i class="fa-solid z-0 fa-bell text-lack"></i>

        @if($notifications->count())
            <span class="absolute right-[-10px] px-1 top-0 text-xs z-10 bg-brand-300 text-white rounded-full">
                {{ $notifications->count() }}
            </span>
        @endif
    </button>

    <div x-show="open" class="absolute top-full left-0 p-3 bg-white rounded-[12px] shadow-main">
        @foreach($notifications as $notification)

            <button wire:click="open('admin.class-list', {{ $notification }})" class="text-left p-3 lg:w-[300px] block">
                <p class="font-bold">You have a new class</p>
                <p class="text-sm text-gray-500">At {{ \Carbon\Carbon::parse($notification->data['lesson']['lesson_at'])->format('d/m/y h:i') }}</p>
            </button>

        @endforeach
    </div>
</div>
