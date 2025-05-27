<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FestiPass - Your Report</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #f0f0f0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 40px;
        }

        .logo {
            font-size: 24px;
            font-weight: 700;
            color: #6C4FFF;
        }

        .user-icon {
            width: 40px;
            height: 40px;
            background-color: #6C4FFF;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }

        h1 {
            text-align: center;
            color: #6C4FFF;
            margin-top: 40px;
        }

        .report-container {
            max-width: 800px;
            margin: 30px auto;
        }

        .report-box {
            background-color: #4433D1;
            color: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .report-header {
            font-weight: 600;
            margin-bottom: 10px;
        }

        .report-detail {
            background-color: #8C7FF8;
            padding: 15px;
            border-radius: 8px;
            margin-top: 10px;
            color: #f0f0f0;
        }

        .status {
            margin-top: 15px;
            font-weight: bold;
            display: flex;
            align-items: center;
        }

        .status.approved {
            color: #3DDC84;
        }

        .status.rejected {
            color: #FF4B4B;
        }

        .status-icon {
            margin-right: 8px;
        }

        .note {
            font-size: 14px;
            margin-top: 5px;
        }

        .date {
            font-weight: 600;
            margin-bottom: 8px;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">FestiPass</div>
        <div class="user-icon">👤</div>
    </header>

    <h1>Your Report</h1>

    <div class="report-container">
        @foreach ($reports as $report)
            <div class="date">{{ \Carbon\Carbon::parse($report->created_at)->format('d F Y') }}</div>
            <div class="report-box">
                <div class="report-header">{{ $report->event_name }}</div>
                <div class="report-detail">
                    <strong>Problem : </strong>{{ $report->problem_type }}<br>
                    <strong>Detail : </strong><br>
                    {{ $report->details }}
                </div>

                <div class="status {{ strtolower($report->status) }}">
                    <span class="status-icon">
                        @if($report->status === 'Approved')
                            ✔
                        @elseif($report->status === 'Rejected')
                            ❌
                        @endif
                    </span>
                    {{ $report->status }}
                </div>

                @if($report->status === 'Rejected')
                    <div class="note">
                        Maaf, sesuai dengan kebijakan kami, refund tidak dapat diberikan setelah acara berlangsung dan selesai,
                        kecuali dalam kasus tertentu seperti pembatalan acara atau gangguan besar yang telah kami konfirmasi.
                    </div>
                @endif
            </div>
        @endforeach
    </div>
</body>
</html>
