@extends('layouts.app')

@section('content')
    <!-- Main content -->
    <div class="content mt-2">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-header p-2">
                            <h4>List Capster</h4>
                        </div>
                        <div class="card-body p-2">
                            <a href="{{ route('owner.capsters.create') }}" class="btn btn-primary mb-2">Add Capster</a>
                            <table class="table table-bordered" id="example1" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">No</th>
                                        <th style="width: 30px">Photo</th>
                                        <th>Name</th>
                                        <th>Age</th>
                                        <th style="width: 100px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($cafe->capsters as $capster)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><img src="{{ $capster->photo }}" width="25px" height="25px"
                                                    class="rounded-circle" alt=""></td>
                                            <td>{{ $capster->name }}</td>
                                            <td>{{ $capster->age }}</td>
                                            <td>
                                                <a href="{{ route('owner.capsters.edit', $capster) }}"
                                                    class="btn btn-sm btn-warning">Edit</a>
                                                <form action="{{ route('owner.capsters.destroy', $capster) }}"
                                                    method="POST" class="d-inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Delete {{ $capster->name }}?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4">Tidak ada data laporan</td>
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
                "buttons": [
                    'excelHtml5',
                    'pdfHtml5', "colvis"
                ]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
