$(document).ready(function(){


    $('.delete_adminbtn').click(function (e){
        e.preventDefault();

     
        var id = $(this).val();

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              $.ajax({
                method: "POST",
                url: "code.php",
                data: {
                    'admin_id': id,
                    'delete_adminbtn': true
                },
                success: function(response)
                {
                    if(response == 200)
                    {
                        swal("Success!","Admin Successfully delete" , "success");
                        $("#admin_table").load(location.href + " #admin_table");
                    }
                    else if (response == 500){
                        swal("Error!","Failed to delete" , "error");
                    }
                }
              });
            }
          });
    });


    $('.delete_empbtn').click(function (e){
      e.preventDefault();
    
      var id = $(this).val();
    
      swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to recover",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            $.ajax({
              method: "POST",
              url: "code.php",
              data: {
                  'emp_id': id,
                  'delete_empbtn': true
              },
              success: function(response)
              {
                  console.log(response); // Add this console.log statement
                  if(response == 300)
                  {
                      swal("Success!","Employee Successfully delete" , "success");
                      $("#admin_table").load(location.href + " #admin_table");
                  }
                  else if (response == 600){
                      swal("Error!","Failed to delete" , "error");
                  }
              }
            });
          }
        });
    });
    
  
  

    $('.delete_barbtn').click(function (e){
      e.preventDefault();
      
      var id = $(this).val();
      
      swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to recover",
          icon: "warning",
          buttons: true,
          dangerMode: true,
      })
      .then((willDelete) => {
          if (willDelete) {
              $.ajax({
                  method: "POST",
                  url: "code.php",
                  data: {
                      'bar_id': id,
                      'delete_barbtn': true
                  },
                  success: function(response) {
                      // Log the response to the console
                      console.log(response);
  
                      if (response == 400) {
                          swal("Success!","Barcode Successfully deleted", "success");
                          $("#admin_table").load(location.href + " #admin_table");
                      } else if (response == 800) {
                          swal("Error!","Failed to delete", "error");
                      }
                  }
              });
          }
      });
  });


  $('.delete_inventorybtn').click(function (e){
    e.preventDefault();
    
    var id = $(this).val();
    
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                method: "POST",
                url: "code.php",
                data: {
                    'inventory_id': id,
                    'delete_inventorybtn': true
                },
                success: function(response) {
                    // Log the response to the console
                    console.log(response);

                    if (response == 500) {
                        swal("Success!","Product Successfully deleted", "success");
                        $("#admin_table").load(location.href + " #admin_table");
                        location.reload();
                    } else if (response == 1000) {
                        swal("Error!","Failed to delete", "error");
                    }
                }
            });
        }
    });
});
  
    
    





});





