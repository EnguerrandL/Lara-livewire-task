<div class="mt-20 container ">

    <div class="container  mx-auto flex">


        <h1 class="text-2xl mt-5 mb-5 text-blue-500">Gestion des tâches</h1>


        <input type="search" id="default-search"
            class="block  p-2 ps-5 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
         dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Search..." required>


    </div>


    <div> @include('livewire.includes.task-list-modal')</div>





    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Task name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Assigned users
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Task completed
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Start date
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Limit date
                    </th>
                    <th scope="col" class="px-6 py-3">
                        End date
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            @if ($editingTaskId === $task->id)
                                <input wire:model="editingTaskName" type="text" placeholder="Task.."
                                       class="bg-gray-100 text-gray-900 text-sm rounded block w-full p-2.5">
                
                                @error('editingTaskName')
                                    <span class="text-red-500 text-xs block">{{ $message }}</span>
                                @enderror
                            @else
                                {{ $task->name }}
                            @endif
                        </th>



                        <td class="px-6 py-4">
                       ss
                        </td>

                        <td class="px-6 py-4">
                            Laptop
                        </td>
                        <td class="px-6 py-4">
                            {{ $task->date_start }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $task->date_limit }}
                        </td>
                        <td class="px-6 py-4">
                            sdqsdsqd
                        </td>
                        <td class="px-6 py-4 flex items-stretch">
                        
                            @if ($editingTaskId === $task->id)
                            <button wire:click="save" class="mt-3 px-4 py-2 bg-teal-500 text-white font-semibold rounded hover:bg-teal-600">Save</button>
                            <button wire:click="cancelEdit({{ $task->id }})" class="mt-3 px-4 py-2 bg-gray-500 text-white font-semibold rounded hover:bg-gray-600">Cancel</button>
                        @else
                            <button wire:click="edit({{ $task->id }})" class="mt-3 px-4 py-2 bg-teal-500 text-white font-semibold rounded hover:bg-teal-600">Edit</button>
                            <button wire:click="delete({{ $task->id }})" class="ml-5 self-center text-red-700"><svg
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </button>
                        @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>




    </div>
</div>
</div>
