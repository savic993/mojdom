<div class="row">
<div class="container col-md-9 col-md-offset-9">
<table id="mainTable" class="table table-striped">
    <thead>
    <tr>
        <th>Naziv</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>
    @foreach($galleries as $g)
        <tr>
            <td>{{ $g->name }}</td>
            <td><a href="{{ asset('/admin/gallery/edit/'.$g->id) }}" class="btn btn-info waves-effect btn-xs"><i class="material-icons">Izmeni</i></a></td>
            <td><a href="{{ asset('/admin/gallery/delete/'.$g->id) }}" class="btn btn-danger waves-effect btn-xs"><i class="material-icons">Izbrisi</i></a></td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>
</div>