    <!-- BEGIN: Footer-->
<!-- <footer class="footer footer-static footer-light">
        <p class="clearfix mb-0"><span class="float-md-start d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2022
        <a class="ms-25" href="https://instagram.com/socialclimb.id" target="_blank">SOCIALCLIMB.ID</a></span>
        <span class="float-md-end d-none d-md-block">Made by SCLIMB TEAM with<i data-feather="heart"></i> </span></p>
    </footer> -->
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <!-- END: Footer-->

    <?php if($this->session->flashdata('sweetalert')) { 
        $pesan = $this->session->flashdata('sweetalert');
        echo '<script type="text/javascript">
            $(document).ready(function(){
                var title = "'.$pesan['title'].'";
                var text = "'.$pesan['text'].'";
                var icon = "'.$pesan['icon'].'";
                Swal.fire({
                    title: title,
                    text: text,
                    icon: icon,
                    showConfirmButton: false,
                    timer: 3000,
                    showClass: {
                        popup: "animate__animated animate__bounceIn"
                    },
                });
            }); 
        </script>';
    } ?>

    <?php if($this->session->flashdata('direct')) { 
        echo '<span id="waktu" style="visibility: hidden;">3</span>
              <script type="text/javascript">
                    window.setInterval(function () {
                        var sisawaktu = $("#waktu").html();
                        sisawaktu = eval(sisawaktu);
                        if (sisawaktu == 0) {
                            location.replace("'.$this->session->flashdata('direct').'");
                        } else {
                            $("#waktu").html(sisawaktu - 1);
                        }
                    }, 1000);
              </script>';
    } ?>

    <!-- BEGIN: Vendor JS-->
    <script src="<?= base_url() ?>app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="<?= base_url() ?>app-assets/vendors/js/charts/apexcharts.min.js"></script>
    <script src="<?= base_url() ?>app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="<?= base_url() ?>app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js"></script>
    <script src="<?= base_url() ?>app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>
    <script src="<?= base_url() ?>app-assets/vendors/js/tables/datatable/responsive.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js"></script>
    <script src="<?= base_url() ?>app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
    <script src="<?= base_url() ?>app-assets/vendors/js/tables/datatable/jszip.min.js"></script>
    <script src="<?= base_url() ?>app-assets/vendors/js/tables/datatable/pdfmake.min.js"></script>
    <script src="<?= base_url() ?>app-assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
    <script src="<?= base_url() ?>app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
    <script src="<?= base_url() ?>app-assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
    <script src="<?= base_url() ?>app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js"></script>
    <script src="<?= base_url() ?>app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>
    <script src="<?= base_url() ?>app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
    <script src="<?= base_url() ?>app-assets/vendors/js/extensions/polyfill.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="<?= base_url() ?>app-assets/js/core/app-menu.js"></script>
    <script src="<?= base_url() ?>app-assets/js/core/app.js"></script>
	<script src="<?= base_url() ?>app-assets/js/scripts/pages/app-invoice.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="<?= base_url() ?>app-assets/js/scripts/cards/card-statistics.js"></script>
    <script src="<?= base_url() ?>app-assets/js/scripts/cards/card-analytics.js"></script>
    <script src="<?= base_url() ?>app-assets/js/scripts/forms/form-select2.js"></script>
    <script src="<?= base_url() ?>app-assets/js/scripts/cards/card-advance.js"></script>
    <script src="<?= base_url() ?>app-assets/js/scripts/components/components-accordion.js"></script>
    <script src="<?= base_url() ?>app-assets/js/scripts/extensions/ext-component-sweet-alerts.js"></script>
    <!-- END: Page JS-->

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>

    <script>
        $('.form-check-input').on('click', function() {
            const menuId = $(this).data('menu');
            const roleId = $(this).data('role');
            $.ajax({
                url: "<?= base_url('admin/changeaccess'); ?>",
                type: 'post',
                data: {
                    menuId: menuId,
                    roleId: roleId
                },
                success: function() {
                    document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId
                }
            });

        });

        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });
    </script>
</body>
<!-- END: Body-->

</html>