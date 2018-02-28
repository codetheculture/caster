@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="card">
                    <div class="card-header">{{ $series->title }}</div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @foreach ($series->episodes as $episode)
                    <div class="card">
                        <div class="card-header">
                            {{ $episode->created_at->diffForHumans() }}
                        </div>

                        <div class="card-body">
                            {{ $episode->title }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection