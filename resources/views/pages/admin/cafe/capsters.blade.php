@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <div class="content mt-2">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-header p-2">
                            <h4>List Capster {{ $barber->name }}</h4>
                        </div>
                        <div class="card-body p-2">
                            <table class="table table-bordered" id="example1" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">No</th>
                                        <th style="width: 30px">Photo</th>
                                        <th>Name</th>
                                        <th>Age</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($barber->capsters as $capster)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><img src="{{ $capster->photo }}" width="25px" height="25px"
                                                    class="rounded-circle" alt=""></td>
                                            <td>{{ $capster->name }}</td>
                                            <td>{{ $capster->age }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4">Tidak ada data</td>
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
