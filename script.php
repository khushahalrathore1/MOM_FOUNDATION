<script>
      var isRTL = JSON.parse(localStorage.getItem('isRTL'));
      if (isRTL) {
        var linkDefault = document.getElementById('style-default');
        var userLinkDefault = document.getElementById('user-style-default');
        linkDefault.setAttribute('disabled', true);
        userLinkDefault.setAttribute('disabled', true);
        document.querySelector('html').setAttribute('dir', 'rtl');
      } else {
        var linkRTL = document.getElementById('style-rtl');
        var userLinkRTL = document.getElementById('user-style-rtl');
        linkRTL.setAttribute('disabled', true);
        userLinkRTL.setAttribute('disabled', true);
      }
    </script>
    <script src="vendors/popper/popper.min.js"></script>
    <script src="vendors/bootstrap/bootstrap.min.js"></script>
    <script src="vendors/anchorjs/anchor.min.js"></script>
    <script src="vendors/is/is.min.js"></script>
    <script src="vendors/glightbox/glightbox.min.js"> </script>
    <script src="vendors/flatpickr/flatpickr.min.js"></script>
    <script src="vendors/echarts/echarts.min.js"></script>
    <script src="assets/data/world.js"></script>
    <script src="vendors/plyr/plyr.polyfilled.min.js"> </script>
    <script src="vendors/countup/countUp.umd.js"></script>
    <script src="vendors/chart/chart.umd.js"></script>
    <script src="vendors/dropzone/dropzone-min.js"></script>
    <script src="vendors/leaflet/leaflet.js"></script>
    <script src="vendors/leaflet.markercluster/leaflet.markercluster.js"></script>
    <script src="vendors/leaflet.tilelayer.colorfilter/leaflet-tilelayer-colorfilter.min.js"></script>
    <script src="vendors/list.js/list.min.js"></script>
    <script src="vendors/tinymce/tinymce.min.js"></script>
    <script src="vendors/dayjs/dayjs.min.js"></script>
    <script src="vendors/fullcalendar/index.global.min.js"></script>
    <script src="vendors/d3/d3.min.js"></script>
    <script src="vendors/fontawesome/all.min.js"></script>
    <script src="vendors/lodash/lodash.min.js"></script>

    <script src="assets/js/theme.js"></script>
    <script src="../../vendors/prism/prism.js"></script>
    <script src="../../vendors/fontawesome/all.min.js"></script>
    <script src="../../vendors/list.js/list.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php require('customization.php');  ?>