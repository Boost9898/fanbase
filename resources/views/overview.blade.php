@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Overzicht</div>

                    <div class="card-body">
                        <h1>Overzicht van mijn media posts</h1>
                    </div>

                    <div class="card-body">
                        <table class="table table-hover w-100%">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Titel</th>
                                <th scope="col">Categorie</th>
                                <th scope="col">Status</th>
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
                                            <button type="button" class="btn btn-primary" disabled>Active</button>

                                            @else
                                            <input type="hidden" value="{{$item['status']}}" name="status" id="status">
                                            <button type="button" class="btn btn-secondary" disabled>Inactive</button>
                                            @endif
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
