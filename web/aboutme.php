<!DOCTYPE html>
<html lang="en">   
   <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>CS313</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
        <link rel="stylesheet" href="styles.css">
        <script src="scripts.js"></script>
   </head> 
   <body onload = "startTimer()">
        <?php include 'header.php' ?>
       <div class="aboutme">
            <h1>About Me</h1>
        </div>
        <div class="details">
            <ul>
                <p>
                   <li class="major">Major: Computer Science</li>
                    <li class="town">Hometown: Idaho Falls</li>
                    <li class="job">Headed to Bentonville for Walmart</li>
                    <h4 class="hobbies">Hobbies/Interests:</h4>
                    <ul class="hobbylist">
                        <li>cooking</li>
                        <li>reading technology books</li>
                        <li>games</li>
                        <li>softball</li>
                        <li>spending time with family</li>
                    </ul>
                </p>
            </ul>
       </div>
       <div class="slideshow">
            <h3>Places I enjoy visiting</h3>
            <img id="img" src="images/startpicture.jpg"/>
        </div>
        <div>
            <button type="button" onclick="displayPreviousImage()">Previous</button>
            <button type="button" onclick="displayNextImage()">Next</button>
        </div>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
   </body>
</html>