<x-admin-master>
    @section('content')
        <h1>User Profile for : {{$user->name}}</h1>

    <div class="row">
        <div class="col-sm-6">
            <form action="{{route('user.profile.update',$user->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <img width="80px" class="img-profile rounded-circle " src="{{$user->avatar}}">
                </div>
                <div class="form-group">
                    <input type="file" name="avatar">
                </div>

                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="title" id="username" class="form-control {{$errors->has('username')?'is-invalid':''}}" value="{{$user->username}}">
{{-- We could also write like this <input type="text" name="title" id="username" class="form-control @error('username') is-invalid @enderror" value="{{$user->username}}">--}}
                    @error('username')
                                    {{--  if we got the error that name 'username' --}}
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="title" id="name" class="form-control {{$errors->has('name')?'is-invalid':''}}" value="{{$user->name}}">
                    @error('name')
                   {{-- <div class="alert alert-danger">
                        {{$message}}
                    </div>--}}
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="title" id="email" class="form-control {{$errors->has('email')?'is-invalid':''}}" value="{{$user->email}}">
                    @error('email')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control {{$errors->has('password')?'is-invalid':''}}" >
                    @error('password')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror

                </div>
                <div class="form-group">
                    <label for="password-confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password-confirmation" class="form-control {{$errors->has('password_confirmation')?'is-invalid':''}}" >
                    @error('password_confirmation')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>

            </form>
        </div>
    </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Roles</h6>
            </div>
            <div class="card-body">
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-bordered" id="usersTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Options</th>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Attach</th>
                    <th>Detach</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Options</th>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Attach</th>
                    <th>Detach</th>
                </tr>
                </tfoot>
                <tbody>
                    @foreach($roles as $role)
                        <tr>
                            <td><input type="checkbox"
                                @foreach ( $user->roles as $user_role)
                                    @if ($user_role->slug==$role->slug)
                                        checked
                                    @endif
                                @endforeach
                                ></td>
                            <td>{{$role->id}}</td>
                            <td>{{$role->name}}</td>
                            <td>{{$role->slug}}</td>
                            <td>
                                <form action="{{route('users.role.attach',$user)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="role" value="{{$role->id}}">
                                    <button class="btn btn-primary"
                                            @if ($user->roles->contains($role))
                                                disabled
                                            @endif
                                    >Attach</button>

                                </form>
                            </td>
                            <td>
                                <form action="{{route('users.role.detach',$user)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="role" value="{{$role->id}}">
                                    <button class="btn btn-danger"
                                            @if (!$user->roles->contains($role))
                                            disabled
                                            @endif
                                    >Detach</button>

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
    @endsection
</x-admin-master>
