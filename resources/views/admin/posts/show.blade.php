@extends('admin.layouts.app')

@section('title', 'View Post')

@section('content')
    <div class="bg-white rounded-lg shadow p-6">
        <h1 class="text-2xl font-bold mb-4">{{ $post->title }}</h1>
        <div class="text-gray-600 mb-4">{{ $post->content }}</div>
        <a href="{{ route('posts.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Back</a>
    </div>
@endsection