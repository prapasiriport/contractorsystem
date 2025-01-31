<div class="card col-12 col-sm-8 col-md-6 col-lg-4 mx-auto mt-5 shadow-lg rounded">
    <div class="card-header text-black text-left">
        <h4>Login</h4>
    </div>

    <div class="card-body">
        <form wire:submit="loginUser">
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input wire:model="email" type="email" class="form-control">
                <div>
                    @error('email')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input wire:model="password" type="password" class="form-control">
                <div>
                    @error('password')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
