<div class="sidebar">
    <div class="sidebar-header">
        <a href="{{ route('dashboard') }}" class="sidebar-brand"><img src="{{ asset('assets/images/logo/logo_sop.png')}}" style="max-width: 86%;"/></a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <nav id="menu" class="left">
            <ul>
                @foreach($items as $item)
                    <div>
                        <x-sidebar.item :item="$item"></x-sidebar.item>
                    </div>
                @endforeach
            </ul>
        </nav>
    </div>
</div>
