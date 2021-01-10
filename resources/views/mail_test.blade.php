<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row ">
        <div class="col-md-12 text-center">
            <img src="{{asset('barcut/img/logo.png')}}" style='width:12%;height:100%' alt="">
        </div>
        <div class="col-md-8 mx-auto mt-4 text-center  p-3">
            <h4>Dear username.</h4>
            <p>This is your Appointment Details.</p>
            <p><strong>Appointment date = appoint_date</strong></p>
            <p><strong>Appointment Time = appoint_time</strong></p>
            <p><strong>Shop Appointed = shop_appoint_name</strong></p>
            <!-- <p>Please Click on it and your registration will be completed successfully.</p> -->
            <!-- <a href="" style=''>CLick On it</a> -->
        </div>
    </div>
</div>
    
</body>
</html>



<!-- 'username'=>$data['appoint_user_name'],
                                    'usermail'=>$data['appoint_user_email'],
                                    'appoint_date'=>$date['appoint_date'],
                                    'appoint_time'=>$date['appoint_time'],
                                    'shop_appoint_name',$data['shop_appoint_name'],); -->






                                    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/redmond/jquery-ui.css"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>






<!-- 

var disabledDates = ['15/4/2020','16/4/2020', '17/4/2020','18/4/2020'];
	// var disabledDates = ["2015-11-28","2015-11-14","2015-11-21"];
	$(function () {
		$("#datepicker").datepicker({ 
			beforeShowDay: function(date){
        var string = jQuery.datepicker.formatDate('dd-mm-yy', date);
        return [ disabledDates.indexOf(string) == -1 ]
    },
			autoclose: true, 
			todayHighlight: true,
			// beforeShowDay: function(date) {
			// 	var currentDate =
			// 	date.getDate() + '/' +
			// 	(date.getMonth() + 1) +
			// 	'/' + date.getFullYear();
			// 	// alert(currentDate)
			// 	return (enableDates.indexOf(currentDate) != 1)
			// }
		}).datepicker('update', new Date());
	});


// 	var array = ["18/10/2017", "19/10/2017"];
// $(function() {
//     $('#datepicker').datepicker({
//    			minDate: new Date(),
//         beforeShowDay: function (date) {
//         $thisDate = date.getDate() + "/" + (date.getMonth() + 1) + "/" + date.getFullYear();
//     var day = date.getDay();
//     if ($.inArray($thisDate, array) == -1&&day!=5&&day!=6) {
//         return [true, ""];
//     } else {
//         return [false, "", "Unavailable"];
//     }
// }
//     });

// });







// $('#datepicker').datepicker({
//   format: "dd/mm/yyyy",
//   autoclose: true,
//   beforeShowDay: function(date) {
//     var currentDate =
//       date.getDate() + '/' +
//       (date.getMonth() + 1) +
//       '/' + date.getFullYear();
//     return (enableDates.indexOf(currentDate) != -1)
//   }
// }); -->

