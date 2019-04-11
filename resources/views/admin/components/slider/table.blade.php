<div class="row">
<div class="container col-md-9 col-md-offset-9">
    <table id="mainTable" class="table table-striped">
    <thead>
    <tr>
        <th>Slika</th>
        <th>Opis</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>
    @foreach($slider as $s)
        <tr>
            <td><img src="{{ asset($s->src) }}" alt="{{ $s->alt }}" /></td>
            <td>{{ $s->slider_description }}</td>
            <td><a href="{{ asset('/admin/slider/edit/'.$s->id) }}" class="btn btn-info waves-effect btn-xs"><i class="material-icons">Izmeni</i></a></td>
            <td><a href="{{ asset('/admin/slider/delete/'.$s->id) }}" class="btn btn-danger waves-effect btn-xs"><i class="material-icons">Izbrisi</i></a></td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>
</div>