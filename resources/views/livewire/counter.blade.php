<div class="mt-10">

    @if (session('success'))
       <span class="px-3 py-3  text-xs bg-green-700 rounded text-white">  {{ session('success') }} </span>
    @endif

<form class="p-5" wire:submit="createUser" method="post">
    <input class=" shadow-md  border-gray-100 rounded px-3 p-y mb-1" wire:model="name" type="text" name"name" placeholder="name">
  @error('name')
      <span class="text-red-500 text-xs"> {{ $message }}</span>
  @enderror
    <input class=" shadow-md border-gray-100 rounded px-3 p-y mb-1" wire:model="email" type="email" name"email" placeholder="email">
    @error('email')
    <span class="text-red-500 text-xs"> {{ $message }}</span>
@enderror
    <input class=" shadow-md border-gray-100 rounded px-3 p-y mb-1" wire:model="password" type="password" name"password" placeholder="password">
    @error('password')
    <span class="text-red-500 text-xs"> {{ $message }}</span>
@enderror

    <button class="block rounder px-3 py-1 bg-green-400 text-blue-200" >Ajouter</button>
   
  

</form>

<h2 class="text-2xl text-blue-900">Nombre d'utilisateurs : {{ $users->count() }}</h2>

@foreach ($users as $user)

<p>{{ $user->name }}</p>

@endforeach


<br>
    {{ $users->links('vendor.livewire.custompaginate') }}

</div>
