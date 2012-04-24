/* Author:

*/


function getQuestions() {
	var id = $("#survey-id").text;	
	$.getJSON(["http://ip.dev/", id].join(","), function(data) {    
 	
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


