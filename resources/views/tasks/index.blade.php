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

{{--            {{dd($task)}}--}}
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$task->title}}</h5>
                    <a href="{{route('tasks.show',$task)}}" class="btn btn-warning"> مشاهده یادداشت ها   </a> <br>

                    <span class="badge badge-primary">{{$task->done ? 'انجام شده ' : 'انجام نشده' }}</span>

                    <p class="card-text">{{verta($task->date)}}</p>

                </div>
                <div class="card-footer ">

                    <a href="{{route('tasks.edit',$task)}}" class="btn btn-success">ویرایش</a>

                    <a href="{{route('tasks.delete',$task)}}" class="btn btn-danger">حذف با get</a>


                    <form action="{{route('tasks.destroy',$task)}}" method="post" id="delete-form">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-warning">با متد deleteحذف</button>
                        <button class="btn btn-primary" onclick="return confirm ('آیا مطمین هستید ؟')">حذف با اخطار
                        </button>
{{--                        <button class="btn btn-info" type="submit">خذف با اختیار با JQuery</button>--}}

                    </form>

                </div>
            </div>
        @empty
            <div class="alert alert-info">شما هنوز هیچ کاری اضافه نکرده ایید</div>
        @endforelse
    </div>
@endsection


@section('js')

    {{--    <script >--}}
    {{--        $('#delete-form').submit(function (event){--}}
    {{--            event.preventDefault()--}}
    {{--           alert('delete with jq ? ')--}}
    {{--        });--}}

    {{--    </script>--}}



{{--    <script>--}}
{{--        $('#delete-form').submit(function (event) {--}}
{{--            event.preventDefault()--}}

{{--            let ok = confirm('are you sure ? ')--}}
{{--            if (ok) {--}}
{{--                $.ajaxSetup({--}}
{{--                    headers: {--}}
{{--                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
{{--                    }--}}
{{--                });--}}
{{--            }--}}
{{--            if (ok) {--}}
{{--                $.ajax({--}}
{{--                    'type ': "delete",--}}
{{--                    'url': '{{route('tasks.destroy',$task)}}'--}}
{{--                }).done(function () {--}}
{{--                    location.reload();--}}
{{--                })--}}

{{--            }--}}
{{--        });--}}

{{--    </script>--}}
@endsection
