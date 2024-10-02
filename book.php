<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>

    
<body>
<section class="header">
<a href="home.php" class="logo">travel.</a>
<nav class="navbar">
<a href="home.php">home</a>
<a href="about.php">about</a>
<a href="package.php">package</a>
<a href="book.php">book</a>
</nav>
<div id="menu-btn" class="fas fa-bars"></div>

</section>
<div class="heading" style="background:url(images/pic3.jpg)no-repeat">
<h1>Book Now</h1>
</div>
<section class="booking">
    <h1 class="heading-title">book your trip!</h1>
    <form action = "book_form.php" method="post" class="book-form">
        <div class="flex">
            <div class="inputBox">
                <span>name: </span>
                <input type = "text" placeholder="enter your name" name = "name" >
            </div>
            <div class="inputBox">
                <span>email: </span>
                <input type = "email" placeholder="enter your email" name = "email" >
            </div>
            <div class="inputBox">
                <span>phone: </span>
                <input type = "number" placeholder="enter your number" name = "phone" >
            </div>
            <div class="inputBox">
                <span>address: </span>
                <input type = "text" placeholder="enter your address" name = "address" >
            </div>
            <div class="inputBox">
                <span>where to: </span>
                <input type = "text" placeholder="place you want to visit" name = "location" >
            </div>
            <div class="inputBox">
                <span>how many: </span>
                <input type = "number" placeholder="number of guests" name = "guests" >
            </div>
            <div class="inputBox">
                <span>arrivals: </span>
                <input type = "date" name = "arrivals" >
            </div>
            <div class="inputBox">
                <span>leaving: </span>
                <input type = "date" name = "leaving" >
            </div>

        </div>
        <input type="submit" value="Submit" class="btn" name="send">
        <input type="button" value="Update" class="btn" onclick="window.location.reload();">
        

          
    </form>
</section>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script> function validateForm() {
    var email = document.getElementById("email").value;
    var phone = document.getElementsByName("phone")[0].value;
    var arrivals = new Date(document.getElementById("arrivals").value);
    var leaving = new Date(document.getElementById("leaving").value);
    var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

    if (!emailPattern.test(email)) {
        document.getElementById("emailError").innerHTML = "Invalid email format";
        return false;
    } else {
        document.getElementById("emailError").innerHTML = "";
    }
    if (phone.length !== 10) {
        document.getElementById("phoneError").innerHTML = "Mobile number should be 10 digits";
        return false;
    } else {
        document.getElementById("phoneError").innerHTML = "";
    }

    if (leaving < arrivals) {  // Change the condition to check if leaving is before arrival
        document.getElementById("dateError").innerHTML = "Date of leaving should be after date of arrival";
        return false;
    } else {
        document.getElementById("dateError").innerHTML = "";
    }

    return true;
}

            </script>

<script src="script.js"></script>
</body>
</html>