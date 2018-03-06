@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="card">
                    <div class="card-header">{{ $episode->title }}</div>
                    <div class="card-body">
                        ...
                    </div>
                    <div class="card-footer">
                        {{ $episode->created_at->diffForHumans() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection