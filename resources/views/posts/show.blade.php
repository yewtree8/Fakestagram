@extends('layouts.app');
@section('content')

    <div class="container" xmlns="http://www.w3.org/1999/html">
        <div class="row">
            <div class="col-8">
                <img src="/storage/{{$post->image}}" alt="" class="w-100">
            </div>
            <div class="col-4">
                <div>
                    <div class="d-flex align-items-center">
                        <div class="pr-2">
                            <img src="/storage/{{$post->user->profile->image}}" class="rounded-circle w-100" style="max-width: 45px;">
                        </div>
                        <div class="pt-1">
                            <div class="font-weight-bold" >
                                <a href="/profile/{{ $post->user->id }}">
                                    <span class="text-dark" style="font-size: 15px;">{{$post->user->username}}</span>
                                </a>
                                <a href="#" class="pl-2">Follow</a>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="pt-1 d-flex align-items-baseline">
                        <div class="font-weight-bold" style="font-size: 17px;"><a href="/profile/{{$post->user->id }}"><span class="text-dark">{{$post->user->username}}</span></a> </div>
                        <p class="pl-2">{{$post->caption}}</p>
                    </div>
                </div>
            </div>

        </div>



    </div>
@endsection
