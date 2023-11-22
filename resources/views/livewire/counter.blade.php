<div>


<form wire:submit="createUser" method="post">
    <input wire:model="name" type="text" name"name" placeholder="name">
    <input wire:model="email" type="email" name"email" placeholder="email">
    <input wire:model="password" type="password" name"password" placeholder="password">


    <button >Ajouter</button>
   
    <h2>Nombre d'utilisateurs : {{ $users->count() }}</h2>

    @foreach ($users as $user)

    <p>{{ $user->name }}</p>

    @endforeach

</form>

</div>
