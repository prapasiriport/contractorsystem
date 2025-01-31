<div class="card offset-3 col-6 shadow-lg mt-5 border-0 rounded-3">
    <h5 class="card-header bg-gradient text-black text-center py-3" style="background: linear-gradient(45deg, #6a11cb, #2575fc);">
        <i class="bi bi-person-fill"></i> รายละเอียดโครงการ
    </h5>
    <div class="card-body">
        <div class="row">
            <!-- Row 1: Project Info -->
            <h6 class="col-12 mt-3 mb-3 text-primary"><strong>ข้อมูลรายละเอียดงาน</strong></h6>
            
            <div class="col-12">
                <div class="mb-3">
                    <strong>ชื่อโปรเจกต์:</strong> {{ $getRecord->sales_projectname }}
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <strong>ประเภทงาน:</strong> {{ $getRecord->sales_worktype }}
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <strong>Solution:</strong> {{ $getRecord->sales_solution }}
                </div>
            </div>
            <div class="col-12">
                <div class="mb-3">
                    <strong>คำอธิบายงาน:</strong> {{ $getRecord->sale_workdescription }}
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <strong>วันที่นัดหมาย:</strong> {{ $getRecord->sales_meetingdate }}
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <strong>เวลานัดหมาย:</strong> {{ $getRecord->sales_meetingtime }}
                </div>
            </div>

            <div class="col-12">
                <div class="mb-3">
                    <strong>วันที่สิ้นสุดงาน:</strong> {{ $getRecord->sales_enddate }}
                </div>
            </div>

            <!-- Row 2: Meeting Info -->
            <h6 class="col-12 mt-3 mb-3 text-primary"><strong>ข้อมูลลูกค้า</strong></h6>
            
            <div class="col-12">
                <div class="mb-3">
                    <strong>ชื่อบริษัท/ชื่อนิติบุคคล:</strong> {{ $getRecord->sales_companyname }}
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <strong>ชื่อผู้ติดต่อ:</strong> {{ $getRecord->sales_contactname }}
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <strong>เบอร์ติดต่อ:</strong> <a href="tel:{{ $getRecord->sales_contactphone }}" class="text-decoration-none text-dark">{{ $getRecord->sales_contactphone }}</a>
                </div>
            </div>

            <div class="col-12">
                <div class="mb-3">
                    <strong>ตำแหน่งผู้ติดต่อ:</strong> {{ $getRecord->sales_contactposition }}
                </div>
            </div>

            <div class="col-12">
                <div class="mb-3">
                    <strong>พิกัด (Link จาก Google Map):</strong> {{ $getRecord->sales_location }}
                </div>
            </div>

            <!-- Row 5: Location and Warranty Info -->
            <h6 class="col-12 mt-3 mb-3 text-primary"><strong>รายละเอียดเพิ่มเติมเกี่ยวกับงาน</strong></h6>
            
            <div class="col-md-6">
                <div class="mb-3">
                    <strong>ชื่อผู้ขอคิว:</strong>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <strong>เบอร์ติดต่อ:</strong>
                </div>
            </div>

            <div class="col-12">
                <div class="mb-3">
                    <strong>ประกันงาน:</strong> {{ $getRecord->sales_warranty }}
                </div>
            </div>

            <!-- Row 6: Additional Notes and Documents -->
            <div class="col-12">
                <div class="mb-3">
                    <strong>คำเตือน คำแนะนำพิเศษเกี่ยวกับโครงการหรืออื่น ๆ:</strong> {{ $getRecord->sales_additionalnotes }}
                </div>
            </div>

            <div class="col-12">
                <div class="mb-3">
                    <strong>เอกสารที่ต้องการ:</strong> {{ $getRecord->sales_needsdocuments }}
                </div>
            </div>

            <h6 class="col-12 mt-3 mb-3 text-primary"><strong>รายละเอียดผู้รับผิดชอบโครงการ</strong></h6>
            
            <div class="col-md-6">
                <div class="mb-3">
                    <strong>ผู้จัดการโครงการ:</strong>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <strong>เบอร์ติดต่อ:</strong>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <strong>ผู้รับเหมา:</strong>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <strong>เบอร์ติดต่อ:</strong>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <strong>แอดมิน:</strong>
                </div>
            </div>

        </div>
    </div>

    <a href="sale-list-project" class="btn-close position-absolute top-0 end-0 m-3" aria-label="Close"></a>


</div>
