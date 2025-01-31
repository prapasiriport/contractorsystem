<div>
    <header class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h4">ตารางงาน</h1>
        <div>
            <button class="btn btn-secondary btn-sm" wire:click="changeMonth(-1)"><<</button>
            <span class="mx-2">{{ now()->setMonth($currentMonth)->format('F') }} {{ $currentYear }}</span>
            <button class="btn btn-secondary btn-sm" wire:click="changeMonth(1)">>></button>
        </div>
    </header>

    <table class="table table-bordered calendar">
        <thead>
            <tr>
                <th>วันอาทิตย์</th>
                <th>วันจันทร์</th>
                <th>วันอังคาร</th>
                <th>วันพุธ</th>
                <th>วันพฤหัสบดี</th>
                <th>วันศุกร์</th>
                <th>วันเสาร์</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($calendar as $week)
            <tr>
                @foreach ($week as $day)
                <td class="{{ in_array($day['date'], $selectedDates) ? 'bg-warning' : ($day['status'] === 'green' ? 'bg-success text-white' : ($day['status'] === 'red' ? 'bg-danger text-white' : '')) }}"
                    wire:click="selectDate({{ $day['date'] }})"
                    style="cursor: pointer;">
                    {{ $day['date'] }}
                </td>
                @endforeach
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        <p>วันที่ที่เลือก: {{ implode(', ', $selectedDates) }}</p>
        <button class="btn btn-success btn-sm" wire:click="setPendingStatus('green')">วันว่าง</button>
        <button class="btn btn-danger btn-sm" wire:click="setPendingStatus('red')">ไม่ว่าง</button>
        <button class="btn btn-primary btn-sm" wire:click="confirmSelection">ยืนยัน</button> <!-- ปุ่มยืนยันที่ไม่มีการรีเซ็ต -->
    </div>
</div>
