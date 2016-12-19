<th class="{{ $class or "" }}">
    <?php
        $params = ['sort' => $element];
        //the code below is here so that we can sort in addition to having the band filter
        if(!empty($band)) {
            $params['band'] = $band;
        }
    ?>
    @if($sort != $element)
        <a href="{{ URL::route($routeName, $params) }}">{{ $label }}</a>
    @else
        @if($order == 'ASC')
            <a href="{{ URL::route($routeName, $params + ['order' => 'desc']) }}">{{ $label }} <i class="fa fa-chevron-down"></i></a>
        @else
            <a href="{{ URL::route($routeName, $params + ['order' => 'asc']) }}">{{ $label }} <i class="fa fa-chevron-up"></i></a>
        @endif
    @endif
</th>