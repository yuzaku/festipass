<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>My Tickets</title>
    <link rel="stylesheet" href="https://unpkg.com/swiper@9/swiper-bundle.min.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #fafafa;
            margin: 0;
            padding: 0;
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
            background-color: #d3d6dd;
            color: #4b1b9b;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            text-decoration: none;
        }

        /* Back to Dashboard */
        .back-link {
            display: inline-block;
            margin: 24px 0 0 40px;
            font-size: 14px;
            font-weight: 500;
            color: #6a93f8;
            text-decoration: none;
        }

        .back-link:hover {
            text-decoration: underline;
            color: #4b75f1;
        }

        h2 {
            font-size: 36px;
            font-weight: 700;
            margin: 10px 0 10px 0;
            text-align: center;
            background: linear-gradient(90deg, #6a93f8, #9b59f6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .section-title {
            font-size: 18px;
            font-weight: 600;
            margin-top: 40px;
            text-align: center;
            color: #333;
        }

        .ticket-row {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 20px;
            padding: 0 20px;
        }

        .ticket-card {
            background: linear-gradient(135deg, #6a93f8, #9b59f6);
            color: white;
            border-radius: 14px;
            width: 250px;
            padding-bottom: 10px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .ticket-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        .ticket-card img {
            width: 100%;
            height: 130px;
            object-fit: cover;
            border-radius: 14px 14px 0 0;
        }

        .ticket-info {
            padding: 12px 16px;
            text-align: left;
            font-size: 14px;
        }

        .ticket-info strong {
            font-size: 15px;
        }

        .ticket-date {
            font-weight: 600;
            color: #222;
            font-size: 14px;
            margin: 10px 0 6px 6px;
            text-align: left;
        }

        .ticket-footer {
            padding: 0 16px;
            font-size: 13px;
            font-weight: 600;
            color: #ffffff;
        }

        .button-row {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin: 50px 0;
            flex-wrap: wrap;
        }

        .button {
            display: flex;
            align-items: center;
            gap: 10px;
            background: linear-gradient(135deg, #6a93f8, #9b59f6);
            color: white;
            padding: 12px 25px;
            border-radius: 999px;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            transition: background 0.3s ease, transform 0.2s ease;
        }

        .button:hover {
            background: linear-gradient(135deg, #5a85f5, #8f45eb);
            transform: scale(1.03);
        }

        @media (max-width: 768px) {
            h2 {
                font-size: 28px;
            }

            .ticket-card {
                width: 90%;
            }

            .navbar {
                padding: 1rem;
            }

            .navbar h1 {
                font-size: 20px;
            }

            .button-row {
                flex-direction: column;
                gap: 15px;
            }

            .button {
                width: 80%;
                justify-content: center;
            }

            .back-link {
                margin: 20px;
            }
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <div class="navbar">
        <h1>FestiPass</h1>
        <a href="{{ route('profile.show') }}" class="profile">👤</a>
    </div>

    <!-- Back to Dashboard -->
    <a href="{{ route('dashboard') }}" class="back-link">Back to Dashboard</a>

    <!-- Page Title -->
    <h2>My Tickets</h2>

    <!-- Upcoming -->
    <div class="section-title">Upcoming Events</div>
    <div class="ticket-row">
        @forelse($upcoming as $eventId => $items)
            @php
                $event = $items->first()->ticket->event;
                $total = $items->sum('quantity'); // total tiket per event
                $img = $event->poster ?? 'images/default.jpg'; // fallback poster
                $dateStr = \Carbon\Carbon::parse($event->event_date)->format('d F Y');
            @endphp

            <div>
                <div class="ticket-date">{{ $dateStr }}</div>
                <div class="ticket-card">
                    <img src="{{ asset($img) }}" alt="{{ $event->title }}">
                    <div class="ticket-info">
                        <strong>{{ $event->title }}</strong><br>
                        x{{ $total }} Tickets<br>
                        {{ $event->location }}
                    </div>
                    <div class="ticket-footer">Purchase Successful</div>
                </div>
            </div>
        @empty
            <p style="text-align:center;width:100%">No upcoming tickets.</p>
            @php print($upcoming); @endphp
        @endforelse
    </div>

    <!-- Section 2 -->
    <div class="section-title">Past Activities</div>
    <div class="button-row">
        <a href="/ticketlist" class="button">🎟️ YOUR TICKET LIST</a>
        <a href="/your-reports" class="button">📄 YOUR REPORTS</a>
    </div>

    <script src="https://unpkg.com/swiper@9/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            new Swiper('.myTicketSwiper', {
                slidesPerView: 1.2, // mobile
                spaceBetween: 20,
                breakpoints: {
                    640: {
                        slidesPerView: 2.2
                    },
                    768: {
                        slidesPerView: 3
                    },
                    1024: {
                        slidesPerView: 4
                    },
                },
                loop: false,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
            });
        });
    </script>

</body>

</html>
