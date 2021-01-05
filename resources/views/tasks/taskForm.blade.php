@extends('layouts.app')

@section('content')
<x-title text="New Task" />
<form action="{{ route('save.task') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="validationServer01">Title</label>
            <input type="text" class="@error('title') is-invalid @enderror form-control" id="validationServer01" value="{{ old('title') }}" required name="title">
            @error('title')
            <p class="invalid-feedback">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="validationServer02">What</label>
            <textarea type="text" class="@error('description') is-invalid @enderror form-control" id="validationServer01" value="{{ old('what') }}" required name="what"></textarea>
            @error('what')
            <p class="invalid-feedback">{{$message}}</p>
            @enderror

        </div>
        <div class="mb-3">
            <label for="validationServer02">Points</label>
            <input type="number" class="@error('capacity') is-invalid @enderror form-control" id="validationServer01" value="{{ old('points') }}" required name="points">
            @error('capacity')
            <p class="invalid-feedback">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="validationServer03">Deadline</label>
            <input type="date" class="@error('date') is-invalid @enderror form-control" id="validationServer03" aria-describedby="validationServer03Feedback" required name="deadline">
            @error('date')
            <p class="invalid-feedback">{{$message}}</p>
            @enderror
        </div>

        <button class="btn btn-primary" type="submit">Save</button>
    </form>

@endsection