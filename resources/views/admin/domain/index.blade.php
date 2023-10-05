@extends('admin.dash.index')
@section('content')
<style>
  .simg{
    height: 50px;
    width: 50px;
  }
</style>
<div class="container">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List des domains</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <a class="btn btn-primary btn-sm mb-1" href="{{ route('admin.domain.create') }}">Ajouter Domain</a>
              <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Titre</th>
                      <th>Link</th>
                      <th>Image</th>
                      <th style="width: 40px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($domains as $domain)
                        <tr>
                            <td>{{$domain->id}}</td>
                            <td>{{$domain->title}}</td>
                            <td>{{$domain->link}}</td>
                            <td>
                                <img src="{{asset('uploads/domains/'.$domain->image)}}" class="simg">
                            </td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('admin.domain.edit', $domain->id) }}" class="btn btn-sm btn-success mr-1"><i class="nav-icon fas fa-edit"></i></a>
                                    <form action="{{ route('admin.domain.delete',['id' => $domain->id]) }}" method="POST">
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

                <div class="mt-2">
                  {{ $domains->links() }}
                </div> 
              </div>  
            </div>
</div>
@endsection