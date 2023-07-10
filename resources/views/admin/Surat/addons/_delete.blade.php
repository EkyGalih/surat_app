<div class="modal fade" id="HapusSurat{{ $loop->iteration }}" tabindex="-1" aria-labelledby="HapusSuratLabel" aria-hidden="true">
    <div class="modal-dialog" style="margin-top: 12%;">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="HapusSuratLabel"><i class="ti ti-trash"></i> Hapus Surat</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Anda yakin ingin menghapus surat <strong>{{ $item->jenis_surat}}<br/> {{ $item->no_surat }}</strong> dari <strong>{{ $item->dinas }}</strong></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="ti ti-close"></i> Tidak</button>
          <a href="{{ route('surat-admin.destroy', $item->id) }}" class="btn btn-danger"><i class="ti ti-check"></i> Ya</a>
        </div>
      </div>
    </div>
  </div>
