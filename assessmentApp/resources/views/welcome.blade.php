@include('layout.adminheader')

  <div class="admin-container">
    <!-- Sidebar -->
    <div class="sidebar">
      <h2>Admin Panel</h2>
      <ul class="menu">
        <li><a href="{{route('companyList')}}">Company</a></li>
        <li><a href="#logout">Employees</a></li>
        <li><a href="#logout">Logout</a></li>
      </ul>
    </div>

    <!-- Main Content -->
    <div class="content">
      <header class="header">
        <h1>Welcome to the Admin Panel</h1>
      </header>
      <main>
        <p>This is the main content area. Select an item from the sidebar to manage your admin tasks.</p>
      </main>
    </div>
  </div>

  @include('layout.footer')
