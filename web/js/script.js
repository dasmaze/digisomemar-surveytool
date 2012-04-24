/* Author:

*/
// 1. Anfrage timestamp der letzten question 0 ab der aktuelle zeit



$(document).ready(function() {
  // getting questions  
  var id = $("#survey-id").text();
  
  $.get(["http://ip.dev/frontend_dev.php/survey/showQuestions?id=", id].join(","), function(data) {
      //$('.result').html(data);
      alert('Load was performed: ' + data);
  });  
});

function performPolling(id) {
  while(true) {
    $.get(["http://ip.dev/frontend_dev.php/survey/showQuestions?id", id].join(","), function(data) {
      //$('.result').html(data);
      alert('Load was performed.');
    });
  }
  
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


