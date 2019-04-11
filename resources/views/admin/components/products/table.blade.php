<div class="row">
<div class="container col-md-9 col-md-offset-9">
    <table id="mainTable" class="table table-striped">
    <thead>
    <tr>
        <th>Naziv</th>
        <th>Cena</th>
        <th>Broj kupovina</th>
        <th>Stanje</th>
        <th>Slika</th>
        <th>Vreme postavljanja</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>
    @foreach($products as $p)
        <tr>
            <td>{{ $p->title }}</td>
            <td>{{ $p->price }}</td>
            <td>{{ $p->number_buy }}</td>
            <td>{{ $p->state }}</td>
            <td><img src="{{asset('/').$p->src}}" alt="{{ $p->alt }}" /></td>
            <td>{{ date('d.m.Y.',$p->posted_at) }}</td>
            <td><a href="{{ asset('/admin/product/edit/'.$p->id) }}" class="btn btn-info waves-effect btn-xs"><i class="material-icons">Izmeni</i></a></td>
            <td><a href="{{ asset('/admin/product/delete/'.$p->id) }}" class="btn btn-danger waves-effect btn-xs"><i class="material-icons">Izbrisi</i></a></td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>
</div>