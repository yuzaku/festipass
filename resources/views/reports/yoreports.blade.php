<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Report - FestiPass</title>

    <!-- Font & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #fff;
            margin: 0;
            padding: 0;
            background-image: radial-gradient(#eef0ff 1px, transparent 1px);
            background-size: 24px 24px;
        }

        .header {
            background-color: #ffffff;
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #eee;
        }

        .logo {
            font-size: 26px;
            font-weight: 700;
            background: linear-gradient(90deg, #6a93f8, #9b59f6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .profile-icon {
            width: 40px;
            height: 40px;
            background-color: #6a93f8;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            font-size: 16px;
            text-decoration: none;
        }

        .back-wrapper {
            padding: 20px 40px 0;
        }

        .back-button {
            color: #6a93f8;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            margin-bottom: 20px;
        }

        .back-button i {
            font-size: 16px;
        }

        .container {
            padding: 20px 40px 40px;
            max-width: 900px;
            margin: auto;
        }

        h1 {
            font-size: 26px;
            font-weight: 700;
            background: linear-gradient(90deg, #6a93f8, #9b59f6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-align: center;
            margin-bottom: 40px;
        }

        .report {
            background-color: #f6f5ff;
            border-radius: 16px;
            margin-bottom: 30px;
            padding: 25px 30px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            border: 1px solid #e4e1ff;
        }

        .date-label {
            font-size: 14px;
            color: #999;
            margin-bottom: 10px;
            font-weight: 600;
        }

        .report-header {
            font-size: 20px;
            font-weight: 600;
            color: #4d3ad8;
        }

        .report-subtitle {
            font-weight: 600;
            color: #666;
            margin: 10px 0 10px;
        }

        .report-detail {
            background-color: #eae6ff;
            border-radius: 12px;
            padding: 16px;
            color: #333;
            margin-bottom: 15px;
        }

        .status {
            display: inline-block;
            padding: 6px 14px;
            border-radius: 999px;
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 8px;
        }

        .status.approved {
            background-color: #d0fbe6;
            color: #099b5d;
        }

        .status.rejected {
            background-color: #ffe1e1;
            color: #d93025;
        }

        .response {
            font-size: 14px;
            color: #555;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="header">
        <div class="logo">FestiPass</div>
        <a href="{{ route('profile.show') }}" class="profile-icon">
            <i class="fas fa-user"></i>
        </a>
    </div>

    <!-- Back button -->
    <div class="back-wrapper">
        <a href="{{ route('my.tickets') }}" class="back-button">
            <i class="fas fa-arrow-left"></i> Back to My Tickets
        </a>

    </div>

    <!-- Main Content -->
    <div class="container">
        <h1>Your Report</h1>

        <!-- Report 1 -->
        <div class="report">
            <div class="date-label">14 October 2024</div>
            <div class="report-header">Discofest 2024</div>
            <div class="report-subtitle">Problem : Refund</div>
            <div class="report-detail">
                Saya ingin mengajukan refund untuk konser Discofest yang telah saya hadiri pada tanggal 14 Oktober 2024. Saya meminta refund karena saya merasa tidak puas dengan kondisi venue dan kualitas suara yang buruk. Hal ini sangat memengaruhi pengalaman saya sebagai penonton, sehingga saya merasa perlu mengajukan pengembalian dana.
                <br><br>Mohon pertimbangannya terkait hal ini. Terima kasih.
            </div>
            <div class="status rejected">❌ Rejected</div>
            <div class="response">
                Maaf, sesuai dengan kebijakan kami, refund tidak dapat diberikan setelah acara berlangsung dan selesai, kecuali dalam kasus tertentu seperti pembatalan acara atau gangguan besar yang telah kami konfirmasi.
            </div>
        </div>

        <!-- Report 2 -->
        <div class="report">
            <div class="date-label">05 August 2024</div>
            <div class="report-header">ECULF 3.0</div>
            <div class="report-subtitle">Problem : Refund</div>
            <div class="report-detail">
                Saya ingin mengajukan refund karena terdapat acara mendadak pada hari konser, sehingga saya tidak dapat menghadiri konser.
            </div>
            <div class="status approved">✔️ Approved</div>
        </div>
    </div>
</body>
</html>
