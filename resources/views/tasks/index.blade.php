@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="mb-4 d-flex align-items-center justify-content-between">
            <h1>لیست کارها </h1>
            <a href="{{route('tasks.create')}}" class="btn btn-primary">اضافه کردن</a>
        </div>

        @if(session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
        @endif


        @forelse($tasks as $index => $task)
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{$task->title}}</h5>
                <span class="badge badge-primary">{{$task->done ? 'انجام شده ' : 'انجام نشده' }}</span>
            </div>
        </div>
        @empty
            <div class="alert alert-info">شما هنوز هیچ کاری اضافه نکرده ایید</div>
        @endforelse
    </div>
@endsection
