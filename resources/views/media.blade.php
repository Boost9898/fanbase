@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Media items</div>

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
