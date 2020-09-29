@extends('layout.layout')

@section('content')
    <div
        class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                <img src="https://raw.githubusercontent.com/Boost9898/fanbase/master/public/images/fanbaseLogo.svg">
            </div>

            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="grid grid-cols-1 md:grid-cols-2">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="ml-4 text-lg leading-7 font-semibold">
                                <a class="text-gray-900 dark:text-white">Create</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if ($errors->any())
                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <a class="text-gray-900 dark:text-white">
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            @endif

            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="ml-4 text-lg leading-7 font-semibold">
                            <a class="text-gray-900 dark:text-white">
                                <form method="post" action="{{route('store.post')}}">
                                    @csrf
                                    <label for="title">Title:</label><br>
                                    <input type="text" id="title" name="title" placeholder="title of the item"><br><br>

                                    <label for="description">Description:</label><br>
                                    <textarea id="description" name="description" placeholder="description" rows="6" cols="60"></textarea><br><br>

                                    <label for="media">Media:</label><br>
                                    <input type="text" id="media" name="media" placeholder="link to media item"><br><br>

                                    <input type="submit" value="Verzenden">
                                </form>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection()

