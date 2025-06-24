<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
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
      box-shadow: 0 10px 25px rgba(0,0,0,0.2);
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
      box-shadow: 0 -1px 6px rgba(0,0,0,0.05);
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

  <!-- Navbar -->
  <div class="navbar">
    <h1>FestiPass</h1>
    <div class="profile">👤</div>
  </div>

  <!-- Header -->
  <main class="container">
    <h1 class="ticket-header">Ticket List</h1>
    <h3 class="sub-header">Your Tickets</h3>

    <div class="ticket-list-container">

      <!-- Ticket 1 - Clickable -->
      <a href="/ticket-detail" class="ticket-card">
        <img src="https://www.centralpark.com/downloads/9882/download/summerstage-EmilyGoncalves.jpg?cb=b379bf412bd7ae8db9d7f451df9ef7bb&w=640" alt="Sisforia" class="ticket-image">
        <div class="ticket-date">12 June 2025</div>
        <div class="ticket-content">
          <div class="event-title">SISFORIA : TGIF!</div>
          <p>x3 Tickets</p>
          <p>Departemen SI</p>
          <div class="status">Purchase Successful</div>
        </div>
      </a>

      <!-- Ticket 2 -->
      <a href="/ticket-detail2" class="ticket-card">
        <img src="https://cdn.rri.co.id/berita/Wamena/o/1739006348156-Snapinst.app_476394343_18396909964102081_3171263940863360846_n_1080/tomutwkdiq1vkqe.jpeg" alt="Sisforia" class="ticket-image">
        <div class="ticket-date">30 May 2025</div>
        <div class="ticket-content">
          <div class="event-title">JKT48</div>
          <p>x3 Tickets</p>
          <p>Grand Indonesia 2nd Floor</p>
          <div class="status">Purchase Successful</div>
        </div>
      </a>

      <!-- Ticket 3 -->
      <a href="/ticket-detail3" class="ticket-card">
        <img src="https://asset.kompas.com/crops/pJGeAbFRyF_nbfKf8N-CLCJNMII=/0x0:750x500/1200x800/data/photo/2022/01/14/61e0fed042581.png" alt="Sisforia" class="ticket-image">
        <div class="ticket-date">30 May 2025</div>
        <div class="ticket-date">01 February 2025</div>
        <div class="ticket-content">
          <div class="event-title">Dewa 19</div>
          <p>x3 Tickets</p>
          <p>The Taman Dayu Park</p>
          <div class="status">Purchase Successful</div>
        </div>
      </a>

    </div>
  </main>

  <!-- Footer -->
  <footer>
    &copy; 2025 FestiPass. All rights reserved.
  </footer>

</body>
</html>
