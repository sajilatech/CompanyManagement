
@include('layout.adminheader')

  <div class="admin-container">
    <!-- Sidebar -->
    <div class="sidebar">
      <h2>Admin Panel</h2>
      @include('layout.sidebar')
    </div>

    <!-- Main Content -->
    <div class="content"><a href="{{ route('employeeList')}}">Back</a>
    <div class="table-container">
    <form action="{{route('insertEmp')}}" method="post" enctype="multipart/form-data">
      @csrf
        <label for="fname"> First Name</label>
        <input type="text" id="fname" name="fname" placeholder="Your name.." value="{{ old('fname') }}">
        @error('fname')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <label for="fname"> Last Name</label>
        <input type="text" id="lname" name="lname" placeholder="Your Last name.." value="{{ old('lname') }}">
        @error('lname')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        
      
        <label for="lname">Email</label>
        <input type="text" id="email" name="email" placeholder="Your Email." value="{{ old('email') }}">
        @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
       
       
        <label for="subject">Phone</label>
        <input type="text" id="phone" name="phone" placeholder="Phone." value="{{ old('phone') }}">
        @error('phone')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <label for="country">Company</label>
        <select id="company" name="company">
        <option value="">---Select---</option>
        @foreach($company as $c)
           
          <option value="{{$c->id}}">{{$c->name}}</option>

          @endforeach
        </select>
        @error('company')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="submit" value="Submit">
      </form>
</div>

    </div>
  </div>

  @include('layout.footer')