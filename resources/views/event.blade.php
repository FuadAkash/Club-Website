@extends('layouts.admin_layout')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Event</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <form action="{{route('event.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT')}}
                <div class="row">
                    <div class="from-group col-md-3 mt-3" >
                        <h3>Image</h3>
                        <img style="height: 30vh" src="{{(@$event->image)?url($event->image):asset("assets/images/logo.png")}}" class="img-thumbnail">
                        <input class="mt-3" type="file" name="icon_img">
                    </div>
                    <div class="from-group col-md-3 mt-3" >
                        <div class="mb-3">
                            <label for="title"><h4>Title</h4></label>
                            <input type="text" class="form-control" name="title" value="{{(@$event->title)?$event->title:"THE NEW ERA"}}">
                        </div>
                    </div>
                    <div class="from-group col-md-6 mt-3" >
                        <h3>Description</h3>
                        <textarea class="from-control" name="description" cols="30" rows="2"></textarea>
                    </div>
                    <div class="from-group col-md-4 mt-3" >
                        <div class="mb-3">
                            <label for="date"><h4>Date</h4></label>
                            <input type="text"  class="from-control" id="date" name="date" value="">
                        </div>
                        <div class="mb-5">
                            <label for="time"><h4>Time</h4></label>
                            <input type="text"  class="from-control" id="time" name="time" value="">
                        </div>
                        <div class="mb-5">
                            <label for="deadline"><h4>Deadline</h4></label>
                            <input type="text"  class="from-control" id="deadline" name="deadline" value="">
                        </div>
                    </div>
                </div>
                <input type="submit" name="Submit" class="btn btn-primary mt-5">
            </form>
        </div>
    </main>
@endsection
