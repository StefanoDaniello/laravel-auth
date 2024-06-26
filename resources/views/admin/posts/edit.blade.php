@extends('layouts.admin')

@section('title', 'Create Post')

@section('content')
    <section>
        <h2>Edit Post</h2>
        <form action="{{ route('admin.posts.update', $post) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                    value="{{$post->title}}" minlength="3" maxlength="200">
                    @error('title')
                        <div class ="alert alert-danger">{{$errors->first('title')}}</div>
                    @enderror 
                <div id="titleHelp" class="form-text text-white">Inserire minimo 3 caratteri e massimo 200</div>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" accept="image/*" 
                class="form-control @error('image') is-invalid @enderror" id="upload_image"
                name="image" value="{{old('image', $post->image)}}">
                @error('image')
                    <div class ="alert alert-danger">{{$errors->first('image')}}</div>
                @enderror 
                <h4 class="mt-3">Your image</h4>
                @if($post->image)
                <img class="shadow rounded-4 m-4" width="150" src="{{asset('storage/' . $post->image)}}" alt="{{$post->title}}" id="uploadPreview">
                @else
                <img class="shadow rounded-4 m-4" width="150" src="{{ old('cover_image', $post->image) }}" alt="{{$post->title}}" id="uploadPreview">
                @endif
            </div>


            {{-- <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="url" class="form-control @error('image') is-invalid @enderror" id="image"
                    name="image" value="{{$post->image}}">
                    @error('image')
                        <div class ="alert alert-danger">{{$errors->first('image')}}</div>
                    @enderror 
            </div> --}}



            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content">
                {{ $post->content }}
              </textarea>
                @error('content')
                    <div class ="alert alert-danger">{{$errors->first('content')}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Modifica</button>
                <button type="reset" class="btn btn-danger mx-4">
                    <a href="{{route('admin.posts.index')}}" class="text-white">Annulla</a>
                </button>
            </div>
        </form>


    </section>

@endsection