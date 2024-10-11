$(document).ready(function() {

    $('.mytables').DataTable({
    	 searching : false, 
    	 paging	   : false,
    	 info      : false,
    	 "sScrollX": false 
    });

    $('input,select').addClass('form-control-sm');

$( ".edatepicker").datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'dd MM yy',
        //onSelect: function(){
          // var value = this.value;
          // alert(value);
       //}
    });

    $( ".datepicker").datepicker({
    	changeMonth: true,
    	changeYear: true,
        //minDate: new Date(),
        // maxDate: new Date(new Date().setMonth(new Date().getMonth() + 0)),
        /* if you want to disable all previous past and future months means if you want to show only current month then use the above two line code by uncommenting this and comment the below line   */
       
        maxDate: "+0m",
        dateFormat: 'MM yy',
        onSelect: function(){
            var value = this.value;
            alert(value);
        }
    });

    $('.timepicker').timepicker({
    	dropdown: true,
    	scrollbar: true,
    	dynamic: true
    });

    $('#employees_report_table').DataTable({
    //"bProcessing": true,
    //"bServerSide": true,
    //"sAjaxSource": "employees_report.php",
		 paging : true,
		 info : true 	  
    });

    $('#salaries_report_table').DataTable({
         paging : true,
         info : true,     
    });

    $('#payroll_history_report_table').DataTable({
         paging : true,
         info : true,     
    });

     // $("#run").click(function(){
     //        $.get("test.ss", function(data, status){
     //        alert("Data: " + data + "\nStatus: " + status);
     //    });
     // });

    //test();
});

    // function makeDynamic(){
    //     var xhr = new XMLHttpRequest();
    //     xhr.open('POST', 'dynamic_tiles.ss', true);
    //     xhr.onload = function(e){
    //         if (this.readyState == 4 && this.status == 200) {
    //             console.log(xhr.responseText);
    //         }
    //         else{
    //             console.error(xhr.statusText);
    //         }
    //     };

    //     xhr.onerror = function(e){
    //         console.error(xhr.statusText);
    //     }
    //     xhr.send();
    // }

                