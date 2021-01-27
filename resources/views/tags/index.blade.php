@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="mb-4 d-flex align-items-center justify-content-between">
            <h1>لیست تگ ها  </h1>

            <div>
                <a href="{{route('tags.create')}}" class="btn btn-primary">اضافه کردن</a>
                <a href="{{route('tasks.index')}}" class="btn btn-secondary">مدیریت تسگ ها</a>
            </div>

        </div>

        @if(session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
        @endif


        @forelse($tags as $index => $tag)
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title" style="color: {{$tag->color}}">{{$tag->name}}</h5>
                </div>
            </div>
        @empty
            <div class="alert alert-info">شما هنوز هیچ تگی اضافه نکرده ایید</div>
        @endforelse
    </div>
@endsection


