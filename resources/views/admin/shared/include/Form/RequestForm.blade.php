<!-- Modal -->
<div class="modal fade" id="requestForm" tabindex="-1" aria-labelledby="requestFormLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="requestFormLabel">{{$titleModal ?? ''}}</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            {{$content ?? '...'}}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
          <button id="requestForm-accept" type="button" class="btn btn-primary">Đồng ý</button>
        </div>
      </div>
    </div>
  </div>
  <form name="deleteForm" id="deleteForm" hidden action="" method="POST">
    @csrf
    @method('DELETE')
</form>