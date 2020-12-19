@extends('layouts.app')

@section('content')
    <a href="{{route('tasks.index')}}" class="btn btn-primary">بازگشت </a>
    <div class="container">

        <div class="mb-4 d-flex align-items-center justify-content-between">
            <h1> {{$task->title}} ({{$task->done ? 'انجام شده ' : 'انجام نشده '}}) </h1>
        </div>
    <h2> یادداشت ها</h2>

        @if(session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
        @endif


                @forelse($task->notes as $index=>$notes)

                    <div class="card-mb-4">
                        <div class="card-body">
                            <p class="card-text">{{$notes->text}}</p>
                        </div>

                        <div class="card-footer">
                            {!!  Form::open(['route' => ['tasks.notes.destroy',$task->id,$notes->id]  , 'method' => 'delete'])!!}
                            {!!  Form::submit('خذف')!!}
                            {!!  Form::close()!!}
                        </div>
                    </div>
                    @empty
                    <p>'هنوز یادداشتی اضافه نکرده ایید !'</p>
                @endforelse

            <h3>افزودن یادداشت </h3>

        {!! Form::open(['route' => ['tasks.notes.store',$task->id]]) !!}
        {!! Form::textarea('text',null ,['class'=>'form-control'])  !!}
        {!! Form::submit('افزودن',['class'=>'btn btn-primary btn-block mt-4'])  !!}
        {!! Form::close() !!}

@endsection
