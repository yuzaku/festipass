<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Report - FestiPass</title>

    <!-- Import Google Font Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

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
            background-color: #d3d6dd;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #6c4cf1;
            font-size: 20px;
        }

        .container {
            padding: 40px 20px;
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

        .btn-gradient {
            background: linear-gradient(to right, #6a93f8, #9b59f6);
            color: white;
            padding: 8px 16px;
            border-radius: 8px;
            border: none;
            font-weight: 600;
            font-family: 'Poppins', sans-serif;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo">FestiPass</div>
        <div class="profile-icon">👤</div>
    </div>

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
