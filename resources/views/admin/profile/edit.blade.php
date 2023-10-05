@extends('admin.dash.index')
@section('content')
<div class="container">
    <!-- general form elements -->
    <div class="card card-success">
        <div class="card-header">
        <h3 class="card-title">Modifier Le Profile</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('admin.profile.update',['id' => $admin->id])}}" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Nome</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="titre" name="name" value="{{$admin->name}}">
            </div>
            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control"  name="email" value="{{$admin->email}}">
            </div>
            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="exampleInputEmail1">password</label>
                <input type="password" class="form-control"  name="link" value="{{$admin->password}}">
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-success">Sauvegarder</button>
        </div>
        </form>
    </div>
</div>
@endsection