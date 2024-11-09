
@include('layout.adminheader')

  <div class="admin-container">
    <!-- Sidebar -->
    <div class="sidebar">
      <h2>Admin Panel</h2>
      @include('layout.sidebar')
    </div>

    <!-- Main Content -->
    <div class="content"><a href="{{ route('createCompany')}}">Create</a>
    <div class="table-container">
  <table class="admin-table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Logo</th>
        <th>Website</th>
        <th>Status</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>

    @if(!empty($records) && $records->count())
    @php $i = 1; @endphp
    @foreach($records as $record)
        <tr>
            <td>{{ $i++ }}</td> 
            <td>{{ $record->name }}</td>
            <td>{{ $record->email }}</td>
            <td>
                <img src="{{ asset('storage/' . $record->logo) }}" alt="Logo" width="50" height="50">
            </td>
            <td>{{ $record->website }}</td>
            <td>{{ $record->status }}</td>
            <td>
            <a href="{{route('company.edit',['id'=>$record->id])}}">Edit</a>
            </td> 
           
        </tr>
    @endforeach
@else
    <tr>
        <td colspan="7" >There is no data found.</td>
    </tr>
@endif

    </tbody>
  </table>
</div>

    </div>
  </div>

  @include('layout.footer')