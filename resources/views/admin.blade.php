@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Admin</div>

                    <div class="card-body">
                        <h1>Admin</h1>
                        <p>[ ] Post uit db verwijderen</p>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Titel</th>
                                <th scope="col">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                <tr>
                                    <td>{{$item['id']}}</td>
                                    <td>{{$item['title']}}</td>
                                    <td>
                                        <form method="post" action="{{route('delete.post')}}">
                                            @csrf
                                            <input type="hidden" value="{{$item['id']}}" name="id" id="id">
                                            <button type="submit">Lekker klikken</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                    </div>

                    <p>[ ] User uit db verwijderen</p>

                    <p>[ ] Role user veranderen</p>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
