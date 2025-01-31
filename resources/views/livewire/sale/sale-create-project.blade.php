<div class="container-fluid">
    <div class="card" style="width: 1608px; height: calc(100vh - 80px); position: fixed; top: 79px; left: 303px; z-index: 1029; padding: 20px 0 0 30px; overflow-y: auto;">
        <h2 class="card-header text-center mb-8" style="margin-top: 20px;">แบบฟอร์มขอคิวงาน</h2>

    <div class="card-body">
        @if (session()->has('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
        @endif

        <form wire:submit.prevent="save">
            <div class="row">
                <!-- ข้อมูลพื้นฐาน -->
                <h5 class="col-12 mt-3 mb-3 text-primary"><strong>ข้อมูลรายละเอียดงาน</strong></h5>

                <div class="mb-3">
                    <label class="form-label">ชื่อโปรเจกต์: </label>
                    <input wire:model="project_name" type="text" class="form-control @error('project_name') is-invalid @enderror">
                    @error('project_name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">ประเภทงาน: </label>
                    <select wire:model="work_type" class="form-select @error('work_type') is-invalid @enderror">
                        <option value="" disabled selected>เลือกประเภทงาน</option>
                        @foreach($work_types as $type)
                            <option value="{{ $type }}">{{ $type }}</option>
                        @endforeach
                    </select>
                    @error('work_type') <span class="text-danger">{{ $message }}</span> @enderror
                
                    <!-- แสดงช่องกรอกข้อมูลเมื่อเลือก "Other" -->
                    @if ($work_type === 'Other')
                    <div class="mt-2">
                        <label class="form-label">โปรดระบุประเภทงาน:</label>
                        <input wire:model="other_work_type" type="text" class="form-control @error('other_work_type') is-invalid @enderror">
                        @error('other_work_type') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    @endif
                </div>
                
                <div class="col-md-6 mb-3">
                    <label class="form-label">Solution: </label>
                    <select wire:model="solution" class="form-select @error('solution') is-invalid @enderror">
                        <option value="" disabled selected>เลือก Solution</option>
                        @foreach($solutions as $sol)
                            <option value="{{ $sol }}">{{ $sol }}</option>
                        @endforeach
                    </select>
                    @error('solution') <span class="text-danger">{{ $message }}</span> @enderror
                
                    <!-- แสดงช่องกรอกข้อมูลเมื่อเลือก "Other" -->
                    @if ($solution === 'Other')
                    <div class="mt-2">
                        <label class="form-label">โปรดระบุ Solution:</label>
                        <input wire:model="other_solution" type="text" class="form-control @error('other_solution') is-invalid @enderror">
                        @error('other_solution') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    @endif
                </div>
                
                <div class="mb-3">
                    <label class="form-label">คำอธิบายงาน: </label>
                    <input wire:model="work_description" type="text" class="form-control @error('work_description') is-invalid @enderror">
                    @error('work_description') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">วันที่นัดหมาย: </label>
                    <input wire:model="meeting_date" type="date" class="form-control @error('meeting_date') is-invalid @enderror">
                    @error('meeting_date') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">เวลานัดหมาย: </label>
                    <input wire:model="meeting_time" type="time" class="form-control @error('meeting_time') is-invalid @enderror">
                    @error('meeting_time') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">วันที่สิ้นสุดงาน: </label>
                    <input wire:model="end_date" type="date" class="form-control @error('end_date') is-invalid @enderror">
                    @error('end_date') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <h5 class="col-12 mt-3 mb-3 text-primary"><strong>ข้อมูลลูกค้า</strong></h5>
            <div class="row">
                <div class="mb-3">
                    <label class="form-label">ชื่อบริษัท/นิติบุคคล: </label>
                    <input wire:model="company_name" type="text" class="form-control @error('company_name') is-invalid @enderror">
                    @error('company_name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">ชื่อผู้ติดต่อ: </label>
                    <input wire:model="contact_name" type="text" class="form-control @error('contact_name') is-invalid @enderror">
                    @error('contact_name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">เบอร์ติดต่อ: </label>
                    <input wire:model="contact_phone" type="text" class="form-control @error('contact_phone') is-invalid @enderror" maxlength="10" oninput="this.value=this.value.replace(/[^0-9]/g,'')">
                    @error('contact_phone') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">ตำแหน่งของผู้ติดต่อ: </label>
                    <input wire:model="contact_position" type="text" class="form-control @error('contact_position') is-invalid @enderror">
                    @error('contact_position') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">พิกัด (ลิงก์จาก Google Map): </label>
                    <input wire:model="location" type="url" class="form-control @error('location') is-invalid @enderror">
                    @error('location') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <h5 class="col-12 mt-3 mb-3 text-primary"><strong>รายละเอียดเพิ่มเติมเกี่ยวกับงาน</strong></h5>
            <div class="row">
                <div class="mb-3">
                    <label class="form-label">การรับประกัน: </label>
                    <select wire:model="warranty" class="form-select @error('warranty') is-invalid @enderror">
                        <option value="" disabled selected>เลือกการรับประกัน</option>
                        @foreach($warranty_options as $option)
                            <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                    </select>
                    @error('warranty') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">หมายเหตุ/คำแนะนำเพิ่มเติม: </label>
                    <textarea wire:model="additional_notes" class="form-control @error('additional_notes') is-invalid @enderror"></textarea>
                    @error('additional_notes') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">ต้องการเอกสารส่งหรือไม่: </label>
                    <select wire:model="needs_documents" class="form-select @error('needs_documents') is-invalid @enderror">
                        <option value="" disabled selected>เลือก</option>
                        <option value="ต้องการ">ต้องการ</option>
                        <option value="ไม่ต้องการ">ไม่ต้องการ</option>
                    </select>
                    @error('needs_documents') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="text-end">
                <button wire:navigate href="/sale-list-project" class="btn btn-secondary">ย้อนกลับ</button>
                <button type="submit" class="btn btn-primary">บันทึก</button>
            </div>
        </form>
    </div>
</div>
