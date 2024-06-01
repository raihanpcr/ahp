<!--   Core JS Files   -->
<script src="assets/template/js/core/jquery.min.js"></script>
<script src="assets/template/js/core/popper.min.js"></script>
<script src="assets/template/js/core/bootstrap-material-design.min.js"></script>
<script src="assets/template/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!-- Plugin for the momentJs  -->
<script src="assets/template/js/plugins/moment.min.js"></script>
<!--  Plugin for Sweet Alert -->
<script src="assets/template/js/plugins/sweetalert2.js"></script>
<!-- Forms Validations Plugin -->
<script src="assets/template/js/plugins/jquery.validate.min.js"></script>
<!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="assets/template/js/plugins/jquery.bootstrap-wizard.js"></script>
<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="assets/template/js/plugins/bootstrap-selectpicker.js"></script>
<!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
<script src="assets/template/js/plugins/bootstrap-datetimepicker.min.js"></script>
<!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<script src="assets/template/js/plugins/bootstrap-tagsinput.js"></script>
<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="assets/template/js/plugins/jasny-bootstrap.min.js"></script>
<!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
<script src="assets/template/js/plugins/fullcalendar.min.js"></script>
<!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
<script src="assets/template/js/plugins/jquery-jvectormap.js"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="assets/template/js/plugins/nouislider.min.js"></script>
<!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
<!-- Library for adding dinamically elements -->
<script src="assets/template/js/plugins/arrive.min.js"></script>
<!-- Chartist JS -->
<script src="assets/template/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="assets/template/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="assets/template/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
<script>
      function periode() {

            var chart = new CanvasJS.Chart("chartContainer", {
                  animationEnabled: true,
                  theme: "light2", // "light1", "light2", "dark1", "dark2"
                  title: {
                        text: "Ranking"
                  },
                  axisY: {
                        title: "ranking"
                  },
                  data: [{
                        type: "column",
                        showInLegend: true,
                        legendMarkerColor: "grey",
                        legendText: "Nama Guru",
                        dataPoints: <?php echo json_encode(showRankingDiagram(), JSON_NUMERIC_CHECK); ?>
                  }]
            });
            chart.render();
      }

      window.onload = periode();
</script>