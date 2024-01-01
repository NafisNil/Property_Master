<div class="sidebar">
    <div class="sidebar-header">
        <a href="{{ route('dashboard') }}" class="sidebar-brand"><img src="{{ asset('assets/images/logo/logo_sop.png')}}" style="max-width: 86%;"/></a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    @php
    $prefix = Request::route()->getPrefix();
    $route = Request::route()->getName();
    @endphp
    <div class="sidebar-body">
        <nav id="menu" class="left">
            <ul>
                <li>
                    <a href="{{ route('company.index') }}" class=" {{$route == 'company.index'?'active':''}}" >
                        <i class="link-icon" data-feather="layers"></i> 
                        Company
                    </a>
               </li>
                <li>
                    <a href="{{ route('newfile.index') }}" class=" {{$route == 'newfile.index'?'active':''}}" >
                        <i class="link-icon" data-feather="layers"></i> 
                        Newfile
                    </a>
               </li>
               <li>
                <a href="{{ route('welcome.index') }}" class=" {{$route == 'welcome.index'?'active':''}}" >
                    <i class="link-icon" data-feather="layers"></i> 
                    Welcome
                </a>
           </li>
                @foreach($items as $item)
                    <div>
                        <x-sidebar.item :item="$item"></x-sidebar.item>
                      
                    </div>
                @endforeach
            </ul>
        </nav>
    </div>
</div>
