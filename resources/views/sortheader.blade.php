<th class="{{ $class or "" }}">
    @if($sort != $element)
        <a href="{{ URL::route($routeName, ['sort' => $element]) }}">{{ $label }}</a>
    @else
        @if($order == 'ASC')
            <a href="{{ URL::route($routeName, ['sort' => $element, 'order' => 'desc']) }}">{{ $label }} <i class="fa fa-chevron-down"></i></a>
        @else
            <a href="{{ URL::route($routeName, ['sort' => $element, 'order' => 'asc']) }}">{{ $label }} <i class="fa fa-chevron-up"></i></a>
        @endif
    @endif
</th>