<x-admin-master>
    @section('content')
        @if (Session::has('permission-del'))
            <div class="alert-danger alert autohide">
                {{session('permission-del')}}
            </div>
        @endif
        @if (Session::has('permission-add'))
            <div class="alert-success alert autohide">
                {{session('permission-add')}}
            </div>
        @endif
        <div class="row">


            <div class="col-sm-3">
                <form action="{{route('permissions.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name">
                        @error('name')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                        <button class="btn btn-block btn-success mt-3" type="submit">Add Permission</button>
                    </div>
                </form>
            </div>
            <div class="col-sm-9">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Permission</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($permissions as $perm)
                                    <tr>
                                        <td>{{$perm->id}}</td>
                                        <td><a href="{{route('permissions.edit',$perm->id)}}">{{$perm->name}}</a></td>
                                        <td>{{$perm->slug}}</td>
                                        <td class="text-center">
                                            <form method="POST" action="{{route('permissions.destroy',$perm->id)}}">
                                                @method('DELETE')
                                                @csrf
                                                <button onmouseleave="this.style.color=''" onmouseover="this.style.color='red'" class="btn fas fa-trash-alt"></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</x-admin-master>
