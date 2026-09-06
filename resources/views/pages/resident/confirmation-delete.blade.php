<!-- Modal -->
<div class="modal fade" id="confirmationDelete-{{ $item->id }}" tabindex="-1" aria-labelledby="confirmationDeleteLabel-{{ $item->id }}" aria-hidden="true">
  <div class="modal-dialog">
    <form action="/residents/{{ $item->id }}" method="POST">
      @csrf
      @method('DELETE')
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title fs-5" id="confirmationDeleteLabel-{{ $item->id }}">Konfirmasi Penghapusan</h4>
        <button type="button" class="btn btn-default" data-bs-dismiss="modal" aria-label="Close">
            <i class="fas fa-times"></i>
        </button>
</form>
      </div>
      <div class="modal-body">
        <p>Apakah Anda yakin ingin menghapus data ini?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-outline-danger">Ya, Hapus</button>
      </div>

    </div>
  </div>
</div>