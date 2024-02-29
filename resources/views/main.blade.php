@extends('layouts.admin_layout')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Main</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <form action="{{route('main.update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT')}}
                <div class="row">
                    <div class="from-group col-md-3 mt-3" >
                        <h3>Icon Image</h3>
                        <img style="height: 30vh" src="{{(@$main->icon_img)?url($main->icon_img):asset("assets/images/logo.png")}}" class="img-thumbnail">
                        <input class="mt-3" type="file" name="icon_img">
                    </div>
                    <div class="from-group col-md-3 mt-3" >
                        <h3>Background Image 1</h3>
                        <img style="height: 30vh" src="{{(@$main->bc_img)?url($main->bc_img):asset("assets/images/one.jpg")}}" class="img-thumbnail">
                        <input class="mt-3" type="file" name="bc_img">
                    </div>
                    <div class="from-group col-md-3 mt-3" >
                        <h3>Background Image 2</h3>
                        <img style="height: 30vh" src="{{(@$main->bc_imga)?url($main->bc_imga):asset("assets/images/two.jpg")}}" class="img-thumbnail">
                        <input class="mt-3" type="file" name="bc_imga">
                    </div>
                    <div class="from-group col-md-3 mt-3" >
                        <h3>Background Image 3</h3>
                        <img style="height: 30vh" src="{{(@$main->bc_imgb)?url($main->bc_imgb):asset("assets/images/three.jpg")}}" class="img-thumbnail">
                        <input class="mt-3" type="file" name="bc_imgb">
                    </div>
                </div>
                <div class="row">
                    <div class="from-group col-md-3 mt-3" >
                        <div class="mb-3">
                            <label for="ic_title"><h4>IC_title</h4></label>
                            <input type="text" class="form-control" name="ic_title" value="{{(@$main->ic_title)?$main->ic_title:"THE NEW ERA"}}">
                        </div>
                        <div class="mb-3">
                            <label for="ic_sub_title"><h4>IC_sub_title</h4></label>
                            <input type="text" class="form-control" name="ic_sub_title" value="{{(@$main->ic_sub_title)?$main->ic_sub_title:"THE NEW ERA"}}">
                        </div>
                        <div class="mb-3">
                            <label for="title"><h4>Title</h4></label>
                            <input type="text" class="form-control" name="title" value="{{(@$main->title)?$main->title:"THE NEW ERA"}}">
                        </div>
                        <div class="mb-5">
                            <label for="sub_title"><h4>Sub-Title</h4></label>
                            <input type="text"  class="form-control" name="sub_title" value="{{(@$main->sub_title)?$main->sub_title:"THE NEW ERA BEGINS"}}">
                        </div>
                    </div>
                </div>
                <input type="submit" name="Submit" class="btn btn-primary mt-5">
        </form>
        </div>
    </main>
@endsection
