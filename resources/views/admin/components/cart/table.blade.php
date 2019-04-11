<div class="row">
<div class="container col-md-9 col-md-offset-9">
<div id="table">
    <table id="mainTable" class="table table-striped">
        <thead>
        <tr>
            <th>Ime i prezime</th>
            <th>Username</th>
            <th>Email</th>
            <th>Naziv proizvoda</th>
            <th>Vreme</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cart as $c)
            <tr>
                <td>{{ $c->fullName }}</td>
                <td>{{ $c->username }}</td>
                <td>{{ $c->email }}</td>
                <td>{{ $c->title }}</td>
                <td>{{ date('d.m.Y.',$c->time)  }}</td>
                <td><a href="{{ asset('/admin/cart/delete/'.$c->idCart) }}" class="btn btn-danger waves-effect btn-xs"><i class="material-icons">Izbrisi</i></a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</div>
</div>