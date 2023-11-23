<div wire:poll.10s class="w-50 ">
    <input wire:model.live.debounce.250ms="search" type="text" id="simple-search" class="bg-gray-50 border
     border-gray-300 text-gray-900 text-sm rounded-lg
      focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 
       dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
        dark:text-white dark:focus:ring-blue-500
         dark:focus:border-blue-500" p
    laceholder="Search branch name..." >


    {{ $mountValue}}
    <table class="table-auto">
        <thead>
            <tr>
                <th>User name </th>
                <th>User email</th>
                <th>Created at</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($this->users as $user)
            <tr>
             
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->created_at}}</td>
             



            </tr>
            @endforeach
        </tbody>
    </table>

</div>
