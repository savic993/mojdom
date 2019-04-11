<div class="brands">
    <div class="container">
        <h3>Nase kategorije</h3>
        <div class="brands-agile">
            @foreach($categories as $category)
                <div class="col-md-6 w3layouts-brand">
                    <div class="brands-w3l margin">
                        <p><a href="{{ asset('/category/'.$category->id) }}">{{ $category->name }}</a></p>
                    </div>
                </div>
            @endforeach
            <div class="clearfix"></div>
        </div>
    </div>
</div>