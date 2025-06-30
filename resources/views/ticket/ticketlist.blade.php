<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ticket List - FestiPass</title>

    {{-- Google Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            padding: 1.2rem 2rem;
            background-color: #ffffff;
            align-items: center;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.05);
        }

        .navbar h1 {
            font-size: 24px;
            font-weight: 700;
            background: linear-gradient(90deg, #6a93f8, #9b59f6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin: 0;
        }

        .profile {
            background: linear-gradient(135deg, #6a93f8, #9b59f6);
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
            font-size: 36px;
            font-weight: 700;
            text-align: center;
            margin-top: 2rem;
            background: linear-gradient(90deg, #6a93f8, #9b59f6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .sub-header {
            font-size: 18px;
            font-weight: 600;
            text-align: center;
            margin-bottom: 2rem;
        }

        .ticket-list-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 0 1.5rem;
        }

        .ticket-card {
            display: block;
            background: linear-gradient(135deg, #6a93f8, #9b59f6);
            color: white;
            border-radius: 14px;
            width: 280px;
            overflow: hidden;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .ticket-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        .ticket-card img.ticket-image {
            width: 100%;
            height: 160px;
            object-fit: cover;
            border-top-left-radius: 14px;
            border-top-right-radius: 14px;
            display: block;
        }

        .ticket-date {
            text-align: left;
            font-size: 14px;
            font-weight: 600;
            color: #111;
            margin: 16px 0 0 16px;
        }

        .ticket-content {
            padding: 16px;
        }

        .ticket-content .event-title {
            font-weight: 700;
            font-size: 16px;
            margin-bottom: 6px;
        }

        .ticket-content p {
            margin: 3px 0;
            font-size: 14px;
        }

        .status {
            margin-top: 12px;
            font-weight: bold;
            font-size: 14px;
        }

        footer {
            background-color: #fff;
            padding: 16px;
            text-align: center;
            font-size: 13px;
            color: #777;
            margin-top: 40px;
            box-shadow: 0 -1px 6px rgba(0, 0, 0, 0.05);
        }

        @media (max-width: 768px) {
            .ticket-card {
                width: 90%;
            }

            .navbar {
                padding: 1rem;
            }

            .navbar h1 {
                font-size: 20px;
            }

            .ticket-header {
                font-size: 28px;
            }

            .sub-header {
                font-size: 16px;
            }
        }
    </style>
</head>

<body>
    {{-- Navbar --}}
    <div class="navbar">
        <h1>FestiPass</h1>
        <a href="{{ route('profile.show') }}" class="profile">👤</a>
    </div>

    <main class="container">
        <h1 class="ticket-header">Ticket List</h1>
        <h3 class="sub-header">Your Tickets (Past Events)</h3>

        <div class="ticket-list-container">
            @forelse($past as $eventId => $items)
                @php
                    $event = $items->first()->ticket->event;
                    $poster = $event->poster ?? 'images/default.jpg';
                    $dateStr = \Carbon\Carbon::parse($event->event_date)->format('d F Y');
                    $total = $items->sum('quantity');
                @endphp

                <a href="{{ route('ticket.detail', $items->first()->order_id) }}" class="ticket-card">
                    <img src="{{ asset($poster) }}" alt="{{ $event->title }}" class="ticket-image">
                    <div class="ticket-date">{{ $dateStr }}</div>
                    <div class="ticket-content">
                        <div class="event-title">{{ $event->title }}</div>
                        <p>x{{ $total }} Tickets</p>
                        <p>{{ $event->location }}</p>
                        <div class="status">Purchase Successful</div>
                    </div>
                </a>
            @empty
                <p style="width:100%;text-align:center">You have no past tickets.</p>
            @endforelse
        </div>
    </main>

    <footer>&copy; {{ date('Y') }} FestiPass. All rights reserved.</footer>
</body>

</html>
