<div class="col-md-4 products-left">
    <div class="categories">
        <h2>Kategorije</h2>
        <ul class="cate">
            @foreach($categories as $category)
                <li><a href="{{ asset('/category/'.$category->id) }}"><i class="fa fa-arrow-right" aria-hidden="true"></i>{{ $category->name }}</a></li>
            @endforeach
        </ul>
    </div>
</div>