@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="card">
                    <div class="card-header">Series</div>

                    <div class="card-body">
                        @foreach ($series as $series)
                            <article>
                                <h4>
                                    <a href="{{ $series->path() }}">
                                        {{ $series->title }}
                                    </a>
                                </h4>
                            </article>

                            <hr>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection