@include('admin.includes.nav_bar', ['active' => 'blotters', 'title' => 'Blotters Management'])
<div class="container">
    <div class="row justify-content-between align-items-center">
        <div class="col-lg-6">

            <h5>Blotter Management</h5>
            @if (session('message'))
                <h6 style="margin-top: 20px;color:green">{{ session('message') }}</h6>
            @endif
        </div>
        <div class="col-lg-2">
            <a href="{{route('blotter.create')}}">
                <button class="btn-add-assets" data-bs-toggle="modal" data-bs-target="#addModal">Add new Blotter</button>
            </a>
        </div>
    </div>
</div>
<br>
<div class="container">
    <table id="table">
    </table>
</div>
<script>
    $(document).ready(function() {
        $('#table').DataTable();
    });
</script>
@include('admin.includes.footer');
