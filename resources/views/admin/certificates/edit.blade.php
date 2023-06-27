@include('admin.includes.nav_bar', ['active' => 'certificate', 'title' => 'Certificate Management'])
<div class="container">
    <div class="row justify-content-between align-items-center">
        <div class="col-lg-6">
            <h5>Modify Certficate</h5>
        </div>
    </div>
</div>
<br>
<div class="container">
    <div class="row justify-content-center">
        
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#table').DataTable();
    });
</script>
@include('admin.includes.footer');
