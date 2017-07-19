var domain = window.location.protocol + "//" + window.location.host+"/";

$(document).ready(function(){
	$('.bar_dm').click(function(){
		if($(this).hasClass('active')){
			$('.slidebarmenu').animate({'left':-260},90);
			$('.bar_dm').removeClass('active');
			$('.overlay-open-menu').hide();
		}else{
			$('.slidebarmenu').animate({'left':0},90);
			$('.bar_dm').addClass('active');
			$('.overlay-open-menu').show();
		}
	});	
	$('.overlay-open-menu').click(function(){
		$('.slidebarmenu').animate({'left':-260},90);
		$('.bar_dm').removeClass('active');
		$('.overlay-open-menu').hide();
	});
	$('.iconx').click(function(){
		$('.slidebarmenu').animate({'left':-260},90);
		$('.bar_dm').removeClass('active');
		$('.overlay-open-menu').hide();
	});
	$('.nav-toggle-subarrow').click(function(){
		$(this).parent('li').find('ul').toggle(400);
	});
	
	$('.div_search .images').click(function(){
		$('#gh-search').addClass('actives');
		$('.idon-show').hide();
		//$('ul.wpc-menu>li>a').addClass('search-f');
	});
	$('#gh-search-submit').click(function(){
		q = $('input[name=q]').val();
		if(q!=""){
			url = domain+"search/?q="+q;
			window.location= url;
		}
	});
	$('.header-right-wrap').hcSticky();
	$(".div_search").keypress(function(e){//khi nhan phim enter se dang nhap
		if (e.which==13){
			 q = $('input[name=q]').val();
			if(q!=""){
				url = domain+"search/?q="+q;
				window.location= url;
			} 
		}
		
	});
})


/*phần jquery slide ảnh*/
$(document).ready(function() {
	$("#owl-slide").owlCarousel({
		navigation : true,
		slideSpeed: 500,
		pagination: false,
		singleItem:true,
		items : 1, 
		autoPlay : 3000,
	});
	
	
	$("#owl-slide2").owlCarousel({
		navigation : false,
		slideSpeed : 500,
		autoPlay : 3000,
		items : 4,
		itemsDesktop : [1000,4],
		itemsDesktopSmall : [770,4],
		itemsMobile : [650,2],
		itemsMobile : [350,2]
	});
	var owl = $("#owl-slide2");
	$(".next").click(function(){
      owl.trigger('owl.next');
    })
    $(".prev").click(function(){
      owl.trigger('owl.prev');
    })
	
	
	$("#owl-partner").owlCarousel({
		slideSpeed: 500,
		pagination: false,
		items : 6, 
		itemsDesktop : [1000,5],
		itemsDesktopSmall : [900,4],
		itemsMobile : [700,2],
		itemsMobile : [350,2]
	});
	var owl2 = $("#owl-partner");
	$(".next2").click(function(){
      owl2.trigger('owl.next');
    })
    $(".prev2").click(function(){
      owl2.trigger('owl.prev');
    })
});
/*------------------------*/


$(document).ready(function(e) 
{
  $("#accordiondemo4 .accordion").hide();
	  $("#accordiondemo4 h3").click(function()
	  {
	     $accordion = $(this).next();
	     if($accordion.is(':hidden') === true)
		 {
	        $("#accordiondemo4 .accordion").slideUp();
	        $accordion.slideDown();
		  } 
		  else 
		  {
		    $accordion.slideUp();
	      }
	  });
});


function setLang(str)
{
   document.frmLang.lang.value=str;
   document.frmLang.submit();
}

//script faacebook
(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId=164533633935597";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));