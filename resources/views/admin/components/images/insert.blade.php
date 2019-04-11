<div class="row">
    <div class="container col-md-9 col-md-offset-9">
        <p class="lead">Dodaj sliku</p>
        <form action="{{ asset('admin/images/insert') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <div class="form-line">
                    <input name="alt" type="text" class="form-control" placeholder="Opis">
                </div>
            </div>
            <div class="form-group">
                <div class="form-line">
                    <select name="gallery" class="form-control">
                        <option value="0">Izaberi</option>
                        @foreach($galleries as $g)
                            <option value="{{ $g->id }}">{{ $g->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="form-line">
                    <input name="file" type="file" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary waves-amber" value="Add">
                <a href="{{ route('admin') }}" class="btn btn-warning waves-effect">Cancel</a>
            </div>
        </form>
    </div>
</div>