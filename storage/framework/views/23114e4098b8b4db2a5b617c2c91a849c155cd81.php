<!doctype html>
<html class="no-js" lang="en">
    <head>
        <base href="<?php echo e(url('/')); ?>"/>
        <title><?php echo e($title); ?> | <?php echo e($set->site_name); ?></title>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
        <meta name="robots" content="index, follow">
        <meta name="apple-mobile-web-app-title" content="<?php echo e($set->site_name); ?>"/>
        <meta name="application-name" content="<?php echo e($set->site_name); ?>"/>
        <meta name="msapplication-TileColor" content="#ffffff"/>
        <meta name="description" content="<?php echo e($set->site_desc); ?>" />
        <link rel="shortcut icon" href="<?php echo e(url('/')); ?>/asset/<?php echo e($logo->image_link2); ?>" />
        <link rel="apple-touch-icon" href="<?php echo e(url('/')); ?>/asset/<?php echo e($logo->image_link); ?>" />
        <link rel="apple-touch-icon" sizes="72x72" href="<?php echo e(url('/')); ?>/asset/<?php echo e($logo->image_link); ?>" />
        <link rel="apple-touch-icon" sizes="114x114" href="<?php echo e(url('/')); ?>/asset/<?php echo e($logo->image_link); ?>" />
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/asset/css/sweetalert.css" type="text/css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,600,700&display=swap">
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/asset/dashboard/vendor/nucleo/css/nucleo.css" type="text/css">
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/asset/dashboard/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/asset/dashboard/css/argon.css?v=1.1.0" type="text/css">
        <link rel="stylesheet" href="<?php echo e(url('/')); ?>/asset/frontend/css/sweetalert.css" type="text/css">
         <?php echo $__env->yieldContent('css'); ?>
    <!-- Global site tag (gtag.js) - Google Analytics -->



    </head>
<!-- header begin-->
  <body class="bg-white">
    <!-- Navbar -->
    <nav id="navbar-main" class="navbar navbar-horizontal navbar-transparent navbar-main navbar-expand-lg navbar-light">
      <div class="container">
        <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
          <img src="<?php echo e(url('/')); ?>/asset/<?php echo e($logo->image_link); ?>">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse navbar-custom-collapse collapse" id="navbar-collapse">
          <div class="navbar-collapse-header">
            <div class="row">
              <div class="col-6 collapse-brand">
                <a href="<?php echo e(url('/')); ?>">
                  <img src="<?php echo e(url('/')); ?>/asset/<?php echo e($logo->image_link); ?>">
                </a>
              </div>
              <div class="col-6 collapse-close">
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                  <span></span>
                  <span></span>
                </button>
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </nav>
<!-- header end -->

<?php echo $__env->yieldContent('content'); ?>


<!-- footer begin -->
<footer class="py-5" id="footer-main">
    <div class="container">
      <div class="row align-items-center justify-content-xl-between">
        <div class="col-xl-6">
          <div class="copyright text-center text-xl-left text-muted">
          <a href="<?php echo e(url('/')); ?>" class="font-weight-bold ml-1"><span class="text-yellow"><?php echo e($set->site_name); ?></span></a>  &copy; <?php echo e(date('Y')); ?>. All Rights Reserved. 
          </div>
        </div>
        <div class="col-xl-6">
          <ul class="nav nav-footer justify-content-center justify-content-xl-end">
           
          </ul>
        </div>
      </div>
    </div>
  </footer>

  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="<?php echo e(url('/')); ?>/asset/dashboard/vendor/jquery/dist/jquery.min.js"></script>
  <script src="<?php echo e(url('/')); ?>/asset/dashboard/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo e(url('/')); ?>/asset/dashboard/vendor/js-cookie/js.cookie.js"></script>
  <script src="<?php echo e(url('/')); ?>/asset/dashboard/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="<?php echo e(url('/')); ?>/asset/dashboard/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Argon JS -->
  <script src="<?php echo e(url('/')); ?>/asset/dashboard/js/argon.js?v=1.1.0"></script>
  <!-- Demo JS - remove this in your project -->
  <script src="<?php echo e(url('/')); ?>/asset/dashboard/js/demo.min.js"></script>
  <script src="<?php echo e(url('/')); ?>/asset/frontend/js/sweetalert.js"></script>
  <!-- Notification script start -->
<style type="text/css">

.custom-sales-notification {
  position: fixed;
  bottom: 15px;
  left: 20px;
  z-index: 9999999999999 !important;
  font-family: "Open Sans", sans-serif;
}
.custom-sales-notification .notification-holder {
  width: 300px;
  border:4px solid rgba(0, 0, 0, 0.26);
  text-align: left;
  z-index: 99999;
  box-sizing: border-box;
  font-weight: 400;
  border-radius: 5px;
  box-shadow: 0px 0px 5px -2px rgba(0,0,0,0.50);
  background-color: #916704;
  position: relative;
  cursor: pointer;
}

.custom-sales-notification .notification-holder:hover{
	border-color:transparent;
	-webkit-transition: border-color 0.7s;
	-moz-transition: border-color 0.7s;;
  -o-transition: border-color 0.7s;;
  transition: border-color 0.7s;;
  
}

.custom-sales-notification .notification-holder .notification-holder-container {
  display: flex !important;
  align-items: center;
  height: 74px;
}

.custom-sales-notification .notification-holder .notification-holder-container .notification-holder-image-wrapper span{
  margin-left:1px;
  display:block;
  width: 72px;
  height:72px;
  border-radius:50%;
  background:#916704;
  font-size:42px;
  text-align:center;
  line-height:72px;
  color:#916704;
}

.custom-sales-notification .notification-holder .notification-holder-container .notification-holder-image-wrapper{
  margin-left:1px;
  display:block;
  width: 72px;
  height:72px;
  border-radius:50%;
  background:#916704;
  font-size:42px;
  text-align:center;
  line-height:72px;
  color:#916704;
}

.custom-sales-notification .notification-holder .notification-holder-container .notification-holder-image-wrapper img{
	height:60px;
	position:relative;
	top: 50%;
transform: translateY(-50%);
}


.custom-sales-notification .notification-holder .notification-holder-container .notification-holder-content-wrapper {
  margin: 0;
  height: 100%;
  color: white;
  padding-left: 20px;
  padding-right: 20px;
  border-radius: 0 6px 6px 0;
  flex: 1;
  display: flex !important;
  flex-direction: column;
  justify-content: center;
}

.custom-sales-notification .notification-holder .notification-holder-container .notification-holder-content-wrapper .notification-holder-content {
  font-family: inherit !important;
  margin: 0 !important;
  padding: 0 !important;
 font-size:12px;
	font-weight:bold;
}

.custom-sales-notification .notification-holder .notification-holder-container .notification-holder-content-wrapper .notification-holder-content small {
  margin-top: 3px !important;
  display: block !important;
  font-size: 12px !important;
  opacity: 0.8;
}

.custom-sales-notification .notification-holder .custom-close {
  position: absolute;
  top: 0px;
  right: -8px;
  height: 12px;
  width: 12px;
  cursor: pointer;
  color:#9E9E9E;
  transition: 0.2s ease-in-out;
  transform: rotate(45deg);
  opacity: 0;
}

.custom-sales-notification .notification-holder .custom-close::before {
  content: "";
  display: block;
  width: 100%;
  height: 2px;
  background-color: gray;
  position: absolute;
  left: 0;
  top: 5px;
}

.custom-sales-notification .notification-holder .custom-close::after {
  content: "";
  display: block;
  height: 100%;
  width: 2px;
  background-color: gray;
  position: absolute;
  left: 5px;
  top: 0;
}

.custom-sales-notification .notification-holder:hover .custom-close {
  opacity: 1;
}

.purchaselabel{
	font-size:13px;
	font-weight:normal;
}

#buyertime{
	font-size:10px;
	font-weight:normal;
	display:block;
	margin-top:10px;
}

  </style>
   <section class="custom-sales-notification">
    <div class="notification-holder">
      <div class="notification-holder-container">
        <div class="notification-holder-image-wrapper">
			<img src="https://goldmintng.com/asset/images/goldmint-notification-coin.png"/>
        </div>
        <div class="notification-holder-content-wrapper">
          <p class="notification-holder-content">
            <span id="buyername"></span> from <span id="buyerlocation"></span>  
          </p>
        </div>
      </div>
      <div class="custom-close"></div>
    </div>
  </section>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script>
		$( document ).ready(function() {
		var locations=["Abia has just Started Mining","Aba has just Started Mining","Arochukwu has just Started Mining","Umuahia has just Started Mining","Adamawa has just Started Mining","Jimeta has just Started Mining","Mubi has just Started Mining","Numan has just Started Mining","Yola has just Started Mining","Akwa Ibom has just Started Mining","Ikot Abasi has just Started Mining","Ikot Ekpene has just Started Mining","Oron has just Started Mining","Uyo has just Registered","Anambra has just Registered","Awka has just Registered","Onitsha has just Registered","Bauchi has just Registered","Azare has just Registered","Bauchi has just Registered","Jama′are has just Registered","Katagum has just Registered","Misau has just Registered","Bayelsa has just Registered","Brass has just Registered","Benue has just Registered","Makurdi has just Registered","Borno has just Registered","Biu has just Registered","Dikwa has just Registered","Maiduguri has just Registered","Cross River has just Registered","Calabar has just Registered","Ogoja has just Registered","Delta has just Registered","Asaba has just Registered","Burutu has just Registered","Koko has just Registered","Sapele has just Registered","Ughelli has just Registered","Warri has just Registered","Ebonyi has just Registered","Abakaliki has just Registered","Edo has just Registered","Benin City has just Referred","Ekiti has just Referred","Ado-Ekiti has just Referred","Effon-Alaiye has just Referred","Ikere-Ekiti has just Referred","Enugu has just Referred","Enugu has just Referred","Nsukka has just Referred","FCT has just Referred","Abuja has just Referred","Gombe has just Referred","Deba Habe has just Referred","Gombe has just Referred","Kumo has just Referred","Imo has just Referred","Owerri has just Referred","Jigawa has just Referred","Birnin Kudu has just Referred","Dutse has just Referred","Gumel has just Referred","Hadejia has just Referred","Kazaure has just Referred","Kaduna has just Started Mining","Jemaa has just Started Mining","Kaduna has just Referred","Zaria has just Referred","Kano has just Referred","Kano has just Referred","Katsina has just Started Mining","Daura has just Referred","Kebbi has just Started Mining","Argungu has just Referred","Birnin Kebbi has just Started Mining","Gwandu has just Started Mining","Yelwa has just Started Mining","Kogi has just Started Mining","Idah has just Started Mining","Kabba has just Started Mining","Lokoja has just Started Mining","Okene has just Started Mining","Kwara has just Started Mining","Ilorin has just Started Mining","Jebba has just Started Mining","Lafiagi has just Started Mining","Offa has just Started Mining","Pategi has just Started Mining","Lagos has just Started Mining","Badagry has just Started Mining","Epe has just Started Mining","Ikeja has just Started Mining","Ikorodu has just Started Mining","Lagos has just Started Mining","Mushin has just Started Mining","Shomolu has just Started Mining","Nasarawa has just Started Mining","Keffi has just Started Mining","Lafia has just Started Mining","Nasarawa has just Started Mining","Niger has just Started Mining","Agaie has just Started Mining","Baro has just Started Mining","Bida has just Started Mining","Kontagora has just Started Mining","Lapai has just Started Mining","Minna has just Started Mining","Suleja has just Started Mining","Ogun has just Started Mining","Abeokuta has just Started Mining","Ijebu-Ode has just Started Mining","Ilaro has just Started Mining","Shagamu has just Started Mining","Ondo has just Started Mining","Akure has just Started Mining","Ikare has just Started Mining","Oka-Akoko has just Started Mining","Ondo has just Started Mining","Owo has just Registered","Osun has just Registered","Ede has just Registered","Ikire has just Registered","Ikirun has just Registered","Ila has just Registered","Ile-Ife has just Registered","Ilesha has just Registered","Ilobu has just Registered","Inisa has just Registered","Iwo has just Registered","Oshogbo has just Registered","Ila has just Registered","Ile-Ife has just Registered","Ilesha has just Registered","Ilobu has just Started Mining","Inisa has just Registered","Iwo has just Registered","Oshogbo has just Registered","Oyo has just Registered","Ibadan has just Started Mining","Iseyin has just Registered","Ogbomosho has just Registered","Oyo has just Registered","Saki has just Registered","Bukuru has just Registered","Jos has just Registered","Vom has just Registered","Wase has just Registered","Rivers has just Registered","Bonny has just Registered","Degema has just Registered","Okrika has just Registered","Port Harcourt has just Registered","Sokoto has just Registered","Sokoto has just Registered","Taraba has just Registered","Ibi has just Registered","Jalingo has just Registered","Muri has just Registered","Yobe has just Registered","Damaturu has just Registered","Nguru has just Registered","Zamfara has just Registered","Gusau has just Registered","Kaura Namoda has just Registered","Warri has just Registered","Ebonyi has just Registered","Abakaliki has just Registered","Edo has just Registered","Benin City has just Registered","Ekiti has just Referred","Ado-Ekiti has just Referred","Effon-Alaiye has just Referred","Ikere-Ekiti has just Referred","Enugu has just Referred","Enugu has just Logged in","Nsukka has just Referred","FCT has just Referred","Abuja has just Referred","Gombe has just Referred","Deba Habe has just Referred","Gombe has just Referred","Kumo has just Referred","Imo has just Referred","Owerri has just Referred","Jigawa has just Referred","Birnin Kudu has just Referred","Dutse has just Referred","Gumel has just Referred","Hadejia has just Referred","Kazaure has just Referred","Kaduna has just Referred","Jemaa has just Referred","Kaduna has just Logged in","Zaria has just Referred","Kano has just Referred","Kano has just Referred","Katsina has just Referred","Daura Katsina has just Referred","Kebbi has just Referred","Argungu has just Referred","Birnin Kebbi has just Referred","Gwandu has just Referred","Yelwa has just Referred","Kogi has just Referred","Idah has just Referred","Kabba has just Referred","Lokoja has just Referred","Okene has just Referred","Kwara has just Referred","Ilorin has just Referred","Jebba has just Referred","Lafiagi has just Referred","Offa has just Referred","Pategi has just Referred","Lagos has just Referred","Badagry has just Referred","Epe has just Referred","Ikeja has just Referred","Ikorodu has just Referred","Lagos has just Logged in","Mushin has just Referred","Shomolu has just Referred","Nasarawa has just Referred","Keffi has just Referred","Lafia has just Referred","Nasarawa has just Logged in","Niger has just Referred","Agaie has just Referred","Baro has just Referred","Bida has just Referred","Kontagora has just Referred","Lapai has just Referred","Minna has just Referred","Suleja has just Referred","Ogun has just Referred","Abeokuta has just Referred","Ijebu-Ode has just Referred","Ilaro has just Referred","Shagamu has just Referred","Ondo has just Referred","Akure has just Referred","Ikare has just Referred","Oka-Akoko has just Referred","Ondo has just Referred","Owo has just Referred","Osun has just Referred","Ede has just Referred","Ikire has just Referred","Ikirun has just Referred","Ila has just Referred","Ile-Ife has just Referred","Ilesha has just Referred","Ilobu has just Referred","Inisa has just Started Mining","Iwo has just Started Mining","Oshogbo has just Started Mining","Ila has just Started Mining","Ile-Ife has just Started Mining","Ilesha has just Started Mining","Ilobu has just Started Mining","Inisa has just Started Mining","Iwo has just Started Mining","Oshogbo has just Started Mining","Oyo has just Started Mining","Ibadan has just Started Mining","Iseyin has just Started Mining","Ogbomosho has just Started Mining","Oyo has just Started Mining","Saki has just Started Mining","Bukuru has just Started Mining","Jos has just Started Mining","Vom has just Registered","Wase has just Registered","Rivers has just Registered","Bonny has just Registered","Degema has just Registered","Okrika has just Registered","Port Harcourt has just Registered","Sokoto has just Registered","Sokoto has just Registered","Taraba has just Registered","Ibi has just Referred","Jalingo has just Referred","Muri has just Referred","Yobe has just Referred","Damaturu has just Referred","Nguru has just Referred","Zamfara has just Referred","Gusau has just Referred","Kaura Namoda has just Referred"];
        var name=["Oluwatope","Chibueze","Chidie","Chika","Ahmedu","Halimnye","Chi","Uche","Chukwuebuka","Nwabudike","Chidea","Chidiebube","Amachea","Abimbola","Abimbola","Abioye","Abiodun","Adebowale","Anuoluwapo","Adegoke","Darasimi","Adetokunbo","Damilola","Adewale","Folashade","Adisa","Eniola","Alabi","Adesewa","Aladewura","Ayotola","Ajibola","Bimpe","Amadi","Ademosunro","Ayokunle","Damola","Gbenga","Bisi","Kikelomo","Lolade","Olaoluwa","Tosin","Olalekan","Ayomide","Ademola","Ademosunro","Mosun","Mosunro","Okpeseyi","Oluwasegun","Tobechukwu","Uzochukwu","Ikem","Adaobi","Obea","Chioma","Obey","Adisa","Nkemdilim","Uchee","Oluwarantimi","Numilekunoluwa","Adisa","Ololade","Oluwatunmise","Oluwaseun","Similoluwa","Teleola","Abidemi","Oluwatomiwa","Ngozi","Chidubem","Chee","Madu","Fumnanya","Madukaife","Ijendu","Oluchi","Okparro","Chibueze","Odion","Chydie","Jelanee","Nailah","Chinaza","Chibueze","Chidie","Chika","Ahmedu","Halimnye","Chi","Uche","Chukwuebuka","Nwabudike","Chidea","Chidiebube","Amachea","Abimbola","Abimbola","Abioye","Abiodun","Adebowale","Anuoluwapo","Adegoke","Darasimi","Adetokunbo","Damilola","Adewale","Folashade","Adisa","Eniola","Alabi","Adesewa","Aladewura","Ayotola","Ajibola","Bimpe","Amadi","Ademosunro","Ayokunle","Damola","Gbenga","Bisi","Kikelomo","Lolade","Olaoluwa","Tosin","Olalekan","Ayomide","Ademola","Ademosunro","Mosun","Mosunro","Okpeseyi","Oluwasegun","Tobechukwu","Uzochukwu","Ikem","Adaobi","Obea","Chioma","Obey","Adisa","Nkemdilim","Uchee","Oluwarantimi","Numilekunoluwa","Adisa","Ololade","Oluwatunmise","Oluwaseun","Similoluwa","Teleola","Abidemi","Oluwatomiwa","Ngozi","Chidubem","Chee","Madu","Fumnanya","Madukaife","Ijendu","Oluchi","Okparro","Chibueze","Odion","Chydie","Jelanee","Nailah","Chinaza"];
		var time=["goldmintng.com","goldmintng.com","goldmintng.com"]
		
		var random = Math.floor(Math.random() * locations.length);
		$("#buyerlocation").html(locations[random]);
		var random = Math.floor(Math.random() * name.length);
		var displayname=name[random];
		$("#buyername").html(displayname);
		$("#nameletter").html(displayname.charAt(0));
		var random = Math.floor(Math.random() * time.length);
		$("#buyertime").html(time[random]);
		
		/*
		var intTime=9000;
		setInterval(function(){ 
		
			if($('.custom-sales-notification').css('display')=='none')
			{
				random = Math.floor(Math.random() * locations.length);
				$("#buyerlocation").html(locations[random]);
				
				random = Math.floor(Math.random() * name.length);
				displayname=name[random];
				$("#buyername").html(displayname);
				$("#nameletter").html(displayname.charAt(0));
				
				random = Math.floor(Math.random() * time.length);
				$("#buyertime").html(time[random]);
				intTime=9000;
			}
			else{
				intTime=4000;
			}
			
			$(".custom-sales-notification").stop().slideToggle('slow');
			
		}, intTime);
		*/
		
		
     
	  
	var flag=0;
	var counter = 4000;
	var ftime=0;
	if(ftime==0)
		{
			counter = 9000;
		}
		ftime=ftime+1;
		var myFunction = function(){
		if(flag==0)
		{
			counter=4000;
			flag=1;
		}
		else
		{
			flag=0;
			counter=9000;
		}
		
		ftime=ftime+1;
		
		
		
		if($('.custom-sales-notification').css('display')=='none')
			{
				random = Math.floor(Math.random() * locations.length);
				$("#buyerlocation").html(locations[random]);
				
				random = Math.floor(Math.random() * name.length);
				displayname=name[random];
				$("#buyername").html(displayname);
				$("#nameletter").html(displayname.charAt(0));
				
				random = Math.floor(Math.random() * time.length);
				$("#buyertime").html(time[random]);
			}
			
			
			$(".custom-sales-notification").stop().slideToggle('slow');
			
			
		clearInterval(interval);
		interval = setInterval(myFunction, counter);
	}
	var interval = setInterval(myFunction, counter);
	
	 $(".custom-close").click(function() {
        $(".custom-sales-notification").stop().slideToggle('slow');
		clearInterval(interval);
      });
	  
	  });
  </script>

<!-- Notification script Ends -->
</body>

</html>
<?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->yieldContent('script'); ?>
<?php if(session('success')): ?>
    <script>
      "use strict";
        $(document).ready(function () {
            swal("Success!", "<?php echo e(session('success')); ?>", "success");
        });
    </script>
<?php endif; ?>

<?php if(session('alert')): ?>
    <script>
      "use strict";
        $(document).ready(function () {
            swal("Sorry!", "<?php echo e(session('alert')); ?>", "error");
        });
    </script>
<?php endif; ?>
    <script>
    <?php if(Session::has('message')): ?>
    "use strict";
    var type = "<?php echo e(Session::get('alert-type','info')); ?>";
    switch (type) {
        case 'info':
            toastr.info("<?php echo e(Session::get('message')); ?>");
            break;
        case 'warning':
            toastr.warning("<?php echo e(Session::get('message')); ?>");
            break;
        case 'success':
            toastr.success("<?php echo e(Session::get('message')); ?>");
            break;
        case 'error':
            toastr.error("<?php echo e(Session::get('message')); ?>");
            break;
    }
    <?php endif; ?>
</script>
<?php /**PATH D:\xampp\htdocs\rubicnetwork\resources\views/admin/loginlayout.blade.php ENDPATH**/ ?>