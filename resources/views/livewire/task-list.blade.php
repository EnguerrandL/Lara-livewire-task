<div>

    @if (session('error'))
        <div role="alert">
            <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                Oups....
            </div>
            <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                <p>{{ session('error') }}</p>
            </div>
        </div>
    @endif





    @include('livewire.includes.create-task-box')
    @include('livewire.includes.searchbox')
    <div id="todos-list">



        @foreach ($tasks as $task)
            @include('livewire.includes.task-card')
        @endforeach


        <div class="my-2">
            {{ $tasks->links('vendor.livewire.custompaginate') }}
        </div>
    </div>
</div>
