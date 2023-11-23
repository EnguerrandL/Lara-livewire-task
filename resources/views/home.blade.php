@extends('layouts.base')

@section('title', 'Accueil')


@section('content')
{{-- @livewire('task-list') --}}
{{-- @livewire('add-image') --}}
{{-- @livewire('show-user-list') --}}
{{-- <livewire:show-user-list mountValue="Passage de données via mount()" /> --}}




<div>
    
{{ $slot }}
</div>




@endsection
    
