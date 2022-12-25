@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <div class="content mt-2">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-header p-2">
                            <h4>List cafe</h4>
                        </div>
                        <div class="card-body p-2">
                            <a href="{{ route('admin.cafes.create') }}" class="btn btn-primary mb-2">Add cafe</a>
                            <table class="table table-bordered" id="example1" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">No</th>
                                        <th>User</th>
                                        <th>cafe</th>
                                        <th style="width: 30px">Price</th>
                                        <th style="width: 30px">Order</th>
                                        <th style="width: 32%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($cafes as $cafe)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $cafe->user->name }}</td>
                                            <td>{{ $cafe->name }}</td>
                                            <td>{{ number_format($cafe->price, 2) }}</td>
                                            <td>{{ $cafe->orders_count }}</td>
                                            <td>
                                                <a href="{{ route('admin.cafes.order', $cafe) }}"
                                                    class="btn btn-sm btn-outline-primary">Order</a>
                                                <a href="{{ route('admin.cafes.facilities', $cafe) }}"
                                                    class="btn btn-sm btn-outline-success">Facility</a>
                                                <a href="{{ route('admin.cafes.services', $cafe) }}"
                                                    class="btn btn-sm btn-outline-info">Service</a>
                                                <a href="{{ route('admin.cafes.capsters', $cafe) }}"
                                                    class="btn btn-sm btn-outline-dark">Capster</a>
                                                <!-- hapus cafe -->
                                                    <form action="{{ route('admin.cafes.destroy', $cafe) }}"
                                                    method="POST" class="d-inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Delete {{ $cafe->name }}?')">Delete</button>
                                                </form>
                                            </td>
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
