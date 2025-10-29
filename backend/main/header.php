<div class="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="float-left">
                    <div class="hamburger sidebar-toggle">
                        <span class="line"></span>
                        <span class="line"></span>
                        <span class="line"></span>
                    </div>
                </div>
                <div class="float-right">
                    <div class="dropdown dib">
                        <div class="header-icon" data-toggle="dropdown">
                            <span class="user-avatar"><?php echo $row['level']; ?>
                                <i class="ti-angle-down f-s-10"></i>
                            </span>
                            <div class="drop-down dropdown-profile dropdown-menu dropdown-menu-right">
                                
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="" onclick="show()">
                                                <i class="ti-power-off"></i>
                                                <span>Logout</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            
                    </div>
                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function show() {
        swal({
                title: "Apakah yakin?",
                text: "anda akan keluar",
                type: "info",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                cancelButtonClass: "btn-danger",
                confirmButtonText: "Iya",
                cancelButtonText: "Tidak",
                closeOnConfirm: false,
                closeOnCancel: true
            }, function (isConfirm) {
                if (isConfirm) {
                    window.location.href="logout.php";
                }
            });   
        }
        // alert('tes');
        // window.location='logout.php';
    // }
</script>




