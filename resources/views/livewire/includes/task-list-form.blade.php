<form wire:submit.prevent="store" class="container max-w-lg mx-auto">

    <div class="mb-4">
        <label for="taskName" class="block text-sm font-medium text-gray-900 dark:text-white">Task Name</label>
        <input wire:model="taskName" type="text" id="taskName"
            class="form-input w-full mt-1 rounded-md shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        @error('taskName') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    <div class="mb-4">
        <label for="start-date" class="block text-sm font-medium text-gray-900 dark:text-white">Start Date</label>
        <input wire:model="taskStartDate" id="start-date" type="date"
            class="form-input w-full mt-1 rounded-md shadow-sm dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
            required>
        @error('taskStartDate') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    <div class="mb-4">
        <label for="limit-date" class="block text-sm font-medium text-gray-900 dark:text-white">Limit Date</label>
        <input wire:model="taskLimitDate" id="limit-date" type="date"
            class="form-input w-full mt-1 rounded-md shadow-sm dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
            required>
        @error('taskLimitDate') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    <div class="mb-4">
        <label for="message" class="block text-sm font-medium text-gray-900 dark:text-white">Your message</label>
        <textarea wire:model="taskDescription" id="message" rows="4"
            class="form-input w-full mt-1 rounded-md shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Write your thoughts here..."></textarea>
        @error('taskDescription') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    <div class="mb-4">
        <label for="taskAssignedUsers" class="block text-sm font-medium text-gray-900 dark:text-white">Assigned Users</label>
        <select wire:model="taskAssignedUsers" multiple id="taskAssignedUsers"
            class="form-input w-full mt-1 rounded-md shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
        @error('taskAssignedUsers') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-900 dark:text-white" for="multiple_files">Task files</label>
        <input class="form-input w-full mt-1 rounded-md shadow-sm cursor-pointer dark:text-gray-400"
            id="multiple_files" type="file" multiple>
    </div>

    <button type="submit"
        class="w-full bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 text-white font-medium rounded-md text-sm py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Add Task
    </button>

</form>
