<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?= base_url('assets/template/adminlte') ?>/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url('assets/template/adminlte') ?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="<?= base_url('assets/template/adminlte') ?>/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="<?= base_url('assets/template/adminlte') ?>/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?= base_url('assets/template/adminlte') ?>/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?= base_url('assets/template/adminlte') ?>/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="<?= base_url('assets/template/adminlte') ?>/bower_components/moment/min/moment.min.js"></script>
<script src="<?= base_url('assets/template/adminlte') ?>/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="<?= base_url('assets/template/adminlte') ?>/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="<?= base_url('assets/template/adminlte') ?>/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="<?= base_url('assets/template/adminlte') ?>/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll -->
<script src="<?= base_url('assets/template/adminlte') ?>/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="<?= base_url('assets/template/adminlte') ?>/plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url('assets/template/adminlte') ?>/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/template/adminlte') ?>/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/template/adminlte') ?>/dist/js/demo.js"></script>
<!-- Page script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, locale: { format: 'MM/DD/YYYY hh:mm A' }})
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDK0Wk9CEkyOK4MtWPFkzvhBmxly_5TpU0&amp;libraries=places&v=3.41"></script> 
    <script type="text/javascript">
        google.maps.event.addDomListener(window, 'load', function () {
        var places = new google.maps.places.Autocomplete(document.getElementById('pickup'));
            google.maps.event.addListener(places, 'place_changed', function () {
            var place = places.getPlace();
            var address = place.formatted_address;
            var latitudeLongitude = place.geometry.location;
            var mesg = "Address: " + address;
                mesg += "\nLatitudeLongitude: " + latitudeLongitude;

            $('#tempo1').val(latitudeLongitude);
            var ambildata = $('#tempo1').val();
            var pisah     = ambildata.split(",");
             
            var str1 = pisah[0];
            var lat = str1.replace("(", "");

            var str2 = pisah[1];
            var lon = str2.replace(")", "");

            var str3 = lon;
            var long = str3.replace(" ", "");

            $('#lat1').val(lat);
            $('#lng1').val(long);
            hitung_jarak();
        });
      });
    </script>
    <script type="text/javascript">
        google.maps.event.addDomListener(window, 'load', function () {
        var places = new google.maps.places.Autocomplete(document.getElementById('destination'));
            google.maps.event.addListener(places, 'place_changed', function () {
            var place = places.getPlace();
            var address = place.formatted_address;
            var latitudeLongitude = place.geometry.location;
            var mesg = "Address: " + address;
                mesg += "\nLatitudeLongitude: " + latitudeLongitude;

            $('#tempo2').val(latitudeLongitude);
            var ambildata = $('#tempo2').val();
            var pisah     = ambildata.split(",");
             
            var str1 = pisah[0];
            var lat = str1.replace("(", "");

            var str2 = pisah[1];
            var lon = str2.replace(")", "");

            var str3 = lon;
            var long = str3.replace(" ", "");

            $('#lat2').val(lat);
            $('#lng2').val(long);
            hitung_jarak();
        });
      });
    </script>
     <script>
        getLocation();
        var x = document.getElementById("demo");
        function getLocation() {
          if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
          } else {
            x.innerHTML = "Geolocation is not supported by this browser.";
          }
        }

        function showPosition(position) {
          //x.innerHTML = "Latitude: " + position.coords.latitude + "<br>Longitude: " + position.coords.longitude;

            $('#lat1').val(position.coords.latitude);
            $('#lng1').val(position.coords.longitude);
            $('#lat2').val(position.coords.latitude);
            $('#lng2').val(position.coords.longitude);
            hitung_jarak();
        }
        </script> 
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <script type="text/javascript">
        
        function hitung_jarak(){
            var lat1 = document.getElementById('lat1').value;
            var lng1 = document.getElementById('lng1').value;
            var lat2 = document.getElementById('lat2').value;
            var lng2 = document.getElementById('lng2').value;
           $.ajax({
              url:'<?= base_url() ?>spd/hitung_jarak',
              type:'POST',
              async:false,
              data:{
                lat1:lat1,
                lng1:lng1,
                lat2:lat2,
                lng2:lng2,
              },
              success:function(data){
                document.getElementById('jarak').value = data+' Km';
              }
            });
        }
    </script>

    <script src="<?= base_url('assets/vendor/timepicker') ?>/jquery.datetimepicker.full.min.js"></script>
    <script  type="text/javascript">
        jQuery('#timedeparture').datetimepicker();
        jQuery('#timeback').datetimepicker();
    </script>
</body>
</html>
