<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3 class="text-center mb-4">รายชื่อโปรเจกต์</h3>

            <!-- Search Input -->
            <div class="d-flex justify-content-between mb-3">
                <input type="text" wire:model.live.debounce.150ms="search" placeholder="ค้นหาโปรเจกต์" class="form-control">
            </div>

            <!-- Project Table -->
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>ลำดับ</th>
                        <th>ชื่อโปรเจกต์</th>
                        <th class="text-center" style="width: 180px;">การจัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($SaleListProject as $project)  <!-- เปลี่ยนเป็น $listsale -->
                        <tr>
                            <td>{{ $project->id }}</td>
                            <td>{{ $project->sales_projectname }}</td>
                            <td class="text-center">
                                <!-- View Button -->
                                <button wire:navigate href="sale-list-view/{{ $project->id }}" 
                                        class="btn btn-primary btn-sm shadow-sm">
                                    <i class="fas fa-eye"></i> ดูรายละเอียด
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center text-muted">ไม่พบข้อมูลโปรเจกต์</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- Pagination -->
            {{ $SaleListProject->links() }} <!-- เปลี่ยนเป็น $listsale -->
        </div>
    </div>
</div>
