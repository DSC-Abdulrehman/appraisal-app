
<?php 
include 'connect.php';  
$supervisor=2;

if (isset($_GET['user'])) {
    $user=$_GET['user'];
}
  
$get_emp1 = "SELECT * FROM employee_record WHERE emp_team_lead='$user' OR employee_supervisor_id = '$user' OR emp_manager = '$user'";
    $run_emp1 = mysqli_query($link, $get_emp1);
      while ($emp1_row=mysqli_fetch_array($run_emp1)) 
    {
      $supervisor=1;
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>DSC-Employee Center</title>
</head>
<?php include 'header.php';?>
<body>
<div class="">
	<?php 
  
  if ($user=="DSC-002") {
    include 'center/sidebar_hr.php';
  }else if ($user=="DSC-011" OR $user=="DSC-020" OR $user=="DSC-026" OR $user=="DSC-038") {
    include 'center/sidebar_sup.php';
  }else {
    include 'sidebar.php';
  } 


  ?>

	
<div class="card_panel">
   <div class="col-md-7" style="margin-top: 10px;">
  
 
      <div class="row"><img src="images/calendar.jpg" style="width: 100%; height: 50vh"></div>
       </div>      
      </div>
<div class="col-md-3 marqeeDiv">
	<?php include 'marquee_title.php';?>
  
</div>
</div>
<?php include 'footer.php';?>
</body>

<Script>
	  $('.carousel .vertical .item').each(function(){
  var next = $(this).next();
  if (!next.length) {
    next = $(this).siblings(':first');
  }
  next.children(':first-child').clone().appendTo($(this));
  
  for (var i=1;i<2;i++) {
    next=next.next();
    if (!next.length) {
    	next = $(this).siblings(':first');
  	}
    
    next.children(':first-child').clone().appendTo($(this));
  }
});
	  </script>
	  <script type="text/javascript">
	jQuery.fn.extend({
        pic_scroll:function (){
            $(this).each(function(){
                var _this=$(this);
                var ul=_this.find("ul");
                var li=ul.find("li");
                var w=li.size()*li.outerHeight();
                li.clone().prependTo(ul);
                ul.width(2*w);
                var i=1,l;
                _this.hover(function(){i=0},function(){i=1});
                function autoScroll(){
                	l = _this.scrollTop();
                	if(l>=w){
                		_this.scrollTop(0);
                	}else{
                		_this.scrollTop(l + i);
                	}
                }
                var scrolling = setInterval(autoScroll,5);
            })
        }
    });
	$(function(){

		$(".a").pic_scroll();

	})

	</script>
</html>