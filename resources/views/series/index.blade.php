@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Series</div>

                    <div class="panel-body">
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