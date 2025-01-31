<div style="display: flex; flex-direction: column; ">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-white" style="position: fixed; top: 0; left: 0; width: 100%; z-index: 1030; padding-right: 30px; font-size: 19.2px; border-bottom: 1px solid #ddd; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
        <a class="navbar-brand" href="/pm-home" style="position: relative;">
            <img src="/images/HighSolution_ForWe.jpg" alt="Logo" style="max-height: 50px; object-fit: contain; position: relative; transform: scale(1.1); margin-left: 20px;">
        </a>
        @auth
        <ul class="navbar-nav ms-auto align-items-center">
            <!-- ไอคอนการแจ้งเตือน -->
            <li class="nav-item">
                <a class="nav-link position-relative" href="#" style="padding: 0 15px;">
                    <i class="fas fa-bell" style="font-size: 24px; color: #001f4d;"></i>
                    <!-- แสดงจำนวนแจ้งเตือน -->
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 12px;">
                        3
                    </span>
                </a>
            </li>
            <!-- ไอคอนโปรไฟล์ -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="padding: 0 15px;">
                    <i class="fas fa-user-circle" style="font-size: 28px; color: #001f4d; margin-right: 8px;"></i>
                    <span>โปรไฟล์</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                    <li><a class="dropdown-item" href="/profile">ดูโปรไฟล์</a></li>
                    <li><a class="dropdown-item" href="/settings">ตั้งค่า</a></li>
                    <li><hr class="dropdown-divider"></li>
                </ul>
            </li>
            <!-- ปุ่มออกจากระบบ -->
            <li class="nav-item">
                <button wire:click="logout" class="btn" style="background-color: transparent; border: none; padding: 0; margin-left: 10px;">
                    <i class="fas fa-sign-out-alt" style="font-size: 24px; color: #001f4d;"></i>
                </button>
            </li>
            
        </ul>
        @endauth
    </nav>

    <!-- Sidebar และ Main Content -->
    <div style="display: flex; margin-top: 75px;">
        <!-- Sidebar -->
        <div id="sidebar" style="background-color: #001f4d; width: 300px; height: 100%; position: fixed; top: 75px; left: 0; z-index: 1029; padding: 20px 0 0 30px; overflow-y: auto; color: white; font-size: 16px;">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link text-white" href="pm-home">หน้าแรก</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/pm-assign-work">มอบหมายงาน</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/pm-check-work">ตรวจสอบงาน</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/pm-all-project">โครงการทั้งหมด</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/pm-work-schedule">ตารางงาน</a>
                </li>
            </ul>
        </div>
    </div>
</div>
