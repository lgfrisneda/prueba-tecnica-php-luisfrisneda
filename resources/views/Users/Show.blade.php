@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        {{ $user->name }}
                        <a href="{{ route('users.index') }}" class="btn btn-sm btn-light"><< Regresar</a>
                    </div>
                </div>
                <div class="card-body">
                    <h2>{{ $user->email }}</h2>
                    <h4>{{ $user->name }}</h4>
                    <a href="{{ route('users.edit', $user) }}" class="btn btn-sm btn-info">Editar usuario</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection