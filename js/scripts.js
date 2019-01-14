$(document).ready(function() {
  $('.view_data').click(function(){
     var book_id = $(this).attr("id");
     $.ajax({
          url:"http://localhost/src/book_header.php",
          method:"post",
          data:{book_id:book_id},
          success:function(data){
               $('#book_header').html(data);
               $('#dataModal').modal("show");
          }
     });
     $.ajax({
          url:"http://localhost/src/book_details.php",
          method:"post",
          data:{book_id:book_id},
          success:function(data){
               $('#book_details').html(data);
               $('#dataModal').modal("show");
          }
     });
   });
   $('.view_info').click(function(){
      var class_id = $(this).attr("id");
      $.ajax({
           url:"http://localhost/src/class_header.php",
           method:"post",
           data:{class_id:class_id},
           success:function(data){
                $('#class_header').html(data);
                $('#dataModal').modal("show");
           }
      });
      $.ajax({
           url:"http://localhost/src/class_details.php",
           method:"post",
           data:{class_id:class_id},
           success:function(data){
                $('#class_details').html(data);
                $('#dataModal').modal("show");
           }
      });
    });
});
