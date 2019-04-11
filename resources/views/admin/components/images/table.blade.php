<div class="row">
<div class="container col-md-9 col-md-offset-9">
    <table id="mainTable" class="table table-striped">
    <thead>
    <tr>
        <th>Naziv</th>
        <th>Broj slika</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>
    @foreach($countImages as $c)
        <tr>
            <td>{{ $c->name }}</td>
            <td>{{ $c->count }}</td>
            <td><a href="{{ asset('/admin/images/delete/'.$c->id) }}" class="btn btn-danger waves-effect btn-xs"><i class="material-icons">Izbrisi</i></a></td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>
</div>