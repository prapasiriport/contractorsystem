<div class="card offset-3 col-6 shadow-lg mt-5 border-0 rounded-3">
    <h5 class="card-header bg-gradient text-black text-center py-3 mt-0" style="background: linear-gradient(45deg, #6a11cb, #2575fc);">
        <i class="bi bi-person-fill"></i> รายละเอียด
    </h5>
        <div class="card-body">
            <div class="row">
                <!-- Row 1: Role, Username, Email, Prefix -->
                <h6 class="col-12 mt-3 mb-3 text-primary"><strong>ข้อมูลส่วนบุคคล</strong></h6>
                <div class="col-md-6">
                    <div class="mb-3">
                        <strong>Role:</strong> {{ $getRecord->role }}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <strong>Username:</strong> {{ $getRecord->username }}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <strong>Email:</strong> <a href="mailto:{{ $getRecord->email }}" class="text-decoration-none text-dark">{{ $getRecord->email }}</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <strong>Prefix:</strong> {{ $getRecord->prefix }}
                    </div>
                </div>
    
                <!-- Row 2: First Name and Last Name -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <strong>First Name:</strong> {{ $getRecord->first_name }}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <strong>Last Name:</strong> {{ $getRecord->last_name }}
                    </div>
                </div>
    
                <!-- Heading for Company Details -->
                <h6 class="col-12 mt-4 mb-3 text-primary"><strong>ข้อมูลเกี่ยวกับบริษัท</strong></h6>
    
                <!-- Row 3: Company Name and Address -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <strong>Company Name:</strong> {{ $getRecord->company_name }}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <strong>Address:</strong> {{ $getRecord->address }}
                    </div>
                </div>
    
                <!-- Row 4: Street and Sub District -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <strong>Street:</strong> {{ $getRecord->street }}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <strong>Sub District:</strong> {{ $getRecord->sub_district }}
                    </div>
                </div>
    
                <!-- Row 5: District and Province -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <strong>District:</strong> {{ $getRecord->district }}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <strong>Province:</strong> {{ $getRecord->province }}
                    </div>
                </div>
    
                <!-- Row 6: Postal Code and Phone -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <strong>Postal Code:</strong> {{ $getRecord->postal_code }}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <strong>Phone:</strong> <a href="tel:{{ $getRecord->phone }}" class="text-decoration-none text-dark">{{ $getRecord->phone }}</a>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Back Button (cross icon) -->
        <a href="/admin-list-contractor" class="btn-close position-absolute top-0 end-0 m-3" aria-label="Close"></a>
    </div>