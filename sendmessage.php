<?php
    
    session_start();
    if (!isset($_SESSION['fisrtname']) AND !isset($_SESSION['emailaddress'])) {
      header('Location: index.php');
    }
    //include 'php/publish.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  
  <title>mailing panel</title>
 <script src="//cdn.ckeditor.com/4.7.3/full/ckeditor.js"></script>
</head>

<body>
<form method="POST" action="php/publish.php">
            <div class="form-group">
              <label for="usr">Subject of your message:</label>
              <input type="text" name="sujet" class="form-control" id="usr">
            </div>
            <label for="">Content (drag and drop image in the editor):</label>
            <textarea name="editor1" id="editor1" rows="10" cols="80">
                
            </textarea>
            <script>
                CKEDITOR.replace( 'editor1', {
                  height: 150,
                } );
            </script><br>
            <center><button name="submit" style="width: 50%;background-color: #343a40" type="submit" class="btn btn-primary">Diffuse message to suscribers</button></center>
          </form> 
</body>

</html>
