<x-admin-master>
    @section('content')
        @if (Session::has('role-del'))
            <div class="alert-danger alert autohide">
                {{session('role-del')}}
            </div>
        @endif
        @if (Session::has('role-add'))
                <div class="alert-success alert autohide">
                    {{session('role-add')}}
                </div>
        @endif
        <div class="row">


            <div class="col-sm-3">
                <form action="{{route('roles.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name">
                            @error('name')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        <button class="btn btn-block btn-success mt-3" type="submit">Add Role</button>
                    </div>
                </form>
            </div>
            <div class="col-sm-9">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Roles</h6>
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

                                @foreach($roles as $role)
                                    <tr>
                                        <td>{{$role->id}}</td>
                                        <td><a href="{{route('roles.edit',$role->id)}}">{{$role->name}}</a></td>
                                        <td>{{$role->slug}}</td>
                                        <td class="text-center">
                                            <form method="POST" action="{{route('roles.destroy',$role->id)}}">
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
