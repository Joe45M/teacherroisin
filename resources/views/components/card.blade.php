<div {{ $attributes->merge(['class' => 'bg-white p-5 rounded-[12px] shadow-main overflow-visible']) }}>

    @if($title)
        <h3 class="text-[24px] text-text font-bold">{{ $title }}</h3>
    @endif

    {{ $slot }}
</div>
