
$(document).ready(function() {
	$("#zrun").click(function(){
            //$.get("test.ss", function(data, status){
            //alert("Data: " + data + "\nStatus: " + status);
        //});
        alert("zahid 1 here , hi Awais");
			//function test()
			 {
			             
             
                 var xhttp = new XMLHttpRequest();

                 xhttp.onreadystatechange = function () {
						
					

                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                      


                        var aResponce =JSON.parse(xhttp.responseText);
                        alert(JSON.stringify(aResponce.headers));
                       
                		alert("zahid 2 here , hi Awais");

                     }
                 }

                xhttp.open('POST', 'test.ss', true);
                xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhttp.send();


             }
test2();
     });
	test();
	
});

     function test() {

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {

                if (xhttp.readyState == 4 && xhttp.status == 200) {
                  
                    var aResponce =xhttp.responseText;
                    alert(JSON.stringify(aResponce));
                  
                  alert("zahid here , hi Awais");
                }
            }

            xhttp.open('GET', 'test.ss', true);
            xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            //xhttp.setRequestHeader('function', '1');
            xhttp.send();
        }


        function test2() {

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {

                if (xhttp.readyState == 4 && xhttp.status == 200) {
                  
                   // var aResponce =xhttp.responseText;
                   // alert(JSON.stringify(aResponce));
                  
                    //var aResponce =JSON.parse(xhttp.responseText);
                   var aResponce =xhttp.responseText;
                    alert(JSON.stringify(aResponce));
                   
            		alert("zahid 2 here , hi Awais");
                }
            }

            xhttp.open('POST', 'test.ss', true);
            xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            //xhttp.setRequestHeader('function', '1');
            xhttp.send();
        }





        // if ( == ) {
                  
                   
        //     alert("zahid get ");
        // }