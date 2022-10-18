{{-- 折り畳み式　カテゴリー・メニュー --}}

<div class="sidebar-widget wow fadeInUp" style="border-radius: 8px">
    <h3 class="section-title">カテゴリー</h3>

    <div class="sidebar-widget-body">
    <div class="accordion">

        @foreach($categories as $category)
        <div class="accordion-group">

            <div class="accordion-heading">
                <a href="#collapse{{ $category->id }}" data-toggle="collapse" class="accordion-toggle collapsed"> @if(session()->get('language') == 'cn') {{ $category->category_name_cn }} @else {{ $category->category_name_jp }} @endif </a>
            </div>

            <div class="accordion-body collapse" id="collapse{{ $category->id }}" style="height: 0">
                <div class="accordion-inner">

                    @php
                        $subcategories = App\Models\SubCategory::where('category_id',$category->id)->orderBy('subcategory_name_jp','ASC')->get();
                    @endphp

                    @foreach($subcategories as $subcategory)
                    <ul>
                        <li>
                            <a href="{{ url('subcategory/product/'.$subcategory->id.'/'.$subcategory->subcategory_slug_jp ) }}"> @if(session()->get('language') == 'cn') {{ $subcategory->subcategory_name_cn }} @else {{ $subcategory->subcategory_name_jp }} @endif</a>


                            @php
                            $subsubcategories = App\Models\SubSubCategory::where('subcategory_id',$subcategory->id)->orderBy('id','ASC')->get();
                            @endphp

                            {{-- サブサブカテゴリー --}}
                            @foreach($subsubcategories as $subsubcategory)
                                <ul>

                                <li>
                                    <a href="{{ url('subsubcategory/product/'.$subsubcategory->id.'/'.$subsubcategory->subsubcategory_slug_jp ) }}">
                                    @if(session()->get('language') == 'cn') {{ $subsubcategory->subsubcategory_name_cn }} @else {{ $subsubcategory->subsubcategory_name_jp }} @endif</a>
                                </li>

                                </ul>
                            @endforeach


                        </li>
                    </ul>
                    @endforeach

                </div>
            </div>

        </div>
        @endforeach

    </div>
    </div>

</div>