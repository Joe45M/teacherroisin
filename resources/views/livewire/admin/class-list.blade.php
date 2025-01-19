<div>
    <div x-data="{ tab: 'all' }" class="container mx-auto pt-10">


        <a href="{{ route('admin.home') }}" class="text-brand-500 mb-5 inline-block underline">Back to admin</a>

        <div class="flex gap-3">
            <button :class="tab === 'all' ? 'bg-brand-500' : 'bg-gray-300'" @click="tab = 'all'" class="px-3 py-2 mb-3 rounded-full">All</button>
            <button :class="tab === 'unconfirmed' ? 'bg-brand-500' : 'bg-gray-300'" @click="tab = 'unconfirmed'" class="px-3 py-2 mb-3 rounded-full">Unconfirmed</button>
            <button :class="tab === 'confirmed' ? 'bg-brand-500' : 'bg-gray-300'" @click="tab = 'confirmed'" class="px-3 py-2 mb-3 rounded-full">Confirmed</button>
            <button :class="tab === 'cancelled' ? 'bg-brand-500' : 'bg-gray-300'" @click="tab = 'cancelled'" class="px-3 py-2 mb-3 rounded-full">Cancelled</button>
        </div>

        @foreach($lessons->sortBy('lesson_at') as $lesson)
            <div x-show="tab === 'all' || tab === '{{ $lesson->status }}'" class="mb-5">
                <livewire:lesson-card :lesson="$lesson" :key="$lesson->id"></livewire:lesson-card>
            </div>
        @endforeach
    </div>
</div>
