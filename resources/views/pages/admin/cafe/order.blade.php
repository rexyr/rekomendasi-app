@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <div class="content mt-2">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-header p-2">
                            <h4>List Order {{ $barber->name }}</h4>
                        </div>
                        <div class="card-body p-2">
                            <table class="table table-bordered" id="example1" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">No</th>
                                        <th>User</th>
                                        <th>Capster</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th style="width: 65px">Rating</th>
                                        <th>Review</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($barber->orders as $order)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $order->user->name }}</td>
                                            <td>{{ $order->capster->name }}</td>
                                            <td>{{ $order->order_date->format('d-m-Y') }}
                                                {{ $order->order_time->format('H:i') }}</td>
                                            <td><span class="badge badge-secondary">{{ $order->status }}</span></td>
                                            <td>
                                                @for ($i = 0; $i < $order->review_star; $i++)
                                                    <span class="fa fa-star fa-xs"></span>
                                                @endfor
                                            </td>
                                            <td>{{ $order->review_text }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7">Tidak ada data</td>
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
