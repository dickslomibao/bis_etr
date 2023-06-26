{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap');
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/css/register.css">
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">

            <div class="col-lg-6">
                <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="firstname" class="form-label">Firstname</label>
                                <input required="text" value="{{old('firstname')}}" name="firstname" class="form-control" id="firstname">
                                @error('firstname')
                                    <div class="form-text">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="middlename" class="form-label">Middlename(optional)</label>
                                <input required type="text" value="{{old('middlename')}}" name="middlename" class="form-control" id="middlename">
                            </div>

                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="lastname" class="form-label">Lastname</label>
                                <input required type="text" value="{{old('lastname')}}" name="lastname" class="form-control" id="lastname">
                                @error('lastname')
                                    <div class="form-text">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="gender" class="form-label">Gender</label>
                                <select required class="form-select" name="gender" aria-label="Default select example">
                                    <option  value="">Select gender</option>
                                    <option  {{old('gender') == "Male" ? "selected" : ""}} value="Male">Male</option>
                                    <option  {{old('gender') == "Female" ? "selected" : ""}} value="Female">Female</option>
                                </select>
                                @error('gender')
                                    <div class="form-text">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="birthdate" class="form-label">Birthdate:</label>
                                <input required type="date" value="{{old('birthdate')}}" name="birthdate" class="form-control" id="birthdate">
                                @error('birthdate')
                                    <div class="form-text">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input required type="email" value="{{old('email')}}" name="email" class="form-control" id="email">
                                @error('email')
                                    <div class="form-text">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="password" class="form-label">Password:</label>
                                <input required type="password" name="password" class="form-control" id="password">
                                @error('password')
                                    <div class="form-text">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Comfirm Password:</label>
                                <input required type="password" name="password_confirmation" class="form-control"
                                    id="password_confirmation">
                                @error('password_confirmation')
                                    <div class="form-text">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="file" class="form-label">Profile Picture:</label>
                                <input required type="file" value="{{old('file')}}" name="file" class="form-control" id="file">
                                @error('file')
                                    <div class="form-text">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
