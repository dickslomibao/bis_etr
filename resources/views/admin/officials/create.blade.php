@include('admin.includes.nav_bar', ['active' => 'officials', 'title' => 'Officials Management'])
<div class="container">
    <div class="row justify-content-between align-items-center">
        <div class="col-lg-6">
            <h5>Add new Officials</h5>
        </div>
        {{-- <div class="col-lg-2">
            <a href="">
                <button class="btn-add-assets" data-bs-toggle="modal" data-bs-target="#addModal">Create Post</button>
            </a>
        </div> --}}
    </div>
</div>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form action="{{ route('officials.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="firstname">First Name</label>
                            <input type="text" class="form-control" id="firstname" name="firstname"
                                placeholder="Enter your first name" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="middlename">Middle Name</label>
                            <input type="text" class="form-control" id="middlename" name="middlename"
                                placeholder="Enter your middle name" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="lastname">Last Name</label>
                            <input type="text" class="form-control" id="lastname" name="lastname"
                                placeholder="Enter your last name" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="position">Position</label>
                            <select class="form-control" id="position" name="position" required>
                                <option value="" selected disabled>Select a position</option>

                                @foreach (Helper::getPositions() as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="term_start">Term Start</label>
                            <input type="date" class="form-control" id="term_start" name="term_start" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="term_end">Term End</label>
                            <input type="date" class="form-control" id="term_end" name="term_end" required>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

@include('admin.includes.footer');
