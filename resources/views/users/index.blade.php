@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <div class="content mt-2">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-header p-2">
                            <h4>Users</h4>
                        </div>
                        <div class="card-body p-2">
                            <a href="{{ route('admin.cafes.create') }}" class="btn btn-primary mb-2">Add Users</a>
                            <table class="table table-bordered" id="example1" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">No</th>
                                        <th>Name</th>
                                        <th>phone</th>
                                        <th>Email</th>
                                        <th>Role</th>                                       
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($users as $data)

                                    <tr>                                        
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->phone }}</td>
                                            <td>{{ $data->email }}</td>
                                            {{-- <td>{{ $data->role }}</td> --}}
                                            @if($data->role == 1)
                                            <td>User</td>
                                            @elseif($data->role == 2)
                                            <td>Owner</td>
                                            @else
                                            <td>Admin</td>
                                            @endif
                                            
                                            @if($data->role == 3)
                                            <td>                                           
                                                <!-- hapus cafe -->
                                                    <form action="{{ route('admin.cafes.destroy', $data) }}"
                                                    method="POST" class="d-inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" disabled
                                                        onclick="return confirm('Delete {{ $data->name }}?')">Delete</button>
                                                </form>
                                            </td>
                                            @else
                                            <td>                                           
                                                <!-- hapus cafe -->
                                                    <form action="{{ route('admin.cafes.destroy', $data) }}"
                                                    method="POST" class="d-inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" 
                                                        onclick="return confirm('Delete {{ $data->name }}?')">Delete</button>
                                                </form>
                                            </td>
                                            @endif
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6">Tidak ada data</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>

                        </div>
                    </div>

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('scripts')
    <script>
        $(function() {
            $("#example1").DataTable({
                "order": [],
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "ordering": false,
                "buttons": [
                    'excelHtml5',
                    'pdfHtml5', "colvis"
                ]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
