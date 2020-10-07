@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">Media items</div>

                    <form action="{{route('search')}}" method="POST" role="search">
                        @csrf
                        <div class="input-group mt-2 p-3">
                            <input type="text" class="form-control" name="searchName" placeholder="Zoek een post">
                            <select name="category">
                                <option value="alles">Alles</option>
                                @foreach($categories as $category)
                                    <option>{{$category['category']}}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-primary mb-2">Zoeken</button>
                        </div>
                    </form>
                    <div>
                        @if($errors->any())
                            <h4>{{$errors->first()}}</h4>
                        @endif
                    </div>

                    <div class="card-body">
                        @foreach($items as $item)
                            <h4><a href="{{route('media')}}/{{$item['id']}}">{{$item['title']}}</a></h4>
                            <p>{{$item['category']}}</p>
                            <br>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()
