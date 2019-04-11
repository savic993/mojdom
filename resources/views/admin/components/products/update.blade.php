<div class="row">
    <div class="container col-md-9 col-md-offset-9">
        <p class="lead">Izmena podateka za {{ $product[0]->title }}</p>
        <form action="{{ asset('admin/product/update/'.$product[0]->id) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <div class="form-line">
                    <input name="title" type="text" class="form-control" placeholder="Naslov" value="{{ $product[0]->title }}">
                </div>
            </div>
            <div class="form-group">
                <div class="form-line">
                    <textarea class="form-control" name="description">{{ $product[0]->description }}</textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="form-line">
                    <input name="price" type="text" class="form-control" placeholder="Cena RSD" value="{{ $product[0]->price }}">
                </div>
            </div>
            <div class="form-group">
                <div class="form-line">
                    <input name="state" type="text" class="form-control" placeholder="Stanje" value="{{ $product[0]->state }}">
                </div>
            </div>
            <div class="form-group">
                <div class="form-line">
                    <input name="file" type="file" class="form-control"/>
                </div>
                @isset($product)
                  <img src="{{ asset($product[0]->src) }}" width="150"/>
                @endisset
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
                <input type="submit" class="btn btn-primary waves-amber" value="Add">
                <a href="{{ route('admin') }}" class="btn btn-warning waves-effect">Cancel</a>
            </div>
        </form>
    </div>
</div>