@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        Agregar usuario
                        <a href="{{ route('users.index') }}" class="btn btn-sm btn-light"><< Regresar</a>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('users.store') }}">
                        @csrf
                        @include('users.partials.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection