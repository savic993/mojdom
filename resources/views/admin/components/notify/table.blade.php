<div class="container">
<!-- <div class="container col-md-9 col-md-offset-9"> -->
    <table id="mainTable" class="table table-striped">
    <thead>
    <tr>
        <th>Status</th>
        <th>Tekst</th>
        <th>Vreme</th>
        <th>Procitaj</th>
    </tr>
    </thead>
    <tbody>
    @foreach($notification as $n)
        <tr>
            <td>{{ ($n->status == 1) ? 'Nova' : 'Procitano' }}</td>
            <td>Korisnik {{ $n->fullName }} je narucio {{ $n->title }}</td>
            <td>{{ date('d.m.Y. H:i', $n->time) }}</td>
            <td><a href="{{ asset('/admin/notify/update/'.$n->id) }}" class="btn btn-warning waves-effect btn-xs"><i class="material-icons">Ukloni</i></a></td>
        </tr>
    @endforeach
    </tbody>
</table>
<!-- </div> -->
</div>