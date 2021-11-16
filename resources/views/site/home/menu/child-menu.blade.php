@if($categoriesParent->categoryChildrents->count())
    <ul role="menu" class="sub-menu">
        @foreach($categoriesParent->categoryChildrents as $categoryChild)
            <li><a href="shop.html">{{$categoryChild->name}}</a>
            </li>
        @endforeach

    </ul>
@endif
