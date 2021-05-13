<doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Laravel </title>
	<link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{asset('source/assets/dest/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('source/assets/dest/vendors/colorbox/example3/colorbox.css')}}">
	<link rel="stylesheet" href="{{asset('source/assets/dest/rs-plugin/css/settings.css')}}">
	<link rel="stylesheet" href="{{asset('source/assets/dest/rs-plugin/css/responsive.css')}}">
	<link rel="stylesheet" title="style" href="{{asset('source/assets/dest/css/style.css')}}">
	<link rel="stylesheet" href="{{asset('source/assets/dest/css/animate.css')}}">
	<link rel="stylesheet" title="style" href="{{asset('source/assets/dest/css/huong-style.css')}}">
	<!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
	@yield('css')
</head>
<body>
@include('layouts/header')
@yield('banner')
@yield('content')
@include('layouts/footer')
	<!-- include js files -->
	<script src="{{asset('source/assets/dest/js/jquery-1.12.3.min.js')}}"></script>
	<script src="{{asset('source/assets/dest/js/jquery.js')}}"></script>
	<script src="{{asset('source/assets/dest/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js')}}"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	<script src="{{asset('source/assets/dest/vendors/bxslider/jquery.bxslider.min.js')}}"></script>
	<script src="{{asset('source/assets/dest/vendors/colorbox/jquery.colorbox-min.js')}}"></script>
	<script src="{{asset('source/assets/dest/vendors/animo/Animo.js')}}"></script>
	<script src="{{asset('source/assets/dest/vendors/dug/dug.js')}}"></script>
	<script src="{{asset('source/assets/dest/js/scripts.min.js')}}"></script>
	<script src="{{asset('source/assets/dest/rs-plugin/js/jquery.themepunch.tools.min.js')}}"></script>
	<script src="{{asset('source/assets/dest/rs-plugin/js/jquery.themepunch.revolution.min.js')}}"></script>
	<script src="{{asset('source/assets/dest/js/waypoints.min.js')}}"></script>
	<script src="{{asset('source/assets/dest/js/wow.min.js')}}"></script>
	<!--customjs-->
	<script src="{{asset('source/assets/dest/js/custom2.js')}}"></script>
	<script>
	$(document).ready(function($) {    
		$(window).scroll(function(){
			if($(this).scrollTop()>150){
			$(".header-bottom").addClass('fixNav')
			}else{
				$(".header-bottom").removeClass('fixNav')
			}}
		)
	})
	</script>
<script type="text/javascript">
	 function addToCart(id) {
	 	var size  = $("#size").val();
	 	var color = $("#color").val();
	 	var num   = $("#number").val();
	 
		if(size=="" || color=="" || num=="")
		{
			alert("size, color or number can not emply");
		}
		else
		{
			var obj = 
			{
				'id': id,
				'size': size,
				'color': color,
				'num':num
			}
			var cartList = [];
			var json = getCookie('cart');
			if(json!="")
			{	
				cartList = JSON.parse(json);
		    }
		    var isFind = false;
		    for(i=0; i<cartList.length; i++)
		    {
		    	if(cartList[i].id==obj.id && cartList[i].size==obj.size && cartList[i].color==obj.color)
		    	{
		    		isFind = true;
		    		cartList[i].num = parseInt(cartList[i].num) 
		    		+ parseInt(obj.num);
		    		break;
		    	}
		    }
		    //if isFind khong tim thay thi add new product
		    if(!isFind)
		    {
		    	cartList.push(obj);
		    }
		    document.cookie = "cart="+JSON.stringify(cartList)+";path=/";
		}
		location.reload();
		
	}
	function updateToCart(id, color, size)
	{
		    var num = $('#number_'+id).val();
			var cartList = [];
			var json = getCookie('cart');
			if(json!="")
			{	
				cartList = JSON.parse(json);
		       index = -1;

		    for(i=0; i<cartList.length; i++)
		    {
		    	if(cartList[i].id==id && cartList[i].size==size && cartList[i].color==color )
		    	{
		    	    cartList[i].num = num;
		    		index = i;
		    		break;
		    	}
		    }
            if(num == 0)
            {
            	//xoa 1 phan tu
            	cartList.splice(i, 1);
            }
		    document.cookie = "cart="+JSON.stringify(cartList)+";path=/";
		    location.reload();
		 }
	}
	function getCookie(cname) {
	  var name = cname + "=";
	  var decodedCookie = decodeURIComponent(document.cookie);
	  var ca = decodedCookie.split(';');
	  for(var i = 0; i <ca.length; i++) {
	    var c = ca[i];
	    while (c.charAt(0) == ' ') {
	      c = c.substring(1);
	    }
	    if (c.indexOf(name) == 0) {
	      return c.substring(name.length, c.length);
	    }
	  }
	  return "";
}
	
</script>
	@yield('js')
</body>
</html>
