@extends('admin.dash.index')
@section('content')
<div class="container">
    <div class="card card-success">
      <div class="card-header">
        <h3 class="card-title">Modifier Type</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form method="POST" action="{{ route('admin.type.update',['id' => $type->id])}}" enctype="multipart/form-data">
        @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Titre</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="titre" name="title" value="{{$type->title}}">
            </div>
            
            <div class="form-group">
              <label for="exampleInputPassword1">Description</label>
              <textarea class="form-control" rows="5" id="comment" name="desc">{{$type->desc}}</textarea>
            </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-success">Sauvgarder</button>
          </div>
      </form>
    </div>
</div>
@endsection