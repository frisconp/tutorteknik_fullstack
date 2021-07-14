@extends('layouts.base')
@section('title', 'Detail Course')
@section('content')
<div class="mt-10 sm:mt-0">
    <div class="flex justify-center">
        <div class="w-1/2">
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="flex flex-col space-y-4">
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                            <p class="text-sm">{{ $course->title }}</p>
                        </div>
                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <p class="text-sm">{{ $course->description }}</p>
                        </div>
                        <div>
                            <label for="thumbnail" class="block text-sm font-medium text-gray-700">Thumbnail</label>
                            @if ($course->thumbnail)
                                <img src="{{ asset('storage/' . $course->thumbnail) }}" class="w-1/2" alt="">
                            @else
                                <p class="text-sm">There is no thumbnail available</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
