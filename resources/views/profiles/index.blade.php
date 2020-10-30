@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Profile header -->
    <div class="row">
        <div class="col-3 p-5">
            <img src="/storage/{{ $user->profile->image }}" class="rounded-circle w-100" alt="">
        </div>

        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex">
                    <h1>{{$user->username}}</h1>
                    @cannot('update', $user->profile)
                        <?php if(Illuminate\Support\Facades\Auth::check()) { //Double check, must be signed in to follow.
                            ?>
                                <follow-button user-id="{{$user->id}}" follows="{{$follows}}"></follow-button>
                             <?php
                        }?>
                    @endcannot

                </div>

                @can('update', $user->profile)
                    <a href="/p/create/">Add New Post</a>
                @endcan
            </div>
            @can('update', $user->profile)
                <a href="/profile/{{$user->id}}/edit" class="align-items-center">Edit Profile</a>
            @endcan
            <div class="d-flex">
                <div class="pr-5"><strong>{{count($user->post)}}</strong> posts</div>
                <div class="pr-5"><strong>0</strong> followers</div>
                <div class="pr-5"><strong>0</strong> following</div>
            </div>
            <div class="pt-2 font-weight-bold">{{$user->name}}</div>
            <div>{{$user->profile->description}}</div>
            <a href="#">{{$user->profile->url ?? 'N/A'}}</a>
        </div>
    </div>
    <!-- End profile header -->
    <?php
    $rowQuantity = 2;
    ?>

    <div class="row pt-4">
        @foreach($user->post as $post)
            <div class="col-4 pb-4">
                <a href="/p/{{$post->id}}">
                 <img src="/storage/{{$post->image}}" class="w-100"/>
                </a>
            </div>
        @endforeach
    </div>

</div>
@endsection
