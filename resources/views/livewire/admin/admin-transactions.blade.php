<div>


    <div class="container mx-auto pt-10">
        <a href="{{ route('admin.home') }}" class="text-brand-500 mb-5 inline-block underline">Back to admin</a>

        @foreach($transactions->sortByDesc('created_at') as $transaction)

            <div class="p-5 bg-white rounded-md grid lg:grid-cols-2 gap-10">
                <div>
                    <p class="font-bold">Internal ID</p>
                    <p>{{ $transaction->id }}</p>
                </div>
                <div>
                    <p class="font-bold">Currency</p>
                    <p>{{ $transaction->currency }}</p>
                </div>
                <div>
                    <p class="font-bold">Amount</p>
                    <p>{{ $transaction->amount }}</p>
                </div>
                <div>
                    <p class="font-bold">Created at</p>
                    <p>{{ $transaction->created_at }}</p>
                </div>
                <div>
                    <p class="font-bold">User</p>
                    <div x-data="{open: false}">
                        <div class="border border-gray-100 rounded-md p-3">
                            <button @click="open  = !open" class="flex justify-between w-full items-center">
                                {{ $transaction->user->name }}
                                <i class="fa-duotone fa-regular fa-chevron-down"></i>
                            </button>

                            <div x-show="open" class="mt-4">
                                @foreach($transaction->user->getAttributes() as $key => $value)
                                    <div class="mb-3">
                                        @if(!in_array($key, ['password', 'email_verified_at', 'remember_token']))
                                            <p class="font-bold">{{ $key }}</p>
                                            <p>{{ $value }}</p>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <p class="font-bold">Tokens</p>
                    <div x-data="{open: false}">
                        <div class="border border-gray-100 rounded-md p-3">
                            <button @click="open  = !open" class="flex justify-between w-full items-center">
                                Tokens
                                <i class="fa-duotone fa-regular fa-chevron-down"></i>
                            </button>

                            <div x-show="open" class="mt-4">
                                @foreach($transaction->tokens->getAttributes() as $key => $value)
                                    <div class="mb-3">
                                        @if(!in_array($key, ['password', 'email_verified_at', 'remember_token']))
                                            <p class="font-bold">{{ $key }}</p>
                                            <p>{{ $value }}</p>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>


                </div>
            </div>

            <hr>

        @endforeach
    </div>
</div>
