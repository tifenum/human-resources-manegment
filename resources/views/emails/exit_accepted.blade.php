<!DOCTYPE html>
<html>
<head>
    <title>Exit Demand Accepted</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #4CAF50;
        }
        p {
            margin: 0 0 10px;
        }
        .details {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
        }
        .details p {
            margin: 5px 0;
        }
        .footer {
            font-size: 0.9em;
            color: #777;
            text-align: center;
            margin-top: 20px;
        }
        .footer a {
            color: #4CAF50;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Exit Demand Accepted</h1>
        <p>Dear {{ $user->name }},</p>
        <p>We are pleased to inform you that your exit demand has been accepted.</p>

        <div class="details">
            <p><strong>Request ID:</strong> {{ $exit->id }}</p>
            <p><strong>Exit Date:</strong> {{ $exit->exit_day}}</p>
            <p><strong>Reason for Exit:</strong> {{ $exit->reason }}</p>
            <p><strong>Status:</strong> Accepted</p>
        </div>

        <p>Thank you for your patience.</p>
        <p>Best regards,</p>
        <p>Human Resources</p>

        <div class="footer">
            <p>If you have any questions, feel free to <a href="mailto:hr@example.com">contact us</a>.</p>
        </div>
    </div>
</body>
</html>
