<div>
    @if(isset($item['children']) && count($item['children']) > 0)
        @if(auth()->user()->hasRole('SuperAdmin') || (!empty($item['permissions']) && auth()->user()->hasAnyPermission($item['permissions'])))
        <li>
            <a href="#" class="par_menu">
                @if (isset($item['data_feather']))
                    <i class="link-icon" data-feather="{{$item['data_feather']}}"></i>
                @else
                    <i class="link-icon" data-feather="box"></i>
                @endif
                {{__( $item['title'])}}
                <i class="fa fa-caret-down"></i>
            </a>
            <ul class="menu_li_parent" style="padding-left:  {{8*$level}}px">
                @foreach($item['children'] as $childItem)
                    <x-sidebar.item :level="$level+1" :item="$childItem"></x-sidebar.item>
                @endforeach
            </ul>
        </li>
        @endif
    @else
            <?php
            $rout = '';
            $rclass = '';
            if (isset($item['route'])) {
                $rout = route($item['route'], $item['params'] ?? '');
            }
            if (Request::url() == $rout) {
                $rclass = 'menu_active';
            }
            ?>

            <!-- Do not check permission if user is SuperAdmin -->

        @if(auth()->user()->hasRole('SuperAdmin') || empty($item['permission']) || auth()->user()->can($item['permission']) )

            <li class="{{$rclass}}"><a class="text-capitalize"
                                       href="{{   isset($item['route'])   ? route($item['route'], $item['params'] ?? '') : '#'}}">
                    @if (isset($item['data_feather']))
                        <i class="link-icon" data-feather="{{$item['data_feather']}}"></i>
                    @else
                        <i class="link-icon" data-feather="box"></i>
                    @endif

                    {{__($item['title'])}}</a></li>
        @endif
    @endif
</div>

