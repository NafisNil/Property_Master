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
           <li>
            <a href="{{ route('whatnew.index') }}" class=" {{$route == 'whatnew.index'?'active':''}}" >
                <i class="link-icon" data-feather="layers"></i> 
                What is new
            </a>

            <a href="{{ route('announcement.index') }}" class=" {{$route == 'announcement.index'?'active':''}}" >
                <i class="link-icon" data-feather="layers"></i> 
                Announcement
            </a>


            <a href="{{ route('complaintype.index') }}" class=" {{$route == 'complaintype.index'?'active':''}}" >
                <i class="link-icon" data-feather="layers"></i> 
                Complain Type
            </a>
       </li>
       <li>
        <a href="{{ route('complain.index') }}" class=" {{$route == 'complain.index'?'active':''}}" >
            <i class="link-icon" data-feather="layers"></i> 
            Complain 
        </a>
       </li>

       <li>
        <a href="{{ route('notice.index') }}" class=" {{$route == 'notice.index'?'active':''}}" >
            <i class="link-icon" data-feather="layers"></i> 
            Notice 
        </a>
       </li>

       <li>
        <a href="{{ route('task.index') }}" class=" {{$route == 'task.index'?'active':''}}" >
            <i class="link-icon" data-feather="layers"></i> 
            Task 
        </a>
       </li>
       <li>
        <a href="{{ route('remainder.index') }}" class=" {{$route == 'remainder.index'?'active':''}}" >
            <i class="link-icon" data-feather="layers"></i> 
            Remainder 
        </a>
       </li>
     {{--    @foreach($items as $item)
                    <div>
                        <x-sidebar.item :item="$item"></x-sidebar.item>
                      
                    </div>
                @endforeach --}}
            </ul>
        </nav>
    </div>
</div>
