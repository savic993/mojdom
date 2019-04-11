<div class="row">
    <div class="container col-md-9 col-md-offset-9">
        <p class="lead">Izmena uloge korisnika {{ $user->username }}</p>
        <form action="{{ asset('/admin/users/update/'.$user->id) }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <div class="form-line">
                    <select id="role" name="role">
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary waves-amber" value="Edit">
                <a href="{{ route('admin') }}" class="btn btn-warning waves-effect">Cancel</a>
            </div>
        </form>
    </div>
</div>