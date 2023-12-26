<div class="sidebar">
    <div class="sidebar-header">
        <a href="{{ route('dashboard') }}" class="sidebar-brand"><img src="{{ asset('assets/images/logo/scplogo.jpg')}}"
                                                                      style="max-width: 86%;"/></a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body" style="padding-top: 15px;">
        <nav id="menu" class="left">
            <ul>
                <li>
                    <a class="text-capitalize {{request()->is('admin/schools') ? 'active' : ''}}"
                       href="{{route('admin.get-schools')}}">
                        Schools
                    </a>
                </li>

                <li>
                    <a class="text-capitalize {{request()->is('admin/education-levels') ? 'active' : ''}}"
                       href="{{route('admin.education-levels.index')}}">
                        Education Levels
                    </a>
                </li>

                <li>
                    <a class="text-capitalize {{request()->is('admin/roles') ? 'active' : ''}}"
                       href="{{route('admin.roles.index')}}">
                        Roles
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</div>

