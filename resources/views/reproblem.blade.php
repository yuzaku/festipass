<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Report Problem - FestiPass</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }
        body {
            margin: 0;
            padding: 0;
            background-color: #fff;
        }
        .navbar {
            background: #f4f4f4;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .navbar h1 {
            color: #5B4DF2;
            margin: 0;
        }
        .navbar .icon {
            width: 35px;
            height: 35px;
            background: #5B4DF2;
            border-radius: 50%;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            text-align: center;
        }
        h2 {
            color: #5B4DF2;
            font-weight: bold;
            margin-bottom: 30px;
        }
        label {
            display: block;
            text-align: left;
            margin-bottom: 5px;
            font-size: 14px;
            font-weight: 600;
        }
        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #aaa;
            border-radius: 5px;
        }
        input[type="file"] {
            margin-bottom: 20px;
        }
        button {
            background-color: #5B4DF2;
            color: white;
            padding: 10px 30px;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div class="navbar">
        <h1>FestiPass</h1>
        <div class="icon"></div>
    </div>

    <div class="container">
        <h2>Report Problem</h2>
        <form action="{{ route('report.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <label for="name">Name</label>
            <input type="text" name="name" required>

            <label for="problem_type">Problem Type</label>
            <input type="text" name="problem_type" required>

            <label for="details">Details</label>
            <textarea name="details" rows="6" required></textarea>

            <label for="attachment">Insert File</label>
            <input type="file" name="attachment">

            <br>
            <button type="submit">Send</button>
        </form>
    </div>

</body>
</html>
