<div class="container-fluid">
    <div class="card" style="width: 1608px; height: calc(100vh - 80px); position: fixed; top: 79px; left: 303px; z-index: 1029; padding: 20px 0 0 50px; overflow-y: auto;">
        <h2 class="card-header text-center mb-8" style="margin-top: 20px;">รายชื่อทั้งหมด</h2>

        <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="mb-3 d-flex justify-content-center align-items-center">
                        <span class="mr-3">เลือกประเภท:  </span>
                        <select class="form-control w-75" style="margin-left: 9px;" wire:model.live.debounce.150ms="role">
                            <option value="" disabled selected>กรุณาเลือกประเภท</option>
                            <option value="admin">admin</option>
                            <option value="sale">sale</option>
                            <option value="pm">pm</option>
                        </select>
                    </div>

                    <div class="d-flex justify-content-between mb-3">
                        <input type="text" wire:model.live.debounce.150ms="search" placeholder="ค้นหารายชื่อ" class="form-control w-50" style="flex: 1; margin-right: 20px">
                        <button wire:navigate href="/admin-register-employee" class="btn btn-success btn-sm">เพิ่มรายชื่อ</button>
                    </div>

                    <livewire:flash-message/>
                    @if($employees->count() > 0) 
                    <table class="table table-bordered" style="table-layout: fixed; width: 100%;">
                        <colgroup>
                            <col style="width: 10%;"> <!-- คอลัมน์ ลำดับ -->
                            <col style="width: 35%;"> <!-- คอลัมน์ ชื่อบริษัท -->
                            <col style="width: 20%;"> <!-- คอลัมน์ ชื่อ -->
                            <col style="width: 20%;"> <!-- คอลัมน์ นามสกุล -->
                            <col style="width: 15%;"> <!-- คอลัมน์ การจัดการ -->
                            <col style="width: 15%;"> <!-- คอลัมน์ การจัดการ -->
                        </colgroup>
                        <thead class="thead-light">
                            <th class="text-center align-middle">ลำดับ</th>
                            <th class="text-center align-middle">ชื่อบริษัท</th>
                            <th class="text-center align-middle">ชื่อ</th>
                            <th class="text-center align-middle">นามสกุล</th>
                            <th class="text-center align-middle">Role</th>
                            <th style="width: 180px;" class="text-center align-middle">การจัดการ</th>
                        </thead>
                        <tbody>
                            @foreach($employees as $value)
                            <tr>
                                <td class="text-center align-middle">{{ $value->id }}</td>
                                <td>{{ $value->company_name }}</td>
                                <td>{{ $value->first_name }}</td>
                                <td>{{ $value->last_name }}</td>
                                <td>{{ $value->role }}</td>
                                <td class="text-center align-middle" style="white-space: nowrap;">
                                    <button wire:navigate href="/admin-view-employee/{{ $value->id }}" class="btn btn-primary btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button wire:navigate href="/admin-edit-employee/{{ $value->id }}" class="btn btn-secondary btn-sm">
                                        <i class="fas fa-pencil-alt"></i>
                                    </button>
                                    <button wire:click="deleteEmployee({{ $value->id }})" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                        {{ $employees->links() }}
                        @else
                        <div class="alert alert-warning text-center">
                            ไม่พบข้อมูลพนักงาน
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
