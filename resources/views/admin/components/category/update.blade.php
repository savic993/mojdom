<div class="row">
    <div class="container col-md-9 col-md-offset-9">
        <p class="lead">Izmena kategorije</p>
        <form action="{{ asset('/admin/category/update/'.$category->id) }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <div class="form-line">
                    <input name="name" type="text" class="form-control" value="{{ $category->name }}" placeholder="Naziv">
                </div>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary waves-amber" value="Edit">
                <a href="{{ route('admin') }}" class="btn btn-warning waves-effect">Cancel</a>
            </div>
        </form>
    </div>
</div>