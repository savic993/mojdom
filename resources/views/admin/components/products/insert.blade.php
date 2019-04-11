<div class="row">
    <div class="container col-md-9 col-md-offset-9">
        <p class="lead">Dodaj novi proizvod</p>
        <form action="{{ asset('admin/product/insert') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <div class="form-line">
                    <input name="title" type="text" class="form-control" placeholder="Naslov">
                </div>
            </div>
            <div class="form-group">
                <div class="form-line">
                    <textarea class="form-control" name="description"></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="form-line">
                    <input name="price" type="text" class="form-control" placeholder="Cena RSD">
                </div>
            </div>
            <div class="form-group">
                <div class="form-line">
                    <input name="state" type="text" class="form-control" placeholder="Stanje">
                </div>
            </div>
            <div class="form-group">
                <div class="form-line">
                    <select name="category" class="form-control">
                        <option value="0">Izaberi</option>
                        @foreach($categories as $c)
                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="form-line">
                    <select name="action" class="form-control">
                        <option value="0">Izaberi</option>
                        @foreach($actions as $a)
                            <option value="{{ $a->id }}">{{ $a->discount }}</option>
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
                <div class="form-line">
                    <input name="alt" type="text" class="form-control" placeholder="Opis">
                </div>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary waves-amber" value="Add">
                <a href="{{ route('admin') }}" class="btn btn-warning waves-effect">Cancel</a>
            </div>
        </form>
    </div>
</div>