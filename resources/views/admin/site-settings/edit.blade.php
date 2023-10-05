@extends('admin.dash.index')
@section('content')
<div class="container">
            <!-- general form elements -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Modifier Pramétre</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <form action="{{ route('admin.SiteSetting.update',$siteSetting) }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="key">Key</label>
                            <input type="text" name="key" id="key" class="form-control" required value="{{$siteSetting->key}}">
                        </div>
                        <div class="form-group">
                            <label for="value">Value</label>
                            <textarea type="text" name="value" id="value" class="form-control" rows="5">{{$siteSetting->value}}</textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">Sauvgarder</button>
                    </div>
                </form>
            </div>
</div>
@endsection