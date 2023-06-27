@include('admin.includes.nav_bar', ['active' => 'blotters', 'title' => 'Blotters Management'])
<style>
    /* Custom CSS to remove table border in Summernote */
</style>
<div class="container">
    <div class="row justify-content-between align-items-center">
        <div class="col-lg-6">
            <h5>Create Certificate</h5>
        </div>
    </div>
</div>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form action="{{ route('certificate.store') }}" method="POST">
                @csrf
                <div class="col-12">
                    <label for="image-title" class="form-label">Content:</label>
                    <div id="summernote" style="background-color:red">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
    $(document).ready(function() {

        $("iframe").width("100%");
    });
    const fontList = [];
    for (let index = 0; index <= 149; index++) {
        fontList[index] = (index + 1).toString();
    }
    $('#summernote').summernote({
        blockquoteBreakingLevel: 2,
        disableDragAndDrop: true,
        placeholder: 'Type news content here...',
        tabsize: 2,
        height: 500,
        fontSizes: fontList,
        toolbar: [
            ['style', ['style']],
            ['table', ['table']],
            ['fontname', ['fontname']],
            ['fontsize', ['fontsize']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['insert', ['link', 'picture', 'video']],
            ['height', ['height']]
        ],

        tableResizable: true,

    });
    $('#summernote').summernote('code', '');

    $(document).ready(function() {
        $('.table').css('border', 'none');
    });
</script>
@include('admin.includes.footer');
