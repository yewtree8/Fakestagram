@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="/profile/{{$user->id}}" enctype="multipart/form-data" method="post"> <!--Cant use patch. -->
            @csrf
            @method('PATCH') <!-- Set update -->
            <div class="row">
                <div class="col-8 offset-2">
                    <div class="row">
                        <h3>Edit Profile</h3>
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-md-4 col-form-label">Bio</label>
                        <input id="description"
                               type="text"
                               class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') ?? $user->profile->description }}">
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                                 {{ $message }}
                       </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="website" class="col-md-4 col-form-label">URL</label>
                        <input id="url"
                               type="text"
                               class="form-control @error('url') is-invalid @enderror" name="url" value="{{ old('url') ?? $user->profile->url }}">
                        @error('url')
                        <span class="invalid-feedback" role="alert">
                                 {{ $message }}
                       </span>
                        @enderror
                    </div>

                    <div class="row">
                        <label for="image" class="col-md-4 col-form-label">Profile Image</label>
                        <input type="file" class="form-control-file" id="image" name="image">
                        @error('image')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>

                    <div class="row pt-4">
                        <button class="btn btn-primary" type="submit">Save Profile</button>
                    </div>

                </div>
            </div>
        </form>
    </div>
@endsection
