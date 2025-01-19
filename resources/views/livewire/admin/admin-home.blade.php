<div>
    <div class="container mx-auto pt-5">

        <div class="flex gap-3">
            <a href="{{ route('admin.home') }}" class="text-brand-500 mb-5 inline-block underline"></a>

            <a href="{{ route('admin.blueprints') }}" class="text-brand-500 mb-5 inline-block underline">Manage blueprints</a>

            <a href="{{ route('admin.calendar') }}" class="text-brand-500 mb-5 inline-block underline">Manage calendar</a>

            <a href="{{ route('admin.class-list') }}" class="text-brand-500 mb-5 inline-block underline">Manage classes</a>

        </div>


        <div>


            <div class="flex justify-between flex-wrap">
                <h3 class="text-[22px] text-text mb-5 font-bold">Today's agenda</h3>

                <a class="underline text-brand-600" href="{{ route('admin.class-list') }}">View all classes</a>

            </div>

            <div class="grid mb-5 gap-5 grid-cols-4">
                @foreach($classesToday->sortBy('lesson_at') as $class)

                    <livewire:lesson-card :lesson="$class"></livewire:lesson-card>

                @endforeach
            </div>
        </div>


        <div class="bg-white p-3 rounded-[12px]">
            <h3 class="text-[32px] font-bold mb-5 text-text">All Students</h3>
        </div>



        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Student name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Completed assessment
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Classes taken
                    </th>
                    <th scope="col" class="px-6 py-3">
                        View
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)

                    <tr class="bg-white">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $user->name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $user->assessment ? 'Yes' : 'No' }}
                        </td>
                        <td class="px-6 py-4">
                            0
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('admin.view-student', $user->id) }}" class="text-brand-600 underline">View</a>
                        </td>
                    </tr>


                @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
