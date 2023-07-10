<div class="modal fade" id="ShowSurat{{ $loop->iteration }}" tabindex="-1" aria-labelledby="ShowSuratLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ShowSuratLabel"><i class="ti ti-email"></i> File Surat {{ $item->no_surat }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <img style="max-width: 100%; max-height: 100%;" src="{{ asset($item->FileSurat->file_surat) }}" alt="{{ $item->no_surat }}">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="ti ti-close"></i> Close</button>
        </div>
      </div>
    </div>
  </div>
