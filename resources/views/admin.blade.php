@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Admin beheer</div>

                    <div class="card-body">
                        <h1>Admin</h1>
                        <p>[X] Post uit db verwijderen</p>
                        <p>[ ] User soft deleten</p>
                        <p>[ ] Role user veranderen</p>
                    </div>

                    <div class="card-body">
                        <table class="table table-hover w-100%">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Titel</th>
                                <th scope="col">Categorie</th>
                                <th scope="col">Status</th>
                                <th scope="col">Actie</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                <tr>
                                    <td>{{$item['id']}}</td>
                                    <td>{{$item['title']}}</td>
                                    <td>{{$item['category']}}</td>
                                    <td>
                                        <form method="post" action="{{route('status.post')}}">
                                            @csrf
                                            <input type="hidden" value="{{$item['id']}}" name="id" id="id">
                                            @if($item['status'] == 'active')
                                            <input type="hidden" value="{{$item['status']}}" name="status" id="status">
                                            <button type="submit" class="btn btn-primary">Active</button>

                                            @else
                                            <input type="hidden" value="{{$item['status']}}" name="status" id="status">
                                            <button type="submit" class="btn btn-secondary">Inactive</button>
                                            @endif
                                        </form>
                                    </td>
                                    <td>
                                        <form method="post" action="{{route('delete.post')}}">
                                            @csrf
                                            <input type="hidden" value="{{$item['id']}}" name="id" id="id">
                                            <button type="submit" class="btn btn-danger">Verwijder</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="card-body">
                        <table class="table table-hover w-100%">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Gebruiker</th>
                                <th scope="col">Email</th>
                                <th scope="col">Type</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user['id']}}</td>
                                    <td>{{$user['name']}}</td>
                                    <td>{{$user['email']}}</td>
                                    <td>{{$user['type']}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
