<!-- resources/views/yoreports.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Report - FestiPass</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #fff;
            margin: 0;
            padding: 0;
        }
        .header {
            background-color: #f5f5f5;
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .logo {
            font-size: 28px;
            color: #6c4cf1;
            font-weight: bold;
        }
        .profile-icon {
            width: 36px;
            height: 36px;
            background-color: #6c4cf1;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            font-size: 18px;
        }
        .container {
            padding: 40px;
        }
        h1 {
            color: #6c4cf1;
            text-align: center;
        }
        .report {
            background-color: #5746ea;
            border-radius: 8px;
            margin: 30px auto;
            max-width: 700px;
            padding: 20px;
            color: white;
        }
        .report-header {
            font-weight: bold;
            font-size: 18px;
        }
        .report-subtitle {
            margin: 10px 0 5px;
            font-weight: bold;
        }
        .report-detail {
            background-color: #9b8dfb;
            border-radius: 6px;
            padding: 15px;
            margin-bottom: 15px;
        }
        .status {
            display: flex;
            align-items: center;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .status.approved {
            color: #00d084;
        }
        .status.rejected {
            color: #ff4d4f;
        }
        .status i {
            margin-right: 6px;
        }
        .response {
            font-size: 14px;
            color: white;
        }
        .date-label {
            font-weight: bold;
            font-size: 14px;
            margin: 0 0 5px 5px;
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
        <div class="date-label">14 October 2024</div>
        <div class="report">
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
        <div class="date-label">05 August 2024</div>
        <div class="report">
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
