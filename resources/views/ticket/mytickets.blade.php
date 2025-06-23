<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>My Tickets</title>
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
      text-align: center;
    }

    .navbar {
      display: flex;
      justify-content: space-between;
      padding: 1.2rem 2rem;
      background-color: #ffffff;
      align-items: center;
      box-shadow: 0 1px 4px rgba(0,0,0,0.05);
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

    h2 {
      font-size: 36px;
      font-weight: 700;
      margin: 30px 0 10px 0;
      background: linear-gradient(90deg, #6a93f8, #9b59f6);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    .section-title {
      font-size: 18px;
      font-weight: 600;
      margin-top: 40px;
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
      box-shadow: 0 6px 20px rgba(0,0,0,0.1);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .ticket-card:hover {
      transform: translateY(-6px);
      box-shadow: 0 10px 25px rgba(0,0,0,0.2);
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
      box-shadow: 0 4px 12px rgba(0,0,0,0.15);
      transition: background 0.3s ease, transform 0.2s ease;
    }

    .button:hover {
      background: linear-gradient(135deg, #5a85f5, #8f45eb);
      transform: scale(1.03);
    }

    .back-button-container {
      text-align: left;
      padding: 20px 40px 0;
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

      .back-button-container {
        padding: 20px;
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


    <!-- Back button -->
    <div class="back-wrapper">
        <a href="{{ route('dashboard') }}" class="back-button">
            <i class="fas fa-arrow-left"></i> Back to Dashboard
        </a>

    </div>

  <h2>My Tickets</h2>

  <div class="section-title">Upcoming Events</div>
  <div class="ticket-row">
    <div>
      <div class="ticket-date">17 August 2025</div>
      <div class="ticket-card">
        <img src="https://www.centralpark.com/downloads/9882/download/summerstage-EmilyGoncalves.jpg?cb=b379bf412bd7ae8db9d7f451df9ef7bb&w=640" alt="Event 1">
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
        <img src="https://images.stockcake.com/public/7/0/a/70aec8d4-e329-417f-9da0-cf271c3c2278_large/disco-party-vibes-stockcake.jpg" alt="Event 2">
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
        <img src="https://asset-2.tstatic.net/tribunnews/foto/bank/images/anang-syahrini-ashanty_20150124_163558.jpg" alt="Event 3">
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
