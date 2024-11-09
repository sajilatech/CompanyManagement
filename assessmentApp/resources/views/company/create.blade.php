
@include('layout.adminheader')

  <div class="admin-container">
    <!-- Sidebar -->
    <div class="sidebar">
    <h2>Admin Panel</h2>
    @include('layout.sidebar')
</div>
    <!-- Main Content -->
    <div class="content"><a href="{{ route('companyList')}}">Back</a>
    <div class="table-container">
    <form action="{{route('insertCompany')}}" method="post" enctype="multipart/form-data">
      @csrf
        <label for="fname"> Name</label>
        <input type="text" id="name" name="name" placeholder="Your name.." value="{{old('name')}}">
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="lname">Logo</label>
        <input type="file" name="file" id="file" required>
      
        <label for="lname">Email</label>
        <input type="text" id="email" name="email" placeholder="Your Email.">
        @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
       
       
        <label for="subject">Website</label>
        <input type="text" id="website" name="website" placeholder="Website." value="{{old('website')}}">
        @error('website')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="submit" value="Submit">
      </form>
</div>

    </div>
  </div>

  @include('layout.footer')