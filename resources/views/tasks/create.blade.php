@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="mb-4 d-flex align-items-center justify-content-between">
            <h1>اضافه کردن کار  </h1>
            <a href="{{route('tasks.index')}}" class="btn btn-primary">بازگشت</a>
        </div>

        @if($errors ->any())
            <div class="alert alert-danger">
                <ui>
                    @foreach($errors->all() as $error )
                        <li>
                            {{$error}}
                        </li>
                    @endforeach
                </ui>
            </div>
        @endif

        <form action="{{route('tasks.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="title">عنوان :</label>
                <input type="text" class="form-control" id="title" aria-describedby="emailHelp" placeholder="Enter title" name="title">
                @error('title')
                    <p class="m-0">{{$message}}</p>
                @enderror
            </div>
            <div class="form-check">
                <input type="hidden" name="done" value="0">
                <input type="checkbox" class="form-check-input" id="done"  name="done" value="1">
                <label class="form-check-label" for="exampleCheck1">آیا انجام شده است ؟ </label>
            </div>
            <button type="submit" class="btn btn-primary">ارسال کار</button>
        </form>
    </div>
@endsection
