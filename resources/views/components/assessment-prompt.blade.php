<div class="bg-white self-start shadow-main p-5 rounded-[12px]">
    <div>
        <div class="flex gap-3 mb-5 items-center">
            <div class="w-10 h-10 rounded-full flex items-center justify-center bg-brand-500 text-white">
                <i class="fa-solid fa-exclamation"></i>
            </div>

            <h3 class="text-[22px] font-bold text-text">
                Assessment
            </h3>
        </div>
        <div>
            <p class="text-text mb-5">Before your first class, please complete your knowledge assessment.</p>
            <div class="flex justify-end">
                <a href="{{ route('assessment') }}" class="bg-nd-500 pulse self-center items-center px-2 py-2 rounded-full flex gap-3 font-bold text-white">
                    <div class="bg-nd-400 rounded-full w-8 relative h-8">
                        <i class="fa-solid fa-arrow-right absolute left-1/2 top-1/2 translate-x-[-50%] translate-y-[-50%]"></i>
                    </div>
                    Take assessment
                </a>
            </div>
        </div>
    </div>
</div>
