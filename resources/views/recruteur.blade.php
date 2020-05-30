@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard recruteur</div>

                <div class="card-body">
                    Hi boss!

                    <a href="{{ url('/offre/create') }}"> create offre </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection