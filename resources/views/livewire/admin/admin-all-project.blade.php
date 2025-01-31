<div class="container-fluid">
    <div class="card" style="width: 1608px; height: calc(100vh - 80px); position: fixed; top: 79px; left: 303px; z-index: 1029; padding: 20px 0 0 30px; overflow-y: auto;">
        <h2 class="card-header text-center" style="margin-top: 20px;">โครงการทั้งหมด</h2>

        <div class="d-flex justify-content-end mb-10">
            <!-- ฟิลด์ค้นหา -->
            <input type="text" wire:model.live.debounce.150ms="search" placeholder="ค้นหาโครงการ" class="form-control w-50" style="flex: 1; margin-right: 20px">
            
            <!-- ปุ่มที่มีสีตามสถานะ -->
            <button wire:navigate href="create-contractor" class="btn btn-primary btn-sm">โครงการทั้งหมด</button>
            <button wire:navigate href="create-contractor" class="btn btn-warning btn-sm">รอผู้รับเหมาส่งงาน</button>
            <button wire:navigate href="create-contractor" class="btn btn-info btn-sm">รอ PM ตรวจสอบ</button>
            <button wire:navigate href="create-contractor" class="btn btn-secondary btn-sm">รอแอดมินตรวจสอบ</button>
            <button wire:navigate href="create-contractor" class="btn btn-success btn-sm">เสร็จสมบูรณ์</button>
        </div>
        

        <table class="table table-bordered" style="table-layout: fixed; width: 100%;">
            <colgroup>
                <col style="width: 10%;"> <!-- คอลัมน์ ชื่อโครงการ -->
                <col style="width: 35%;"> <!-- คอลัมน์ สถานะ -->
                <col style="width: 20%;"> <!-- คอลัมน์ PM -->
                <col style="width: 20%;"> <!-- คอลัมน์ ผู้รับเหมา -->
                <col style="width: 15%;"> <!-- คอลัมน์ รายละเอียด -->
            </colgroup>
            <thead class="thead-light">
                <th class="text-center align-middle">ชื่อโครงการ</th>
                <th class="text-center align-middle">สถานะ</th>
                <th class="text-center align-middle">PM</th>
                <th class="text-center align-middle">ผู้รับเหมา</th>
                <th style="width: 180px;" class="text-center align-middle">รายละเอียด</th>
            </thead>
    </div>
</div>
