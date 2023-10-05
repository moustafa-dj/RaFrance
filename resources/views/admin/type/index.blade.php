@extends('admin.dash.index')
@section('content')
<style>
  .simg{
    height: 50px;
    width: 50px;
  }
</style>
<div class="container">
            <div class="card mb-2">
              <div class="card-header">
                <h3 class="card-title">List des Types</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <a class="btn btn-primary btn-sm mb-2" href="{{ route('admin.type.create') }}">Ajouter Type</a>
                <div class="table-responsive">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th style="width: 10px">#</th>
                        <th>nome</th>
                        <th>description</th>
                        <th style="width: 40px">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($types as $type)
                          <tr>
                              <td>{{$type->id}}</td>
                              <td>{{$type->title}}</td>
                              <td>{{$type->desc}}</td>
                              <td>
                                  <div class="d-flex">
                                      <a href="{{ route('admin.type.edit', $type->id) }}" class="btn btn-sm btn-success mr-1"><i class="nav-icon fas fa-edit"></i></a>
                                      <form action="{{ route('admin.type.delete',['id' => $type->id]) }}" method="POST">
                                          @csrf
                                          <button class="btn btn-sm btn-danger" type="submit">
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
              </div>
              <!-- /.paginate links -->

            </div>
          </div>
@endsection