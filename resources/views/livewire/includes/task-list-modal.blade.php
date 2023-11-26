<form wire:submit="store" class="container">

    <div>
        <label for="taskName" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First name</label>
        <input wire:model="taskName" type="text" id="first_name"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            >
            @error('taskName') <span class="text-red-500">{{ $message }}</span> @enderror
    </div>





    <div class="col-span-2">
        <label for="start-date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Start Date</label>
        <input wire:model="taskStartDate" id="start-date" type="date"
               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
               required>
        @error('taskStartDate') <span class="text-red-500">{{ $message }}</span> @enderror
    </div>
    
    <!-- Task Limit Date -->
    <div class="col-span-2">
        <label for="limit-date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Limit Date</label>
        <input wire:model="taskLimitDate" id="limit-date" type="date"
               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
               required>
        @error('taskLimitDate') <span class="text-red-500">{{ $message }}</span> @enderror
    </div>

    <label  for="message"
        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your message</label>
    <textarea wire:model="taskDescription" id="message" rows="4"
        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        placeholder="Write your thoughts here..."></textarea>

        @error('taskDescription') <span class="text-red-500">{{ $message }}</span> @enderror
    


    <label for="taskAssignedUsers" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Assigned Users</label>
    <select wire:model="taskAssignedUsers" multiple id="taskAssignedUsers"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
     @foreach ($users as $user)
         
    
        <option value="{{ $user->id }}">{{ $user->name}}</option>
        @endforeach
    </select>
    @error('taskAssignedUsers') <span class="text-red-500">{{ $message }}</span> @enderror
    <button  wire:click.prevent="store"type="submit"
    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add task</button>
</form>
