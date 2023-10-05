@extends('admin.dash.index')
@section('content')
<div class="container">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Ajouter Accessoire</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{ route('admin.accessory.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Titre</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="titre" name="title">
                  </div>
                  @error('title')
                        <div class="error">{{ $message }}</div>
                  @enderror               
                  <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <textarea class="form-control" rows="5" id="comment" name="description"></textarea>
                 </div>
                 @error('description')
                        <div class="error">{{ $message }}</div>
                  @enderror 
                 <div class="form-group">
                    <label>Type</label>
                    <select class="form-control" name="type_id">
                        @foreach($types as $type)
                            <option value="{{$type->id}}">{{$type->title}}</option>
                        @endforeach
                    </select>
                </div>
                @error('type_id')
                        <div class="error">{{ $message }}</div>
                @enderror 
                <div class="form-group">
                    <label for="img">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="img" name="image">
                        <label class="custom-file-label" for="img">Choose file</label>
                      </div>
                    </div>
                </div>
                @error('image')
                        <div class="error">{{ $message }}</div>
                @enderror 
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Ajouter</button>
                </div>
              </form>
            </div>
</div>
@endsection