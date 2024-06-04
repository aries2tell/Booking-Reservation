<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script>
        function navigateToDestination(destination) {
            window.location.href = destination;
        }
    </script>
    <style>
        body {
            background-image: url('bg.png');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }
        .choice {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .single, .multiplayer {
            flex: 0 0 50%;
            max-width: 50%;
            padding: 10px;
            text-align: center;
        }
        .choice img {
            max-width: 100%;
            height: auto;
            cursor: pointer;
        }
        @media (min-width: 768px) {
            /* Adjust image size for desktop devices */
            .choice img {
                max-width: 80%;
            }
        }
    </style>
</head>
<body>

<section class="choice">
    <div class="single" onclick="navigateToDestination('study_booking.php')">
        <img src="stduyroom.png" alt="single player">
    </div>
    <div class="multiplayer" onclick="navigateToDestination('calendar.php')">
        <img src="collab.png" alt="multiplayer">
    </div>
</section>

</body>
</html>
