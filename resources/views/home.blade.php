@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            
            <div class="card shadow-sm border-0 p-5">
                
                <!-- Leonardo DiCaprio Applaus GIF -->
                <div class="mb-4">
                    <img src="https://media3.giphy.com/media/v1.Y2lkPTc5MGI3NjExZ2d2eXJoNXRmd3Iwc3g3cDdxcHQ0bnJhMmQxMDB3MDN4dTRseTFvaCZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/DvWJHSOxTff84SQsD9/giphy.gif" 
                         alt="Leo Applaus" 
                         class="img-fluid rounded shadow" 
                         style="max-width: 400px;">
                </div>

                <h1 class="display-4 fw-bold">Geschafft!</h1>
                <h2 class="mb-4">Willkommen zurück, {{ auth()->user()->name }}!</h2>
                
                <p class="lead text-muted">Deine Anmeldung war erfolgreich.</p>
                
                <hr class="my-4" style="max-width: 200px; margin: auto;">

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger px-4">
                        Abmelden
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection