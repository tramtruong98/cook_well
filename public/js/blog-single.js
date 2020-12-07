$(document).ready(function() {     
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
   $("#heart").click(function(){
    var id = $(this).parents(".pt-5").data('id');
    $.ajax({                                                            
      type: "GET",                                                                                                                      
      url: "/blog/like",
      data:{id:id},
      success: function (data) 
      {
            if($("#heart").hasClass("liked")){
              $("#heart").html('<i class="fa fa-heart-o fa-lg" aria-hidden="true"></i>');
              $("#heart").removeClass("liked");
            } else{
              $("#heart").html('<i class="fa fa-heart fa-lg" aria-hidden="true"></i>');
              $("#heart").addClass("liked");
            }  
                                  
     } 
    });
  });
});

// $(document).ready(function() {     

//   $.ajaxSetup({
//       headers: {
//           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//       }
//   });

//   $('i.glyphicon-thumbs-up, i.glyphicon-thumbs-down').click(function(){    
//       var id = $(this).parents(".panel").data('id');
//       var c = $('#'+this.id+'-bs3').html();
//       var cObjId = this.id;
//       var cObj = $(this);

//       $.ajax({
//          type:'POST',
//          url: id + '/like',
//          data:{id:id},
//          success:function(data){
//             if(jQuery.isEmptyObject(data.success.attached)){
//               $('#'+cObjId+'-bs3').html(parseInt(c)-1);
//               $(cObj).removeClass("like-post");
//             }else{
//               $('#'+cObjId+'-bs3').html(parseInt(c)+1);
//               $(cObj).addClass("like-post");
//             }
//          }
//       });

//   });      

//   $(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
//       event.preventDefault();
//       $(this).ekkoLightbox();
//   });                                        
// }); 