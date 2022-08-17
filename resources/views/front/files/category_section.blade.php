  <div class="static-cates">
        <ul>
            @foreach (categories() as $category)
            @break($loop->index>4)
                <li>
                    <a href="{{ route('product.category_product',$category->id) }}"><img src="{{ asset('assets/backend/image/category/medium/'.$category->image)}}" alt="image"></a>
                </li>
             @endforeach
        </ul>
</div>