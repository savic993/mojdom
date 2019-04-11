<table id="mainTable" class="table table-striped">
    <thead>
    <tr>
        <th>Slika</th>
        <th>Opis</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>
    @foreach($images as $img)
        <tr>
            <td><img src="{{ asset($img->src) }}" alt="{{ $img->alt }}" /></td>
            <td>{{ $img->alt }}</td>
            <td><a href="{{ asset('/admin/image/delete/'.$img->id) }}" class="btn btn-danger waves-effect btn-xs"><i class="material-icons">Izbrisi</i></a></td>
        </tr>
    @endforeach
    </tbody>
</table>