<div class="loader-bg">
    <div class="loader-track">
        <div class="loader-fill"></div>
    </div>
</div>
<!-- [ Pre-loader ] End -->

<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <!-- [ breadcrumb ] start -->
                <div class="page-header">
                    <div class="page-block">
                        <div class="row align-items-center">
                            <div class="col-md-12">


                            </div>
                        </div>
                    </div>
                </div>
                <!-- [ breadcrumb ] end -->
                <div class="main-body">
                    <div class="page-wrapper">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Upload your image here</h5>

                                    </div>
                                    <div class="main-body">
                                        <div class="page-wrapper">

                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="card">

                                                        <div class="card-block">
                                                            <div style="width: 80%; margin: auto;">
                                                                <form id="uploadform" action=""
                                                                    enctype="multipart/form-data">
                                                                    <input type="file" name="imageupload"
                                                                        id="imageupload">
                                                                    <button type="submit">upload</button>

                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- jquery cdn -->
                                    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"
                                        type="text/javascript"></script>
                                    <!-- ajax -->

                                    <script type="text/javascript">
                                    $(document).ready(function(e) {
                                        $('#uploadform').on('submit', function(e) {
                                            e.preventDefault();
                                            var formData = new FormData(this)
                                            // console.log(formData);
                                            // return false;

                                            $.ajax({
                                                url: "<?php echo base_url('Login_Controller/uploadimage');?>",
                                                type: 'POST',
                                                data: formData,
                                                contentType: false,
                                                cache: false,
                                                processData: false,
                                                dataType: 'json',
                                            })
                                        })
                                    })
                                    </script>