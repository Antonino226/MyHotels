<nav class="sidebar">
      <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
          My<span>Hotels</span>
        </a>
        <div class="sidebar-toggler not-active">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
      <div class="sidebar-body">
        <ul class="nav">
          <li class="nav-item nav-category">Main</li>
          <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link">
              <i class="link-icon" data-feather="box"></i>
              <span class="link-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item nav-category">RealEstate</li>

          @if(Auth::user()->can('type.menu'))
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false" aria-controls="emails">
              <i class="link-icon" data-feather="mail"></i>
              <span class="link-title">Property Type</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="emails">
              <ul class="nav sub-menu">
                @if(Auth::user()->can('all.type'))
                <li class="nav-item">
                  <a href="{{ route('all.type') }}" class="nav-link">All Type</a>
                </li>
                  @endif
                @if(Auth::user()->can('add.type'))
                <li class="nav-item">
                  <a href="{{ route('add.type') }}" class="nav-link">Add Type</a>
                </li>
                @endif
              </ul>
            </div>
          </li>
          @endif
          
          @if(Auth::user()->can('amenitie.menu'))
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#amenitie" role="button" aria-expanded="false" aria-controls="emails">
              <i class="link-icon" data-feather="mail"></i>
              <span class="link-title">Amenitie </span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="amenitie">
              <ul class="nav sub-menu">
              @if(Auth::user()->can('all.amenitie'))
                <li class="nav-item">
                  <a href="{{ route('all.amenitie') }}" class="nav-link">All Amenitie</a>
                </li>
              @endif
              @if(Auth::user()->can('add.amenitie'))
                <li class="nav-item">
                  <a href="{{ route('add.amenitie') }}" class="nav-link">Add Amenitie</a>
                </li>
              @endif
              </ul>
            </div>
          </li>
          @endif

          @if(Auth::user()->can('hotel.menu'))
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#hotel" role="button" aria-expanded="false" aria-controls="emails">
              <i class="link-icon" data-feather="mail"></i>
              <span class="link-title">Hotel</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="hotel">
              <ul class="nav sub-menu">
              @if(Auth::user()->can('all.hotel'))
                <li class="nav-item">
                  <a href="{{ route('all.hotel') }}" class="nav-link">All hotel</a>
                </li>
              @endif
              @if(Auth::user()->can('add.hotel'))
                <li class="nav-item">
                  <a href="{{ route('add.hotel') }}" class="nav-link">Add hotel</a>
                </li>
              @endif
              </ul>
            </div>
          </li>
          @endif

          @if(Auth::user()->can('room.menu'))
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#room" role="button" aria-expanded="false" aria-controls="emails">
              <i class="link-icon" data-feather="mail"></i>
              <span class="link-title">Room</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="room">
              <ul class="nav sub-menu">
              @if(Auth::user()->can('all.room'))
                <li class="nav-item">
                  <a href="{{ route('all.room') }}" class="nav-link">All room</a>
                </li>
              @endif
              @if(Auth::user()->can('add.room'))
                <li class="nav-item">
                  <a href="{{ route('add.room') }}" class="nav-link">Add room</a>
                </li>
              @endif
              </ul>
            </div>
          </li>
          @endif

          @if(Auth::user()->can('booking.menu'))
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#booking" role="button" aria-expanded="false" aria-controls="emails">
              <i class="link-icon" data-feather="mail"></i>
              <span class="link-title">Booking</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="booking">
              <ul class="nav sub-menu">
              @if(Auth::user()->can('all.booking'))
                <li class="nav-item">
                  <a href="{{ route('all.booking') }}" class="nav-link">All booking</a>
                </li>
              @endif
              @if(Auth::user()->can('add.booking'))
                <li class="nav-item">
                  <a href="{{ route('add.booking') }}" class="nav-link">Add booking</a>
                </li>
              @endif
              </ul>
            </div>
          </li>
          @endif

          <li class="nav-item">
            <a href="pages/apps/calendar.html" class="nav-link">
              <i class="link-icon" data-feather="calendar"></i>
              <span class="link-title">Calendar</span>
            </a>
          </li>
          <li class="nav-item nav-category">Components</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#uiComponents" role="button" aria-expanded="false" aria-controls="uiComponents">
              <i class="link-icon" data-feather="feather"></i>
              <span class="link-title">UI Kit</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="uiComponents">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="pages/ui-components/accordion.html" class="nav-link">Accordion</a>
                </li>
                <li class="nav-item">
                  <a href="pages/ui-components/alerts.html" class="nav-link">Alerts</a>
                </li>
              </ul>
            </div>
          </li>

          <li class="nav-item nav-category">Role & Permission</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#advancedUI" role="button" aria-expanded="false" aria-controls="advancedUI">
              <i class="link-icon" data-feather="anchor"></i>
              <span class="link-title">Role & Permission</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="advancedUI">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{ route('all.permission') }}" class="nav-link">All Permission</a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('all.roles') }}" class="nav-link">All Roles</a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('add.roles.permission') }}" class="nav-link">Roles in Permission</a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('all.roles.permission') }}" class="nav-link">All Role in Permission</a>
                </li>
              </ul>
            </div>
          </li>

          <li class="nav-item nav-category">Manage Admin User</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#admin" role="button" aria-expanded="false" aria-controls="admin">
              <i class="link-icon" data-feather="anchor"></i>
              <span class="link-title">Manage Admin User</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="admin">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{ route('all.admin') }}" class="nav-link">All Admin</a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('add.admin') }}" class="nav-link">Add Admin</a>
                </li>
              </ul>
            </div>
          </li>
          
          <li class="nav-item nav-category">Docs</li>
          <li class="nav-item">
            <a href="#" target="_blank" class="nav-link">
              <i class="link-icon" data-feather="hash"></i>
              <span class="link-title">Documentation</span>
            </a>
          </li>
        </ul>
      </div>
    </nav>