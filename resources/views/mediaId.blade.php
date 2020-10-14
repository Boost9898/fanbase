@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Media item</div>
                    <div class="card-body">
                        @foreach($items as $item)
                            @if($item['id']==$id)
                                <h2>{{$item['title']}}</h2>
                                <h6>{{$item['category']}}</h6><br>
                                <p>{{$item['description']}}</p>
                                <img class="imgPost" alt="media" src="{{$item['media']}}">
                            @endif
                        @endforeach
                    </div>

                    <div class="card-body">
                        <form method="post" id="like" action="{{route('media.like')}}">
                            @csrf
                            <input type="hidden" value="{{$id}}" name="id" id="id">
                            <input type="hidden" value="" name="like" id="like">
                            @foreach($items as $item)
                                @if($item['id']==$id)
                                    <button type="submit" class="btn btn-primary">💿 Likes: {{$item['like']}}
                                @endif
                            @endforeach
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()
