@extends('admin.dash.index')
@section('content')
<div class="container">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Ajouter Service</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{ route('admin.service.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Titre</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="titre" name="title">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Grand Titre</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="titre" name="gtitle">
                  </div>                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Sous Titre</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="titre" name="stitle">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <textarea class="form-control" rows="5" id="comment" name="description"></textarea>
                 </div>
                 <div class="form-group">
                    <label for="exampleInputPassword1">Spus Description</label>
                    <textarea class="form-control" rows="5" id="comment" name="bdescription"></textarea>                  
                 </div>
                 <div class="form-group">
                    <label>Domain</label>
                    <select class="form-control" name="domain_id">
                        @foreach($domains as $domain)
                            <option value="{{$domain->id}}">{{$domain->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="img">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="img" name="image">
                        <label class="custom-file-label" for="img">Choose file</label>
                      </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Ajouter</button>
                </div>
              </form>
            </div>
</div>
@endsection