@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Media item</div>
                    @if($id > count($items))
                        <div class="card-body">
                        <h1>Deze pagina is pakot!</h1>
                </div>
                    @endif

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
                </div>
            </div>
        </div>
    </div>
@endsection()
