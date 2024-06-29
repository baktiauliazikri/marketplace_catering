@extends('dashboard.layouts.main')
@section('dataMenu', 'active')
@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Menu</h1>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Data Menu</h6>
                <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal"
                    data-target="#addMenuModal">
                    <i class="fas fa-add fa-sm text-white-50"></i>
                    Tambah Data
                </button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <table id="example" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Menu</th>
                                    <th>Foto</th>
                                    <th>Harga</th>
                                    <th>Deskripsi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($menus->isEmpty())
                                    <tr>
                                        <td colspan="6" class="text-center">Tidak ada data yang tersedia.</td>
                                    </tr>
                                @else
                                    @foreach ($menus as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data->name }}</td>
                                            <td>
                                                <img src="{{ Storage::url($data->image) }}" alt="{{ $data->name }}"
                                                    style="max-width: 100px;">
                                            </td>
                                            <td>{{ $data->price }}</td>
                                            <td>{{ $data->description }}</td>
                                            <td>
                                                <a href="{{ route('menu.edit', $data->id) }}" class="btn btn-sm btn-warning"
                                                    data-toggle="modal" data-target="#editMenuModal{{ $data->id }}">
                                                    <i class="fas fa-pen"></i>
                                                </a>
                                                <form action="{{ route('menu.destroy', $data->id) }}" method="POST"
                                                    style="display:inline;">
                                                    @method('DELETE')
                                                    @csrf
                                                    <input type="hidden" name="oldPicture" value="{{ $data->photo }}">
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Anda yakin menghapus data ini?')">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('dashboard.pages.menu.create')

    @foreach ($menus as $data)
        @include('dashboard.pages.menu.edit', ['menu' => $data])
    @endforeach

@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
@endsection
