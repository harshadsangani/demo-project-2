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
                                        <h5>Staff_List</h5>

                                    </div>
                                    <div class="main-body">
                                        <div class="page-wrapper">

                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="card">

                                                        <div class="card-block">
                                                            <table class="table" name="tb1">
                                                                <thead class="thead-dark">
                                                                    <tr>

                                                                        <th scope="col">user_name</th>
                                                                        <th scope="col">user _password</th>

                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                    <?php  
                        
                                                                        foreach ($getdata as $tablerow)  
                                                                            {  
                                                                                ?><tr>
                                                                        <td><?php echo $tablerow->empid;?></td>
                                                                        <td><?php echo $tablerow->emppass;?></td>

                                                                    </tr>
                                                                    <?php }  
                            ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>