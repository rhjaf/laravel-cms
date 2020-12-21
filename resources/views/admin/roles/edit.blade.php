<x-admin-master>
    @section('content')

        <h1>Edit Role {{$role->name}}</h1>
        @if (Session::has('role-update'))
            <div class="alert-primary alert autohide">
                {{session('role-update')}}
            </div>
        @endif
        <div class="row">
            <div class="col-sm-5">
                <form method="post" action="{{route('roles.update',$role->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" value="{{$role->name}}" name="name">
                        <button class="btn btn-outline-success mt-3">update</button>
                    </div>
                </form>
            </div>
            @if($permissions->isNotEmpty())
                <div class="col-sm-7">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Permissions</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Options</th>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($permissions as $perm)
                                        <tr>
                                            <td>
                                                <input type="checkbox"
                                                       @foreach ( $role->permissions as $role_perm)
                                                       @if ($role_perm->slug==$perm->slug)
                                                       checked
                                                    @endif
                                                    @endforeach
                                                >
                                            </td>
                                            <td>{{$perm->id}}</td>
                                            <td>{{$perm->name}}</td>
                                            <td>{{$perm->slug}}</td>
                                            @if(!$role->permissions->contains($perm))
                                                <td>
                                                    <form action="{{route('role.permission.attach',$role)}}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="permission" value="{{$perm->id}}">
                                                        <button class="btn btn-facebook">Attach</button>
                                                    </form>

                                                </td>
                                            @endif
                                            @if($role->permissions->contains($perm))
                                                <td>
                                                    <form action="{{route('role.permission.detach',$role)}}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="permission" value="{{$perm->id}}">
                                                        <button class="btn btn-warning">Detach</button>
                                                    </form>

                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    @endsection
</x-admin-master>
