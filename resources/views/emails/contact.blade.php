<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $subject }}</title>
    <style>
        body {
            background-color: #f7f9fb;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .email-container {
            max-width: 600px;
            margin: 40px auto;
            background-color: #ffffff;
            padding: 40px 30px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .email-content {
            color: #333333;
            font-size: 16px;
            line-height: 1.6;
        }

        .email-content h2 {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .email-content a {
            color: #0a66c2;
            text-decoration: none;
        }

        .email-footer {
            margin-top: 30px;
            font-size: 12px;
            color: #2f2f2f;
            line-height: .3px;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <div class="email-content">
            <p><strong>Subject: </strong> {{ $subject }}</p>
            <h2>Dear {{ $name }},</h2>
            <p>{{ $userMessage }}</p>
            
            <div class="email-footer">
                <p>Mobile: {{ $phone }} </p>
                <p>Best regards,</p>
                <p>{{ $companyName }} Team</p>
            </div>
        </div>
    </div>
</body>

</html>
