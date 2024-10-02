<!DOCTYPE html>
<html>
<style>
    body{
    background-image: url("images/camp.jpeg");
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed; 
    background-position: center;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            margin-top: 20px;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin-bottom: 10px;
            padding: 10px;
            background-color: #f9f9f9;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
    
</style>  
<body>
<div class="container">
        <h1>Adventure Activities</h1>
        <form id="activityForm">
            <input type="text" id="activityInput" placeholder="Add an adventure activity...">
            <input type="submit" value="Add Activity">
        </form>
        <ul id="activityList">
        </ul>
    </div>

    <script>
        document.getElementById("activityForm").addEventListener("submit", function(event) {
            event.preventDefault();
            var activityInput = document.getElementById("activityInput");
            var activityList = document.getElementById("activityList");
            var activityText = activityInput.value;
            if (activityText.trim() !== "") {
                var listItem = document.createElement("li");
                listItem.textContent = activityText;
                activityList.appendChild(listItem);
                activityInput.value = "";
            } else {
                alert("Please enter an activity!");
            }
        });
    </script>
</body>
</html>
</body>
</html>
