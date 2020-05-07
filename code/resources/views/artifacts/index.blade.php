@extends('layouts.main')

@section('title', 'Artifacts')

@section('content')
<div class="artifacts-container">
    @foreach($artifacts as $item)
        @include('artifacts.single', ['item' => $item])
    @endforeach
</div>
@endsection
