<div class="row">
<div class="container col-md-9 col-md-offset-9">
    <table id="mainTable" class="table table-striped">
    <thead>
    <tr>
        <th>Status</th>
        <th>Ime i prezime</th>
        <th>Email</th>
        <th>Vreme</th>
        <th>Procitaj</th>
        <th>Izbrisi</th>
    </tr>
    </thead>
    <tbody>
    @foreach($messages as $m)
        <tr>
            <td>{{ ($m->status == 1) ? 'Nova' : 'Procitano' }}</td>
            <td>{{ $m->fullName }}</td>
            <td>{{ $m->email }}</td>
            <td>{{ date('d.m.Y. H:i',$m->time) }}</td>
            <td><a href="{{ asset('/admin/inbox/'.$m->id) }}" class="btn btn-warning waves-effect btn-xs"><i class="material-icons">Procitaj</i></a></td>
            <td><a href="{{ asset('/admin/inbox/delete/'.$m->id) }}" class="btn btn-danger waves-effect btn-xs"><i class="material-icons">Izbrisi</i></a></td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>
</div>