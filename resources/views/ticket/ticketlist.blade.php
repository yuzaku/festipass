<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket List - FestiPass</title>

    {{-- Tailwind CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">

    {{-- Google Font: Inter --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            padding: 1rem 2rem;
            background-color: #f9f9f9;
            align-items: center;
        }

        .navbar h1 {
        background: linear-gradient(90deg, #7f4ee4, #4b1b9b);
        -webkit-background-clip: text;
         -webkit-text-fill-color: transparent;
        }

        .navbar .profile {
         background: linear-gradient(135deg, #7f4ee4, #4b1b9b);
         color: white;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        }

        .ticket-header {
            font-size: 2.5rem;
            font-weight: 800;
            text-align: center;
            margin-top: 2rem;
            background: linear-gradient(90deg, #6C2BD9, #3f1c7f);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .sub-header {
            font-size: 1.25rem;
            font-weight: 600;
            text-align: center;
            margin-bottom: 2rem;
        }

        .ticket-list-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 1.5rem;
            padding: 0 2rem;
        }

        .ticket-card {
            background: linear-gradient(135deg, #6C2BD9, #3f1c7f);
            color: white;
            border-radius: 12px;
            width: 300px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            position: relative;
        }

        .ticket-card .background {
            position: relative;
            height: 150px;
            background-image: url('/images/fireworks.jpg');
            background-size: cover;
            background-position: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 1rem;
            color: white;
        }

        .ticket-card .background .event-title {
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .ticket-card .info {
            padding: 1rem;
            background: linear-gradient(135deg, #6C2BD9, #3f1c7f);
        }

        .ticket-card .info p {
            margin: 0.3rem 0;
        }

        .ticket-card .status {
            font-weight: bold;
            color: white;
            margin-top: 0.5rem;
        }

        .ticket-date {
            text-align: center;
            margin-top: 1rem;
            font-weight: 500;
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

    <div class="navbar">
        <h1>FestiPass</h1>
        <div class="profile">👤</div>
    </div>



    <main class="flex-grow container mx-auto px-4 py-8">
        <h1 class="ticket-header">Ticket List</h1>
        <h3 class="sub-header">Your Tickets</h3>

        <div class="ticket-list-container">
            <!-- Ticket 1 -->
            <div class="ticket-card">
                <div class="ticket-date">05 January 2025</div>
                <div class="background">
                    <div class="event-title">Noah Band</div>
                    <div>x3 Tickets</div>
                    <div>Lagoon Mall 3rd Floor</div>
                </div>
                <div class="info">
                    <div class="status">Purchase Successful</div>
                </div>
            </div>

            <!-- Ticket 2 -->
            <div class="ticket-card">
                <div class="ticket-date">30 May 2025</div>
                <div class="background">
                    <div class="event-title">JKT48</div>
                    <div>x3 Tickets</div>
                    <div>Grand Indonesia 2nd Floor</div>
                </div>
                <div class="info">
                    <div class="status">Purchase Successful</div>
                </div>
            </div>

            <!-- Ticket 3 -->
            <div class="ticket-card">
                <div class="ticket-date">01 February 2025</div>
                <div class="background">
                    <div class="event-title">Dewa 19</div>
                    <div>x3 Tickets</div>
                    <div>The Taman Dayu Park</div>
                </div>
                <div class="info">
                    <div class="status">Purchase Successful</div>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-white shadow-inner py-4 text-center text-gray-500 text-sm">
        &copy; 2025 FestiPass. All rights reserved.
    </footer>

</body>
</html>
