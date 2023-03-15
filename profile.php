<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile</title>
</head>
<body>

<a href="#" id="delete-account">Delete Account</a>

<script>
    // Add a click event listener to the delete account button or link
    document.getElementById("delete-account").addEventListener("click", function(event){
        // Prevent the default action of the link
        event.preventDefault();
        
        // Display a confirmation dialog box to confirm that the user really wants to delete their account
        if(confirm("Are you sure you want to delete your account?")){
            // If the user confirms, send an AJAX request to the PHP script to delete the account
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // Account deleted successfully, reload the page to reflect the changes
                    window.location.reload();
                }
            };
            xmlhttp.open("GET", "delete.php", true);
            xmlhttp.send();
        }
    });
</script>

</body>
</html>
