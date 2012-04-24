<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<!-- meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" -->
	<?php include_title() ?>
	<?php include_metas() ?>
	<meta name="viewport" content="width=device-width">
	<link rel="shortcut icon" href="/favicon.ico" />
	<?php include_stylesheets() ?>
	<?php include_javascripts() ?>
</head>
<body>	
    <div class="mobile-container">
    	<div ></div>
    	<!--<h1>a3 Survey Tool</h1>-->
    	<div class="header">
    		<img src="/img/logo.png" alt="logo">
    		Survey-Tool
    	</div>
    	<div class="survey">    	
    		<?php echo $sf_content ?>
    	</div>
      <footer>
        <p>Created by A&sup3; 2012</p>
      </footer>
    </div> <!-- /container -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script>
	var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
	(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
	g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
	s.parentNode.insertBefore(g,s)}(document,'script'));
</script>

<script>

    function submitForm(id) {
        var selector = "#" + id;
        var choices = $(selector).serializeArray();

        var answers = ""
        jQuery.each(choices, function() {
            answers += this.value + ",";            
        });

        if(answers.length > 0) answers = answers.slice(0, answers.length - 1);        

        var path = "http://ip.dev/frontend_dev.php/survey/submitQuestionAnswer?answers=" + answers;
        // $.get(path, function(data){
        //     alert("Data Loaded: " + data);
        // });
        alert(path);
        $.ajax({
            type: "GET",
            url: path              
        }).done(function( msg ) {
            alert("Success" +  msg);
            //$(selector).fadeOut("slow");                  
        });        

        return false;             
    }

    // $(".submit-button").click(function() {
    //     console.log("hello console");
    // });


  // var values = $('.answerForm').serialize();
  // alert(values);

  // alert("Wohooo");


  // GET ?answers=1,2,3,4
  
    // $.post( url, { s: term },
 //      function( data ) {
 //          var content = $( data ).find( '#content' );
 //          $( "#result" ).empty().append( content );
 //      }
 //  );


</script>


</body>
</html>

