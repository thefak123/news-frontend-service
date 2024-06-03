<div>
    <form>
        <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
            <p class="lead fw-bold mb-0 me-3 fs-2 ">Sign in</p>
           
        </div>
     
        <!-- Email input -->
        <div class="form-outline mb-4 mt-5">
            <label class="form-label" for="form3Example3">Email address</label>
            <input type="email" id="form3Example3" wire:model="email" class="form-control form-control-lg" placeholder="Enter a valid email address" />
            
        </div>
        <!-- Password input -->
        <div class="form-outline mb-3">
            <label class="form-label" for="form3Example4">Password</label>
            <input type="password" id="form3Example4" wire:model="password" class="form-control form-control-lg" placeholder="Enter password" />
            
        </div>
       
        <div class="text-center text-lg-start mt-4 pt-2">
            <button type="button" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;" wire:click="login">Login</button>
            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="{{route('register')}}" class="link-danger">Register</a></p>
        </div>
    </form>
    @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
</div>
