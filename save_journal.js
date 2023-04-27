$(document).ready(function() {
  $("#publishBtn").click(function() {
    // get the values from the contenteditable divs
    var title = $("#title").html();
    var content = $("#content").html();
    
    // send the values to the PHP script via AJAX
    $.ajax({
      type: "POST",
      url: "save_article.php",
      data: {
        title: title,
        content: content
      },
      success: function(response) {
        console.log(response);
        // handle the response from the server here
      },
      error: function(jqXHR, textStatus, errorThrown) {
        console.log("Error: " + textStatus + " " + errorThrown);
        // handle any errors here
      }
    });
  });
});
