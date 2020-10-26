@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header d-flex justify-content-between align-items-centerr">
                        <div>Media items</div>
                        <div>Totaal: {{$totalItems}}</div>
                    </div>

                    <form action="{{route('search')}}" method="POST" role="search">
                        @csrf
                        <div class="input-group mt-2 p-3">
                            <input type="text" class="form-control" name="searchName" placeholder="Zoek een post">
                            <select class="form-control" name="category">
                                <option value="alles">Alles</option>
                                @foreach($categories as $category)

                                    <option>{{$category['category']}}</option>
                                @endforeach
                            </select>
                            <div class="p-1"></div>
                            <button type="submit" class="btn btn-primary mb-2">Zoeken</button>
                        </div>
                    </form>
                    <div>
                        @if($errors->any())
                            <div class="card-body">
                                <p class="alert alert-danger">{{$errors->first()}}</p>
                            </div>
                        @endif
                    </div>

                    <div class="card-body">
                        @foreach($items as $item)
                            @if($item['status'] == 'active')
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h4><a href="{{route('media')}}/{{$item['id']}}">{{$item['title']}}</a></h4>
                                        <p>{{$item['category']}}</p>
                                    </div>
                                </div>
                            @else
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()
