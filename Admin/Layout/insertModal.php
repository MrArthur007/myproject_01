<html>
    <!-- Insert Modal HTML -->
    <div class="modal fade" id="insertAdmin" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel">เพิ่มข้อมูลแอดมิน</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" method="post">
                    <div class="mb-3">
                        <label for="">ID</label>
                        <input class="form-control w-25" type="number" name="IDdb">
                    </div>
                    <div class="mb-3">
                        <label for="">Username</label>
                        <input class="form-control" type="text" name="uname" placeholder="ไอดีผู้ใช้งาน" />
                    </div>
                    <div class="">
                        <label for="">password</label>
                        <input class="form-control" id="myInput" type="password" name="passwd" placeholder="รหัสผ่าน" maxlength="6"/>
                        <div class="p-2">
                            <input type="checkbox" onclick="myFunction()"> <span class="fs-6 p-0">Show Password</span>
                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="">fullname</label>
                        <input class="form-control" type="text" name="fname" placeholder="ชื่อ - นามสกุล" />
                    </div>
                    <div class="mb-3">
                        <label for="">Email Address</label>
                        <input class="form-control" type="email" name="email" placeholder="อีเมล แอดเดรส" />
                    </div>
                    <div class="mb-3">
                        <label for="">Tel.</label>
                        <input class="form-control" type="tel" name="tel" pattern="[0-9]{3}-[0-9]{7}" placeholder="เบอร์โทร" maxlength="11"/>
                    </div>
                    <input class="btn btn-success rounded" type="submit" name="btn_insert" value="Insert">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Cancle</button>
                </form>
            </div>
        </div>
    </div>
    </div>
</html>