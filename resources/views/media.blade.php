@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

{{--                    <div class="card-header">Media items</div>--}}
{{--                    <form class="form-inline mt-4" method="post" action="">--}}
{{--                        <div class="form-group mx-sm-3 mb-2">--}}
{{--                            <input type="text" class="form-control" id="search" placeholder="Zoeken">--}}
{{--                        </div>--}}
{{--                        <button type="submit" class="btn btn-primary mb-2">Zoek</button>--}}
{{--                    </form>--}}

                    <form action="/search" method="POST" role="search">
                        @csrf
                        <div class="input-group mt-2 p-3">
                            <input type="text" class="form-control" name="q" placeholder="Zoek een post">
                                <button type="submit" class="btn btn-primary mb-2">Zoeken</button>
                        </div>
                    </form>

                    <div class="card-body">
                        @foreach($items as $item)
                            <a href="{{route('media')}}/{{$item['id']}}">{{$item['title']}}</a><br>
                            <br>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()
