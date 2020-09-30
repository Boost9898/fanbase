@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create</div>

                    @if ($errors->any())
                        <div class="alert alert-primary " role="alert">
                            <ul class="list-group">
                                <li class="list-group-item active">Zeg makker, je vergeet iets:</li>
                                @foreach ($errors->all() as $error)
                                    <li class="list-group-item">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="card-body">
                        <form method="post" id="mediaCreate" action="{{route('store.post')}}">
                            @csrf
                            <div lass="form-group">
                                <label for="title">Title:</label><br>
                                <input type="text" class="form-control" id="title" name="title" placeholder="title of the item"><br><br>
                            </div>

                            <div lass="form-group">
                                <label for="description">Description:</label><br>
                                <textarea class="form-control" id="description" name="description" placeholder="description" rows="6" cols="60"></textarea><br><br>
                            </div>

                            <div lass="form-group">
                                <label for="media">Media:</label><br>
                                <input type="text" class="form-control" id="media" name="media"
                                       placeholder="link to media item"><br><br>
                            </div>

                            <div lass="form-group">
                                <label for="title">Category:</label><br>
                                <select class="form-control" id="category" name="carlist" form="mediaCreate">
                                    <option value="UIT DATABASE HALEN">UIT DATABASE HALEN</option>
                                </select><br><br>
                            </div>

                            <input type="submit" class="btn btn-primary" value="Verzenden">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()
