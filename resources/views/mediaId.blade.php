@extends('layouts.app')

@section('content')
    <div
        class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
        <div class="max-w-6xl mx-auto sm:px- lg:px-8">
            <div class="mt-8">
                <div class="grid grid-cols-1 md:grid-cols-1">
                    <div class="p-0">
                        <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                            <img src="https://raw.githubusercontent.com/Boost9898/fanbase/master/public/images/fanbaseLogo.svg">
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="grid grid-cols-1 md:grid-cols-1">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="ml-4 text-lg leading-7 font-semibold">
                                <a class="text-gray-900 dark:text-white">
                                    @if($id > count($items))
                                        <h1>Deze pagina is pakot!</h1>
                                    @endif

                                    @foreach($items as $item)
                                        @if($item['id']==$id)
                                            <h2>{{$item['title']}}</h2>
                                            {{$item['description']}}<br><br>
                                            <img class="imgPost" alt="media" src="{{$item['media']}}">
                                        @endif
                                    @endforeach
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
