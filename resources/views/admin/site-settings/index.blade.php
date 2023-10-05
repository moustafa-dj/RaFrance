@extends('admin.dash.index')
@section('content')
<div class="container">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">List des paramétres</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
      <a class="btn btn-primary btn-sm mb-1" href="{{ route('admin.SiteSetting.create') }}">Ajouter paramétre</a>
        <div class="table-responsive">
          <table class="table table-bordered">
              <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Key</th>
                  <th>Valure</th>
                  <th style="width: 40px">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($siteSettings as $siteSetting)
                  <tr>
                      <td>{{ $siteSetting->id }}</td>
                      <td>{{ $siteSetting->key }}</td>
                      <td>{{ $siteSetting->value }}</td>
                      <td>
                          <div class="d-flex">
                              <a href="{{ route('admin.SiteSetting.edit', $siteSetting) }}" class="btn btn-success btn-sm mr-1"><i class="nav-icon fas fa-edit"></i></a>
                              <form action="{{ route('admin.SiteSetting.delete', $siteSetting) }}" method="POST">
                                  @csrf
                                  <button type="submit" class="btn btn-danger btn-sm"
                                      onclick="return confirm('Are you sure you want to delete this site setting?')">
                                      <i class="fa fa-trash" aria-hidden="true"></i>
                                  </button>
                              </form>
                          </div>
                      </td>
                  </tr>
                @endforeach
              </tbody>
          </table>
        </div>
        <div class="mt-2">
          {{ $siteSettings->links() }}
        </div> 
      </div>
    </div>
</div>
@endsection