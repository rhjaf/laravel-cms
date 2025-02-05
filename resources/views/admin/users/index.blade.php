<x-admin-master>
        @section('content')

            <h1>
                Users
            </h1>
    @if (session('user-del'))
        <div class="alert alert-success">{{session('user-del')}}</div>
        @endif
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Users</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="usersTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Username</th>
                            <th>Avatar</th>
                            <th>name</th>
                            <th>Registered At</th>
                            <th>Updated At</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Username</th>
                            <th>Avatar</th>
                            <th>name</th>
                            <th>Registered At</th>
                            <th>Updated At</th>
                            <th>Delete</th>

                        </tr>
                        </tfoot>
                        <tbody>

                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->username}}</td>
                                <td>
                                    <img height="50px" src="{{$user->avatar}}" >
                                </td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->created_at->diffForHumans()}}</td>
                                <td>{{$user->updated_at->diffForHumans()}}</td>
                                <td>
                                    <form method="post" action="{{route('users.destroy',$user->id)}}">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-danger">DELETE</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    @endsection
        @section('scripts')
        <!-- Page level plugins -->
            <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
            <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

            <script src={{asset('js/demo/datatables-demo.js')}}></script>
        @endsection
</x-admin-master>
