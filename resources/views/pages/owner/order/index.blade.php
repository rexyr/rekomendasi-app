@extends('layouts.app')

@section('content')
    <!-- Main content -->
    <div class="content mt-2">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-header p-2">
                            <h4>List Order</h4>
                        </div>
                        <div class="card-body p-2">
                            <table class="table table-bordered" id="example1" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">No</th>
                                        <th>Name</th>
                                        <th>Capster</th>
                                        <th>Date</th>
                                        <th>Created At</th>
                                        <th>Status</th>
                                        <th style="width: 65px">Rating</th>
                                        <th>Review</th>
                                        <th style="width: 120px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($cafe->orders as $order)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $order->user->name }}</td>
                                            <td>{{ $order->capster->name }}</td>
                                            <td>{{ $order->order_date->format('d-m-Y') }}
                                                {{ $order->order_time->format('H:i') }}</td>
                                            <td>{{ $order->created_at->format('d-m-Y H:i:s') }}</td>
                                            <td><span class="badge badge-secondary">{{ $order->status }}</span></td>
                                            <td>
                                                @for ($i = 0; $i < $order->review_star; $i++)
                                                    <span class="fa fa-star fa-xs"></span>
                                                @endfor
                                            </td>
                                            <td>{{ $order->review_text }}</td>
                                            <td>
                                                <form action="{{ route('owner.order.update', $order) }}" method="POST"
                                                    class="d-inline-block">
                                                    @csrf
                                                    @if ($order->status == 'Waiting')
                                                        <button type="submit" name="type" value="1"
                                                            class="btn btn-sm btn-success">Confirm</button>
                                                    @endif
                                                    @if ($order->status == 'Confirm')
                                                        <button type="submit" name="type" value="2"
                                                            class="btn btn-sm btn-success">Done</button>
                                                    @endif
                                                    @if ($order->status == 'Waiting')
                                                        <button type="submit" name="type" value="0"
                                                            class="btn btn-sm btn-danger">Reject</button>
                                                    @endif
                                                    @if ($order->status == 'Rejected' or $order->status == 'Cancel')
                                                        <button type="submit" name="type" value="3"
                                                            class="btn btn-sm btn-danger">Delete</button>
                                                    @endif
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6">Tidak ada data laporan</td>
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
