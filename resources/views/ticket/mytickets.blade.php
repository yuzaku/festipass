<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Tickets</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            padding: 1rem 2rem;
            background-color: #f9f9f9;
            align-items: center;
        }

        .navbar h1 {
            color: #7f4ee4;
        }

        .navbar .profile {
            background-color: #7f4ee4;
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        h2 {
            color: #7f4ee4;
            font-size: 40px;
            margin: 20px 0 10px 0;
        }

        .section-title {
            font-size: 18px;
            font-weight: bold;
            margin-top: 40px;
        }

        .ticket-row {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
            margin-top: 10px;
        }

        .ticket-card {
            background-color: #7f4ee4;
            color: white;
            border-radius: 10px;
            width: 250px;
            padding-bottom: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        .ticket-card img {
            width: 100%;
            height: 130px;
            object-fit: cover;
            border-radius: 10px 10px 0 0;
        }

        .ticket-info {
            padding: 10px;
            text-align: left;
        }

        .ticket-date {
            font-weight: bold;
            color: black;
            font-size: 14px;
            margin: 10px 0 5px 5px;
            text-align: left;
        }

        .ticket-footer {
            padding: 5px 10px;
            font-size: 14px;
            font-weight: bold;
        }

        .button-row {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin-top: 40px;
        }

        .button {
            display: flex;
            align-items: center;
            gap: 10px;
            background-color: #7f4ee4;
            color: white;
            padding: 10px 25px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: bold;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }

        .button:hover {
            background-color: #6d3fdc;
        }
    </style>
</head>
<body>

    <div class="navbar">
        <h1>FestiPass</h1>
        <div class="profile">👤</div>
    </div>

    <h2>My Tickets</h2>

    <div class="section-title">Upcoming Events</div>
    <div class="ticket-row">
        <div>
            <div class="ticket-date">17 August 2025</div>
            <div class="ticket-card">
                <img src="https://via.placeholder.com/250x130.png?text=Fireworks" alt="Event 1">
                <div class="ticket-info">
                    <strong>Sisforia : TGIF!</strong><br>
                    x3 Tickets<br>
                    Departemen Sistem Informasi
                </div>
                <div class="ticket-footer">Purchase Successful</div>
            </div>
        </div>
        <div>
            <div class="ticket-date">01 November 2025</div>
            <div class="ticket-card">
                <img src="https://via.placeholder.com/250x130.png?text=Fireworks" alt="Event 2">
                <div class="ticket-info">
                    <strong>Panic! at The Disco</strong><br>
                    x3 Tickets<br>
                    Icon, BSD
                </div>
                <div class="ticket-footer">Purchase Successful</div>
            </div>
        </div>
        <div>
            <div class="ticket-date">05 June 2025</div>
            <div class="ticket-card">
                <img src="https://via.placeholder.com/250x130.png?text=Fireworks" alt="Event 3">
                <div class="ticket-info">
                    <strong>Anang Herman</strong><br>
                    x3 Tickets<br>
                    Jatim International Expo (JIE)
                </div>
                <div class="ticket-footer">Purchase Successful</div>
            </div>
        </div>
    </div>

    <div class="section-title">Past Activities</div>
    <div class="button-row">
        <a href="/ticketlist" class="button">🎟️ YOUR TICKET LIST</a>
        <a href="/your-reports" class="button">📄 YOUR REPORTS</a>
    </div>


</body>
</html>
