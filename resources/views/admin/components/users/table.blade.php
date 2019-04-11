<div class="row">
<div class="container col-md-9 col-md-offset-9">
    <table id="mainTable" class="table table-striped">
    <thead>
    <tr>
        <th>Ime i prezime</th>
        <th>Username</th>
        <th>Email</th>
        <th>Uloga</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $u)
        <tr>
            <td>{{ $u->fullName }}</td>
            <td>{{ $u->username }}</td>
            <td>{{ $u->email }}</td>
            <td>{{ $u->role }}</td>
            <td><a href="{{ asset('/admin/users/edit/'.$u->id) }}" class="btn btn-info waves-effect btn-xs"><i class="material-icons">Izmeni</i></a></td>
            <td><a href="{{ asset('/admin/users/delete/'.$u->id) }}" class="btn btn-danger waves-effect btn-xs"><i class="material-icons">Izbrisi</i></a></td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>
</div>