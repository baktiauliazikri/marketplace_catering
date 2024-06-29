<div class="modal fade" id="showModal{{ $data->id }}" tabindex="-1" role="dialog"
    aria-labelledby="showModalLabel{{ $data->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="showModalLabel{{ $data->id }}">Detail Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><strong>Customer:</strong> {{ $data->customer->name }}</p>
                <p><strong>Menu:</strong> {{ $data->menu->name }}</p>
                <p><strong>Jumlah:</strong> {{ $data->quantity }}</p>
                <p><strong>Tanggal Pengiriman:</strong> {{ $data->delivery_date }}</p>
                <p><strong>Total:</strong> {{ $data->total }}</p>
                <!-- Add other fields as needed -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary">Cetak</button>
            </div>
        </div>
    </div>
</div>
