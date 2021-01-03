<!-- Navigation Links -->
<div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-jet-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-jet-nav-link>
                    <x-jet-nav-link href="{{ route('boards.index') }}" :active="request()->routeIs('boards.index')">
                        {{ __('Vos Boards') }}
                    </x-jet-nav-link>
                </div>
@extends('layouts.main')

@section('title', "Board's tasks")


@section('content')
    <h2>{{$board->title}}</h2>
    <h3>Liste des tâches</h3>
    <!-- Condition if qui fait en sorte que si il y'a aucune tache affiche un bouton pour creer une tache -->
    <!-- Et si il y'a une tâche on peut en rajouter -->
    @if(count($board->tasks ) == 0)
            <a href="{{route('tasks.create', $board)}}">Veuillez créer une tâche</a>
        @else
            <a href="{{route('tasks.create', $board)}}">Ajouter une tâche</a>
            @foreach ($board->tasks as $task)
            <p>{{ $task->title }}. 
                <a href="{{route('tasks.show', [$board, $task])}}">detail</a> <a href="{{route('tasks.edit', [$board, $task])}}">edit</a></p>
                <form action="{{route('tasks.destroy', [$board, $task])}}" method='POST'>
                    @method('DELETE')
                    @csrf
                    
                    <button type="submit">Delete</button>
                </form>
            @endforeach
        @endif
@endsection