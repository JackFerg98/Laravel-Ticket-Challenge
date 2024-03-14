<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Challenge</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
            padding: 20px;
        }

        h1 {
            color: #333;
        }

        h2 {
            color: #444;
        }

        code {
            background-color: #f8f8f8;
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 2px 6px;
        }

        pre code {
            display: block;
            padding: 10px;
            overflow-x: auto;
            border-radius: 4px;
        }

        pre {
            background-color: #f8f8f8;
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 10px;
            overflow-x: auto;
        }

        .container {
            max-width: 800px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .highlight {
            background-color: #ffecec;
            border: 1px solid #f5aca6;
            border-radius: 4px;
            padding: 15px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Laravel Challenge</h1>
        <p>This project is a Laravel-based application developed for the Laravel challenge. Follow the instructions below to set up and run the project.</p>

        <h2>Getting Started</h2>
        <ol>
            <li><strong>Clone the Repository:</strong><br>
                <code>git clone &lt;repository-url&gt;</code></li>
            <li><strong>Navigate to the Project Directory:</strong><br>
                <code>cd ticket-challenge</code></li>
            <li><strong>Install Dependencies:</strong><br>
                <code>composer install</code></li>
            <li><strong>Start Docker Environment:</strong><br>
                <code>./vendor/bin/sail up -d --build</code></li>
        </ol>

        <h2>Database Setup</h2>
        <ol>
            <li><strong>Run Migrations:</strong><br>
                <code>./vendor/bin/sail artisan migrate</code></li>
            <li><strong>Seed the Database:</strong><br>
                <code>./vendor/bin/sail artisan db:seed --class=UserSeeder</code></li>
        </ol>

        <h2>Running the Application</h2>
        <ol>
            <li><strong>Run Scheduler</strong> (for main functionality):<br>
                <code>./vendor/bin/sail artisan schedule:work</code></li>
        </ol>

        <h2>Testing</h2>
        <ol>
            <li><strong>Run PHPUnit Tests:</strong><br>
                <code>./vendor/bin/sail artisan test</code></li>
        </ol>

        <h2>Troubleshooting</h2>
        <p>If you encounter any issues during setup or while running the application, refer to the <a href="https://laravel.com/docs" target="_blank">Laravel documentation</a> or seek assistance from the community forums.</p>
    </div>
</body>

</html>
