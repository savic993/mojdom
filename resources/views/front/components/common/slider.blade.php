<ul id="demo1">
    @foreach($sliders as $slider)
        <li>
            <img src="{{ asset('/'.$slider->src) }}" alt="{{ $slider->alt }}" />
            <!--Slider Description example-->
            <div class="slide-desc">
                <h3>{{ $slider->slider_description }}</h3>
            </div>
        </li>
    @endforeach
</ul>