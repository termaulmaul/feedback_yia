<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yogyakarta International Airport</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            color: #333;
            text-align: center;
            background-color: #f4f4f4;
        }

        .container {
            padding: 20px;
            max-width: 1200px;
            margin: auto;
        }

        h1 {
            font-size: 2.5em;
            margin: 20px 0;
            color: #242632;
        }

        .background-img {
            width: 100%;
            height: auto;
            max-height: 400px;
            object-fit: cover;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }

        .button-group {
            margin-top: 20px;
        }

        .button-group button {
            background-color: #242632;
            color: white;
            border: none;
            padding: 15px 30px;
            margin: 10px;
            border-radius: 5px;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .button-group button:hover {
            background-color: #1d1f2a;
        }

        .button-group button:focus {
            outline: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to Yogyakarta International Airport</h1>
        <img src="{{ asset('resources/bg.jfif') }}" alt="Airport Background" class="background-img">
        <div class="button-group">
            <button onclick="window.location.href='{{ route('feedback.id') }}'">Bahasa Indonesia</button>
            <button onclick="window.location.href='{{ route('feedback.en') }}'">English</button>
        </div>
    </div>
</body>
</html>
