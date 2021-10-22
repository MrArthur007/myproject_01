<html>
    <!-- Insert Modal HTML -->
    <div class="modal fade" id="insertSilkType" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel">เพิ่มข้อมูลแอดมิน</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" method="post">
                    <div class="mb-3">
                        <label for="">ลำดับ</label>
                        <input class="form-control w-25" type="number" name="s_id">
                    </div>
                    <div class="mb-3">
                        <label for="">ชื่อประเภทผ้าทอ</label>
                        <select class="form-select" aria-label="Default select example" name="type_name">
                            <?php $objSilkType->FetchAllSilkTypeForInsert(); ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">ชื่อเรื่อง</label>
                        <input class="form-control" type="text" name="title" placeholder="ไอดีผู้ใช้งาน" />
                    </div>
                    <div class="mb-3">
                        <label for="">จังหวัด</label>
                        <select class="form-select" aria-label="Default select example" name="s_prov">
                            <?php $objFetchAll->FetchProvice(); ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">คำอธิบาย</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="s_detail"></textarea>
                    </div>
                    <input class="btn btn-success rounded" type="submit" name="btn_insert" value="Insert">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Cancle</button>
                </form>
            </div>
        </div>
    </div>
    </div>
</html>