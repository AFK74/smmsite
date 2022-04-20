$(document).ready(function() {

  $("form").submit(function(event){
    event.preventDefault()
    $.ajax({
      type: $(this).attr('method'),
      url: $(this).attr('action'),
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      success: function(data){
        if(data == 'main')
          location.href ='newindex.php'
      	else{
      		alert(data);
      	}
      },
    });
  });
});