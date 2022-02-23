@extends('layouts.dashboard')

@section('content')
    <h1>Benvenuto nella dashboard</h1>

    @if ($user->userInfo) 
        <div>
            Numero di telefono: {{ $user->userInfo->phone }}
        </div>
    
        <div>
            Indirizzo: {{ $user->userInfo->address }}
        </div>
    @endif

@endsection

