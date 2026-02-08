@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="alert alert-success shadow">
        <h4 class="alert-heading">Erfolg!</h4>
        <p>Hallo <strong>{{ Auth::user()->name }}</strong>! Du bist erfolgreich eingeloggt.</p>
        <hr>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-outline-danger btn-sm">Abmelden</button>
        </form>
    </div>
</div>
@endsection