<!DOCTYPE HTML>
<html lang="en">

<?php include("head.php"); ?>
<style>
body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.container-wrap {
    margin: 20px;
}

.split-container {
    display: flex;
}

.left-pane,
.right-pane {
    flex: 1;
}

.contact-form {
    background-color: #fff;
    padding: 20px;
  
    
    max-width: 400px;
    margin: 0 auto;
}

.contact-form h2 {
    text-align: center;
    color: #333;
}

form {
    display: flex;
    flex-direction: column;
}

label {
    margin-bottom: 8px;
    color: #333;
}

input,
textarea {
    padding: 10px;
    margin-bottom: 16px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

button {
    padding: 10px 20px;
    background-color: #82CD47;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #2980b9;
}

.map-container {
    height: 400px;
    border-radius: 8px;
    overflow: hidden;
}

iframe {
    width: 100%;
    height: 100%;
    border: 0;
}

</style>
<body>

    <div class="fh5co-loader"></div>

    <div id="page">
        <?php include('navbar.php'); ?>
        <div class="container-wrap">

            <div class="split-container">

                <div class="left-pane">
                    <div class="contact-form">
                        <h2>Contact Form</h2>
                        <!-- Form to contact -->
                        <form action="replace_with_your_processing_url.php" method="post">
                            <label for="name">Your Name:</label>
                            <input type="text" name="name" required>

                            <label for="email">Your Email:</label>
                            <input type="email" name="email" required>

                            <label for="subject">Subject:</label>
                            <input type="text" name="subject" required>

                            <label for="message">Message:</label>
                            <textarea name="message" rows="4" required></textarea>

                            <button type="submit">Send Message</button>
                        </form>
                    </div>
                </div>
                

                <div class="right-pane" style="padding:20px">
                    <div class="map-container">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3268.8327681779306!2d135.7561864110064!3d34.985853367746586!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x600108ae918b02ef%3A0xb61a446e74a21c08!2sKyoto%20Station!5e0!3m2!1sen!2sjp!4v1704359909628!5m2!1sen!2sjp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                           
                    </div>
                    <br><br>
                    <h3>GOOGLE MAP</h3> 
                </div>

            </div>

            <?php include("footer.php"); ?>
        </div>
    </div>

</body>

</html>
