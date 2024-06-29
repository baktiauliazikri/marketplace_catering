<!-- Modal Edit Menu -->
<div class="modal fade" id="editMenuModal{{ $menu->id }}" tabindex="-1" role="dialog"
    aria-labelledby="editMenuModalLabel{{ $menu->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editMenuModalLabel{{ $menu->id }}">Edit Data Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('menu.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="editName">Nama Menu</label>
                            <input type="text" class="form-control" id="editName" name="name"
                                value="{{ $menu->name }}" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="editPrice">Harga</label>
                            <input type="number" class="form-control" id="editPrice" name="price"
                                value="{{ $menu->price }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="editImage">Foto</label>
                        <input type="file" class="form-control" id="editImage" name="image">
                    </div>
                    <div class="form-group">
                        <label for="editDescription">Deskripsi</label>
                        <textarea class="form-control" id="editDescription" name="description" rows="3" required>{{ $menu->description }}</textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Edit Menu -->
