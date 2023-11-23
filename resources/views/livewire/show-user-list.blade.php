<div class="flex-1 ">


    <table class="table-auto">
        <thead>
            <tr>
                <th>User name </th>
                <th>User email</th>
                <th>Created at</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
             
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->created_at}}</td>
             



            </tr>
            @endforeach
        </tbody>
    </table>

</div>
