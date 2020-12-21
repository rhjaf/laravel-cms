<x-admin-master>
    @section('content')
        <h1>Edit Permission : {{$permission->name}}</h1>
        @if (Session::has('permission-update'))
            <div class="alert-primary alert autohide">
                {{session('permission-update')}}
            </div>
        @endif
        <div class="row">
            <div class="col-sm-5">
                <form method="post" action="{{route('permissions.update',$permission->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" value="{{$permission->name}}" name="name">
                        <button class="btn btn-outline-success mt-3">update</button>
                    </div>
                </form>
            </div>
        </div>
    @endsection
</x-admin-master>
