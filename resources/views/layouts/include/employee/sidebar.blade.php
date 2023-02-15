<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{route('employee.dashboard')}}">
          <i class="mdi mdi-home menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="{{route('employee.attendance.create')}}">
            <i class="mdi mdi-view-headline menu-icon"></i>
          <span class="menu-title">Add Attendance</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('employee.attendance.index')}}">
            <i class="mdi mdi-view-headline menu-icon"></i>
          <span class="menu-title">Attendance List</span>
        </a>
      </li>
    </ul>
  </nav>
