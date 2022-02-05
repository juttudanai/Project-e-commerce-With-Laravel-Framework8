<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="{{ route('addCategory') }}" method="post">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">แบบฟอร์มเพิ่มประเภทสินค้า</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-2">
                        <label for="category_name" class="form-label">ชื่อประเภทสินค้า</label>
                        <input type="text" class="form-control" name="category_name" placeholder="กรุณากรอกชื่อประเภทสินค้า">
                        <span class="form-text text-danger">* มีประเภทสินค้านี้ในระบบเเล้ว</span>
                        <span class="form-text text-success">* สามารถใช้ชื่อประเภทสินค้านี้ได้</span>
                    </div>
                </div>
                <div class="modal-footer d-grid gap-2 d-flex justify-content-center">
                    <button class="btn btn-success me-md-2" type="submit">เพิ่มประเภทสินค้า</button>
                </div>
            </div>
        </div>
    </form>
  </div>
