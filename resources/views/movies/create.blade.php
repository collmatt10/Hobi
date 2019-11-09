@extends('layouts.app')
@section('content')
    <h3 class="text-center">Create Movie</h3>
    <form action="{{ route('movies.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="title">Movie Title</label>
            <input type="text" name="title" id="title" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" value="{{ old('title') }}" placeholder="Enter Title">
            @if($errors->has('title'))
                <span class="invalid-feedback">
                    {{ $errors->first('title') }}
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="director">Movie Director</label>
            <textarea name="director" id="director" rows="4" class="form-control {{ $errors->has('director') ? 'is-invalid' : '' }}" placeholder="Enter Movie Director">{{ old('director') }}</textarea>
            @if($errors->has('director')) {{-- <-check if we have a validation error --}}
                <span class="invalid-feedback">
                    {{ $errors->first('director') }} {{-- <- Display the First validation error --}}
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="company">Movie Company</label>
            <textarea name="company" id="company" rows="4" class="form-control {{ $errors->has('company') ? 'is-invalid' : '' }}" placeholder="Enter Movie Company">{{ old('company') }}</textarea>
            @if($errors->has('company')) {{-- <-check if we have a validation error --}}
                <span class="invalid-feedback">
                    {{ $errors->first('company') }} {{-- <- Display the First validation error --}}
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="boxoffice">Movie Box-Office</label>
            <textarea name="boxoffice" id="boxoffice" rows="4" class="form-control {{ $errors->has('boxoffice') ? 'is-invalid' : '' }}" placeholder="Enter Movie Box-Office">{{ old('boxoffice') }}</textarea>
            @if($errors->has('boxoffice')) {{-- <-check if we have a validation error --}}
                <span class="invalid-feedback">
                    {{ $errors->first('boxoffice') }} {{-- <- Display the First validation error --}}
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="runtime">Movie Runtime</label>
            <textarea name="runtime" id="runtime" rows="4" class="form-control {{ $errors->has('runtime') ? 'is-invalid' : '' }}" placeholder="Enter Movie Runtime">{{ old('runtime') }}</textarea>
            @if($errors->has('runtime')) {{-- <-check if we have a validation error --}}
                <span class="invalid-feedback">
                    {{ $errors->first('runtime') }} {{-- <- Display the First validation error --}}
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="body">Movie Description</label>
            <textarea name="body" id="body" rows="4" class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" placeholder="Enter Movie Decsription">{{ old('body') }}</textarea>
            @if($errors->has('body')) {{-- <-check if we have a validation error --}}
                <span class="invalid-feedback">
                    {{ $errors->first('body') }} {{-- <- Display the First validation error --}}
                </span>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
