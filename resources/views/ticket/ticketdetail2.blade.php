<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Concert Detail - FestiPass</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Font & SweetAlert -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <style>
    * {
      box-sizing: border-box;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background-color: #fff;
      margin: 0;
      padding: 0;
      color: #333;
    }

    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 1.2rem 2rem;
      background-color: #ffffff;
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

    .profile-link {
      text-decoration: none;
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
      transition: opacity 0.2s;
    }

    .profile:hover {
      opacity: 0.8;
    }

    .container {
      max-width: 700px;
      margin: 0 auto;
      padding: 30px 20px 100px;
      text-align: center;
    }

    h2 {
      font-size: 32px;
      font-weight: 700;
      background: linear-gradient(90deg, #6a93f8, #9b59f6);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      margin-bottom: 10px;
    }

    .section-box {
      background: #e7d1fb;
      color: #333;
      padding: 20px;
      border-radius: 16px;
      margin: 20px 0;
      text-align: left;
    }

    .section-box p {
      margin: 6px 0;
      font-size: 14px;
    }

    .section-box ul {
      padding-left: 16px;
      margin: 6px 0;
    }

    .feedback-section {
      margin-top: 40px;
    }

    .stars {
      display: flex;
      justify-content: center;
      gap: 5px;
      margin-bottom: 15px;
      font-size: 24px;
      cursor: pointer;
    }

    .stars span {
      color: #ccc;
    }

    .stars span.selected {
      color: gold;
    }

    textarea {
      width: 100%;
      padding: 12px;
      border-radius: 8px;
      border: none;
      resize: none;
      font-size: 14px;
      background: #f3eafd;
      margin-bottom: 20px;
      font-family: 'Poppins', sans-serif;
    }

    .btn {
      display: inline-block;
      background: linear-gradient(to right, #6a93f8, #9b59f6);
      color: white;
      padding: 12px 24px;
      border-radius: 999px;
      font-weight: 600;
      text-decoration: none;
      cursor: pointer;
      border: none;
      font-size: 14px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.15);
      margin-top: 10px;
    }

    .report-link {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      margin-top: 30px;
      background: linear-gradient(to right, #6a93f8, #9b59f6);
      color: #fff;
      padding: 10px 20px;
      border-radius: 999px;
      font-weight: 600;
      text-decoration: none;
      font-size: 14px;
      width: fit-content;
      margin-left: auto;
      margin-right: auto;
    }

    footer {
      margin-top: 60px;
      padding: 20px;
      font-size: 13px;
      color: #777;
      text-align: center;
    }
  </style>
</head>
<body>

  <!-- NAVBAR -->
  <div class="navbar">
    <h1>FestiPass</h1>
    <a href="/profile" class="profile-link">
      <div class="profile">👤</div>
    </a>
  </div>

  <div class="container">
    <h2>Concert Details</h2>
    <h3 style="font-size: 18px;">JKT48</h3>

    <div class="section-box">
      <p><strong>Order No.</strong> 1234567890</p>
      <p><strong>Purchased:</strong> Mon, 26 May 2025</p>
      <p><strong>Payment Method:</strong> BCA</p>
      <p><strong>Total Price:</strong> Rp600.000,00 (x3 Tickets)</p>
      <p><strong>Your Seat:</strong> VIP A4, VIP A5, VIP A6</p>
    </div>

    <div class="section-box">
      <p><strong>Date:</strong> Fri, 30 May 2025</p>
      <p><strong>Venue:</strong> Grand Indonesia 2nd Floor</p>
      <p><strong>Lineup:</strong> JKT48 New Gen</p>
      <p><strong>Rundown:</strong></p>
      <ul>
        <li>16.00 - 16.15 : Opening</li>
        <li>16.15 - 16.55 : Song 1</li>
        <li>16.55 - 17.35 : Song 2</li>
        <li>17.35 - 18.15 : Song 3</li>
        <li>18.15 - 18.30 : Closing</li>
      </ul>
    </div>

    <div class="feedback-section">
      <p><strong>Feedback</strong></p>
      <div class="stars" id="stars">
        <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
      </div>
      <textarea placeholder="Tulis feedback Anda di sini..."></textarea>
      <br>
      <button class="btn" onclick="sendFeedback()">Post</button>
    </div>

    <a href="/report" class="report-link">
      ❗ REPORT PROBLEM →
    </a>
  </div>

  <footer>
    &copy; 2025 FestiPass. All rights reserved.
  </footer>

  <script>
    // Klik bintang feedback
    const stars = document.querySelectorAll('#stars span');
    stars.forEach((star, index) => {
      star.addEventListener('click', () => {
        stars.forEach((s, i) => {
          s.classList.toggle('selected', i <= index);
        });
      });
    });

    function sendFeedback() {
      Swal.fire({
        icon: 'success',
        title: 'Your Feedback has been Sent!',
        confirmButtonText: 'OK',
        customClass: {
          popup: 'rounded-lg',
          confirmButton: 'bg-indigo-600 text-white px-4 py-2 rounded-full mt-4'
        }
      });
    }
  </script>

</body>
</html>
