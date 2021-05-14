$(document).ready(function() {


    setInterval(function() {
        $.ajax({
        type: 'GET',
        crossDomain: true,
        dataType: 'json',
        url:  window.location+"number" ,
        success: function(data){
           $("#number").html(data);
        }
     });

    },5000);

   
   
  

});