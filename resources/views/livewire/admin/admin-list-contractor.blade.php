<div class="container-fluid">
    <div class="card" style="width: 1608px; height: calc(100vh - 80px); position: fixed; top: 79px; left: 303px; z-index: 1029; padding: 20px 0 0 30px; overflow-y: auto;">
        <h2 class="card-header text-center mb-8" style="margin-top: 20px;">รายชื่อทั้งหมดของผู้รับเหมา</h2>
        <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-md-10">

                    <div class="d-flex justify-content-end mb-3">
                        <!-- ฟิลด์ค้นหา -->
                        <input type="text" wire:model.live.debounce.150ms="search" placeholder="ค้นหารายชื่อ" class="form-control w-50" style="flex: 1; margin-right: 20px">
                        <button wire:navigate href="/admin-register-contractor" class="btn btn-success btn-sm">เพิ่มรายชื่อ</button>
                    </div>

                    <livewire:flash-message />

                    <!-- ตารางข้อมูล -->
                    <table class="table table-bordered" style="table-layout: fixed; width: 100%;">
                        <colgroup>
                            <col style="width: 10%;"> <!-- คอลัมน์ ลำดับ -->
                            <col style="width: 35%;"> <!-- คอลัมน์ ชื่อบริษัท -->
                            <col style="width: 20%;"> <!-- คอลัมน์ ชื่อ -->
                            <col style="width: 20%;"> <!-- คอลัมน์ นามสกุล -->
                            <col style="width: 15%;"> <!-- คอลัมน์ การจัดการ -->
                        </colgroup>
                        <thead class="thead-light">
                            <th class="text-center align-middle">ลำดับ</th>
                            <th class="text-center align-middle">ชื่อบริษัท</th>
                            <th class="text-center align-middle">ชื่อ</th>
                            <th class="text-center align-middle">นามสกุล</th>
                            <th style="width: 180px;" class="text-center align-middle">การจัดการ</th>
                        </thead>

                        <tbody>
                            @foreach($employeescontractors as $value)
                            <tr>
                                <td class="text-center align-middle">{{ $value->id }}</td>
                                <td>{{ $value->company_name }}</td>
                                <td>{{ $value->first_name }}</td>
                                <td>{{ $value->last_name }}</td>
                                <td class="text-center align-middle" style="white-space: nowrap;">
                                    <button wire:navigate href="/admin-view-contractor/{{ $value->id }}" class="btn btn-primary btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button wire:navigate href="/admin-edit-contractor/{{ $value->id }}" class="btn btn-secondary btn-sm">
                                        <i class="fas fa-pencil-alt"></i>
                                    </button>
                                    <button wire:click="deleteEmployeeContractor({{ $value->id }})" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>

                            
                            @endforeach
                        </tbody>
                    </table>
                    <!-- แสดงผลการแบ่งหน้า -->
                    {{ $employeescontractors->links() }}

                </div>
            </div>
        </div>
    </div>
</div>

