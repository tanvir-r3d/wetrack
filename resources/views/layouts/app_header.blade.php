
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
          <div class="search-element">
            <input class="form-control" type="search" placeholder="Search" id="search" aria-label="Search" data-width="250">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            <div class="search-backdrop"></div>
            <div class="search-result">
              <div class="search-header">
                Result
              </div>
                <div id="search-items"></div>

            </div>
          </div>
        </form>
        <select class="lang_choose">
                
                <option value="en" {{Session::get("locale") == "en" ? "selected='selected'" : ""}}>English</option>
                <option value="bn" {{Session::get("locale") == "bn" ? "selected='selected'" : ""}}>Bangla</option>

              </select>

              <script type="text/javascript">

                $(".lang_choose").change(function(){
                  alert('hi');
                  var language=$(this).val();


                    $.ajax({
                             type:'get',
                             url:'/localization/'+language,
                             
                             success:function(data) {
                                console.log(data);
                                location.reload();
                             }
                            });

                });


              </script>


        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" height="30" src="{{Auth::user()->user_img ? '/images/user/'.Auth::user()->user_img : 'avatar.png'}}" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, {{Auth::user()->username}}</div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="/profile" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              
              <a href="/settings" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Settings
              </a>
              <div class="dropdown-divider"></div>
              <a href="{{ route('logout') }}"  class="dropdown-item has-icon text-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
       <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                  @csrf
                              </form>
