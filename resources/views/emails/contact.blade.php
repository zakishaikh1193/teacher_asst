<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Message</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .container {
            width: 100%;
            max-width: 700px;
            margin: 30px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .header {
            background-color: #4CAF50;
            color: #fff;
            padding: 20px;
            text-align: center;
            border-radius: 8px 8px 0 0;
        }

        .header h2 {
            margin: 0;
        }

        .content {
            padding: 20px;
        }

        .content p {
            font-size: 16px;
            line-height: 1.6;
            margin: 10px 0;
        }

        .content .info {
            margin-bottom: 10px;
        }

        .content .info strong {
            color: #4CAF50;
            font-weight: bold;
        }

        .content .info span {
            color: #000;
            /* Black for the data */
        }

        .content .message {
            background-color: #f9f9f9;
            padding: 15px;
            border-left: 5px solid #4CAF50;
            font-style: italic;
            margin-top: 20px;
        }

        .footer {
            text-align: center;
            font-size: 14px;
            color: #888;
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
        <div class="header">
            <h2>New Contact Message from {{ $data['name'] }}</h2> 
        </div>
        <div class="content">
            <p class="info"><strong>Name:</strong> {{ $data['name'] }}</p>
            <p class="info"><strong>Email:</strong> {{ $data['email'] }}</p>
            <p class="info"><strong>Phone:</strong> {{ $data['phone'] ?? 'N/A' }}</p>
            <p class="info"><strong>Subject:</strong> {{ $data['subject'] }}</p>
            <p class="info"><strong>Message:</strong></p>
            <p class="message">{{ $data['message'] }}</p>
        </div>
        <div class="footer">
            <p>Thank you for your attention! Please respond to the sender as soon as possible.</p>
        </div>
    </div>
</body>

</html>
