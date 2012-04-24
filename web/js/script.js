/* Author:

*/
// 1. Anfrage timestamp der letzten question 0 ab der aktuelle zeit

$(document).ready(function() {
  // getting questions  
  var id = $("#survey-id").text();
  var path = "http://ip.dev/frontend_dev.php/survey/showQuestions?id=" + id;
  performPolling(path);
});

function performPolling(path) {
  $.ajax({
    type: "GET",
    url: path,
    timeout: 10000  
  }).done(function( msg ) {
    $(".survey").append(msg);    
    // this is for longpolling
    //performPolling(path);
  });
}


$("form").submit(function() {
	$.post( url, { s: term },
      function( data ) {
          var content = $( data ).find( '#content' );
          $( "#result" ).empty().append( content );
      }
  );

});

/*
 	
	DOCUMENTATION FOR OFFLINE TIME

  $("#searchForm").submit(function(event) {

 
    event.preventDefault(); 
        
 
    var $form = $( this ),
        term = $form.find( 'input[name="s"]' ).val(),
        url = $form.attr( 'action' );

 
    $.post( url, { s: term },
      function( data ) {
          var content = $( data ).find( '#content' );
          $( "#result" ).empty().append( content );
      }
    );
  });


*/


