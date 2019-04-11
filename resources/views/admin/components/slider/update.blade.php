<div class="row">
    <div class="container col-md-9 col-md-offset-9">
        <p class="lead">Izmena podataka za slajder</p>
        <form action="{{ asset('admin/slider/update/'.$slide[0]->id) }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <div class="form-line">
                    <input name="description" type="text" class="form-control" placeholder="Opis slajdera" value="{{ $slide[0]->slider_description }}">
                </div>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary waves-amber" value="Add">
                <a href="{{ route('admin') }}" class="btn btn-warning waves-effect">Cancel</a>
            </div>
        </form>
    </div>
</div>