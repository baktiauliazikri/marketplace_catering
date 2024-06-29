@extends('dashboard.layouts.main')

@section('dataOrder', 'active')

@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Daftar Order</h1>
        </div>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Customer</th>
                                <th>Menu</th>
                                <th>Jumlah</th>
                                <th>Tanggal Pengiriman</th>
                                <th>Total</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->customer->name }}</td>
                                    <td>{{ $data->menu->name }}</td>
                                    <td>{{ $data->quantity }}</td>
                                    <td>{{ $data->delivery_date }}</td>
                                    <td>{{ $data->total }}</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                            data-target="#showModal{{ $order->id }}">
                                            <i class="fas fa-eye"></i> Show
                                        </button>
                                        <a href="{{ route('order.edit', $order->id) }}" class="btn btn-sm btn-warning">
                                            <i class="fas fa-pen"></i> Edit
                                        </a>
                                        <form action="{{ route('order.destroy', $order->id) }}" method="POST"
                                            style="display:inline;">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Anda yakin menghapus data ini?')">
                                                <i class="fas fa-trash-alt"></i> Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>

                                <!-- Modal for Show Order Details -->
                                @include('dashboard.pages.order.show-modal', ['order' => $order])
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- @include('dashboard.pages.order.show') --}}

@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
@endsection
