      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">

                        <a href="/"><img src="{{ $settings->site_logo ? '/setting/'.$settings->site_logo : '/logo.png'}}" alt="" width="30">&nbsp
                            {{$settings->site_title ? $settings->site_title : 'We Track'}}</a>
                        </div>
                        <div class="sidebar-brand sidebar-brand-sm">
                          <a href="/"><img src="/logo.png" alt="" width="30"></a>
                        </div>
                        <ul class="sidebar-menu">

                            <li class="menu-header">{{ __('customLanguage.Dashboard')}}</li>
                            <li class="nav-item">
                              <li class="{{url()->current() == url('/home') ? 'active' : ''}}"><a class="nav-link" href="/home"><i class="fas fa-home"></i><span>{{ __('customLanguage.Dashboard')}}</span></a></li>
              </li>

              <li class="menu-header">{{__('customLanguage.Administrator')}}</li>
                <li class="{{url()->current() == url('/user') ? 'active' : ''}}"><a class="nav-link" href="/user"><i class="fas fa-user"></i><span>User</span></a></li>
              <li class="nav-item dropdown {{url()->current() == url('/permission') || url()->current() == url('/role') || url()->current() == url('/role_permission') || url()->current() == url('/user_roles') ? 'active' : ''}}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-key"></i> <span>RBAC</span></a>
                <ul class="dropdown-menu">
                    <li class="{{url()->current() == url('/permission') ? 'active' : ''}}"><a class="nav-link" href="/permission">Permissions</a></li>
                    <li class="{{url()->current() == url('/role') ? 'active' : ''}}"><a class="nav-link" href="/role">Roles</a></li>
                  <li class="{{url()->current() == url('/role_permission') ? 'active' : ''}}"><a class="nav-link" href="/role_permission">Roles Permission</a></li>
                  <li class="{{url()->current() == url('/user_roles') ? 'active' : ''}}"><a class="nav-link" href="/user_roles">User Roles</a></li>
                </ul>
              </li>

              <li class="menu-header">Details</li>
              <li class="nav-item dropdown {{url()->current() == url('/company') || url()->current() == url('/branch') ? 'active' : ''}}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-industry"></i> <span>Company</span></a>
                <ul class="dropdown-menu">
                  <li class="{{url()->current() == url('/company') ? 'active' : ''}}"><a class="nav-link" href="/company">Company</a></li>
                  <li class="{{url()->current() == url('/branch') ? 'active' : ''}}"><a class="nav-link" href="/branch">Branch</a></li>
                </ul>
              </li>

              <li class="nav-item dropdown {{url()->current() == url('/employeeCategorys') || url()->current() == url('/employee') ? 'active' : ''}}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-users-cog"></i> <span>Employee</span></a>
                <ul class="dropdown-menu">
                    <li class="{{url()->current() == url('/employeeCategorys') ? 'active' : ''}}"><a class="nav-link" href="/employeeCategorys">Employee Category</a></li>
                    <li class="{{url()->current() == url('/employee') ? 'active' : ''}}"><a class="nav-link" href="/employee">Employee</a></li>
                </ul>
              </li>

              <li class="nav-item dropdown {{url()->current() == url('/employee_status') ? 'active' : ''}}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-map-marked-alt"></i> <span>Track Employee</span></a>
                <ul class="dropdown-menu">
                  <li class="{{url()->current() == url('/employee_status') ? 'active' : ''}}"><a class="nav-link" href="/employee_status/">Tracking List</a></li>
                </ul>
              </li>


            </ul>


        </aside>
      </div>
