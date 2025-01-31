<div>
    <div class="container-fluid">
        <div class="card" style="width: 1608px; height: calc(100vh - 80px); position: fixed; top: 79px; left: 303px; z-index: 1029; padding: 20px; overflow-y: auto;">
            <div class="workspace" style="display: flex; justify-content: center; align-items: center; gap: 10px; padding: 20px; margin-top: 50px;">
                <!-- Card โครงการ 1 -->
                <div class="card" id="project1" style="width: 60%; height: 100px; border: 1px solid #ddd; border-radius: 8px; padding: 40px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); text-align: left; cursor: pointer;">
                    <h4>saleโครงการ 1</h4>
                </div>
                
                <!-- Card โครงการ 2 -->
                <div class="card" style="width: 30%; height: 100px; border: 1px solid #ddd; border-radius: 8px; padding: 40px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); text-align: center;">
                    <h4>โครงการ 2</h4>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal (Popup Window) -->
    <div id="modal" style="display: none; position: fixed; top: 20%; left: 10%; width: 80%; height: 60%; z-index: 1030; align-items: center; justify-content: center;">
        <div style="height: auto; width: 100%; max-width: 800px; background: white; padding: 40px; border-radius: 12px; position: relative; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
            <button id="closeModal" style="position: absolute; top: 15px; right: 20px; background: transparent; border: none; font-size: 40px; cursor: pointer;">&times;</button>
            <h3 style="font-size: 24px; margin-top: 30px; text-align: left;">รายละเอียดโครงการ 1</h3>
            <p style="font-size: 18px; margin-top: 20px; text-align: justify;">นี่คือรายละเอียดเพิ่มเติมของโครงการ 1...</p>
        </div>
    </div>
</div>

<script>
    // เปิด Modal
    document.getElementById('project1').addEventListener('click', function () {
        document.getElementById('modal').style.display = 'flex';
    });

    // ปิด Modal
    document.getElementById('closeModal').addEventListener('click', function () {
        document.getElementById('modal').style.display = 'none';
    });
</script>
