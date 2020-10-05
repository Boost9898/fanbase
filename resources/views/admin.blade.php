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
                                <th scope="col">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user['id']}}</td>
                                    <td>{{$user['name']}}</td>
                                    <td>{{$user['email']}}</td>
                                    <td>{{$user['type']}}</td>
                                    <td>{{$user['status']}}</td>
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
