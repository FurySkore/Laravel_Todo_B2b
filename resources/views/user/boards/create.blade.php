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

@section('title', "Create a new board")


@section('content')
    <p>Add a board </p>
    <div>
        <form action="/boards" method="POST">
            @csrf
            <label for="title">title</label>
            <input id="title" type="text" name="title" class="@error('title') is-invalid @enderror">

            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            
            <label for="description">Description</label>
            <input type='textarea' name='description' id="description" >
            <br>
            <button type="submit">Create</button>
        </form>

    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
@endsection