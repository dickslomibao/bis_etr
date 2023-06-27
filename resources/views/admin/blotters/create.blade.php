@include('admin.includes.nav_bar', ['active' => 'blotters', 'title' => 'Blotters Management'])
<div class="container">
    <div class="row justify-content-between align-items-center">
        <div class="col-lg-6">
            <h5>Create Blotter</h5>
        </div>
    </div>
</div>
<br>
<div class="container">
   
</div>
<script>
    $(document).ready(function() {
        $('#table').DataTable();
    });
</script>
@include('admin.includes.footer');
