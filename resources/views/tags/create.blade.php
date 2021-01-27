@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="mb-4 d-flex align-items-center justify-content-between">
            <h1>اضافه کردن تگ جدید  </h1>
            <a href="{{route('tags.index')}}" class="btn btn-primary">بازگشت</a>
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

        <form action="{{route('tags.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">نام :</label>
                <input type="text" class="form-control" id="name"  placeholder="Enter name" name="name">
                @error('name')
                <p class="m-0">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="color">رنگ :</label>
                <input type="color" class="form-control" id="color"  name="color">

                @error('title')
                <p class="m-0">{{$message}}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">ارسال کار</button>
        </form>
    </div>
@endsection
