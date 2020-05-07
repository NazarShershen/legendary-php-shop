@extends('layouts.main')

@section('title', 'Add Artifact')

@section('content')
<style>
    form label {
        color: #fff;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <form action="{{ route('artifacts.store') }}" enctype="multipart/form-data" method="POST" class="create-artifact" novalidate>
                @csrf
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input class="form-control" placeholder="Enter title" id="title" name="title" value="{{ old('title') }}" required>
                </div>
                <div class="form-group">
                    <label for="attributes">Attributes:</label>
                    <input class="form-control" placeholder="e.g. Armor:670;Movement Speed:-5%" id="attributes" name="attributes" value="{{ old('attributes') }}" required>
                </div>
                <div class="form-group">
                    <label for="modifiers">Modifiers:</label>
                    <textarea class="form-control" placeholder="-10% to Fire Resistance&#10;-20% to Lightning Resistance&#10;" id="modifiers" name="modifiers" required>{{ old('modifiers') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea class="form-control" placeholder="Enter description" id="description" name="description" required>{{ old('description') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="number" class="form-control" placeholder="Enter price" id="price" name="price" value="{{ old('price') }}" required>
                </div>
                <div class="form-group">
                    <label for="image">Image:</label>
                    <input type="file" accept="image/png, image/jpeg" class="form-control" id="image" name="image">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <br>
            <div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        <span>{{ session()->get('message') }}</span>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
