<x-guest-layout>
    {{-- <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form> --}}

  
    <div class="container">
        <div class="card p-4" style="margin-top: 100px;">
            <h2 class="text-center">Create an Account</h2>
            <p class="text-center text-light">Step <span id="step-number">1</span> of 3</p>
            <div class="progress mb-4">
                <div id="progress-bar" class="progress-bar bg-primary" style="width: 20%;"></div>
            </div>
            <form id="multi-step-form" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf
    
                <!-- Step 1: Contact Details -->
                <div class="form-step active">
                    <h4>Contact Details</h4>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter name" required autofocus value="{{ old('name') }}">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Matricule</label>
                        <input type="text" class="form-control" name="matricule" placeholder="Enter Matricule" required value="{{ old('matricule') }}">
                        @error('matricule')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Date of Birth</label>
                        <input type="date" class="form-control" name="date_of_birth" required value="{{ old('date_of_birth') }}">
                        @error('date_of_birth')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>School</label>
                        <input type="text" class="form-control" name="school" placeholder="Enter School" required value="{{ old('school') }}">
                        @error('school')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Department</label>
                        <input type="text" class="form-control" name="department" placeholder="Enter Department" required value="{{ old('department') }}">
                        @error('department')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
    
                <!-- Step 2: Personal Info -->
                <div class="form-step">
                    <h4>Personal Info</h4>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter Email" required value="{{ old('email') }}">
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter Password" required>
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
    
                <!-- Step 3: Upload Images -->
                <div class="form-step">
                    <h4>Upload Images</h4>
                    <div class="form-group">
                        <label>Upload ID Card Photo</label>
                        <input type="file" class="form-control" name="id_card" required>
                        @error('id_card')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Upload School Resit Photo</label>
                        <input type="file" class="form-control" name="school_resit" required>
                        @error('school_resit')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit" id="submit-btn" class="btn btn-success">Submit</button>
                </div>
    
                <!-- Navigation Buttons -->
                <div class="d-flex justify-content-between mt-3">
                    <button type="button" id="prev-btn" class="btn btn-secondary" disabled>Previous</button>
                    <button type="button" id="next-btn" class="btn btn-primary">Next</button>
                </div>
            </form>
    
            <p class="text-center mt-3">
                Already registered? <a href="{{ route('login') }}">Login here</a>
            </p>
        </div>
    </div>
    



</x-guest-layout>
