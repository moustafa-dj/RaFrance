@extends('admin.dash.index')
@section('content')
<div class="container">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Ajouter Pramétre</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <form action="{{ route('admin.SiteSetting.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="key">Key</label>
                            <input type="text" name="key" id="key" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="value">Value</label>
                            <textarea type="text" name="value" id="value" class="form-control" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </div>
                </form>
            </div>
</div>
@endsection