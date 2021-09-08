<div class="p-3 mb-3 rounded-xl shadow bg-gray-700 hover:bg-gray-800">
    <ul class="flex items-center py-1 text-white text-sm lg:text-base">
        @foreach($breadcrumbs as $item)
            <li class="flex items-center">
                <a href="{{$item['link']}}" class="{{!$loop->last ? 'breadcrumb-item text-sm' : 'breadcrumb-item-active text-sm'}}">
                    {{$item['title']}}
                </a>
            </li>
        @endforeach
    </ul>
</div>
