<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: #f5f5f5;
        }

        header {
            background-color: #0066cc;
            color: #fff;
            padding: 1rem;
            text-align: center;
        }

        nav {
            display: flex;
            justify-content: center;
            gap: 1rem;
            background-color: #eee;
            padding: 0.5rem;
        }

        nav a {
            text-decoration: none;
            color: #333;
            padding: 0.5rem 1rem;
            border-radius: 5px;
        }

        nav a:hover {
            background-color: #ddd;
        }

        main {
            padding: 1rem;
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            justify-content: center;
        }

        .card {
            background-color: #fff;
            padding: 1rem;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
            width: 300px;
            text-align: center;
        }

        .map-container {
            width: 100%;
            max-width: 600px;
            height: 400px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
        }

        table th, table td {
            padding: 0.75rem;
            border: 1px solid #ccc;
            text-align: left;
        }

        footer {
            text-align: center;
            padding: 1rem;
            margin-top: 2rem;
            background-color: #0066cc;
            color: white;
        }
    </style>
</head>
<body>
    <header>
        <h1>Welcome to Grove-Cite Dashboard</h1>
        <p>Hello, <?php echo htmlspecialchars($_SESSION['full_name']); ?>!</p>
    </header>

    <nav>
        <a href="home.php">Home</a>
        <a href="dashboard.php">Dashboard</a>
        <a href="report.php">Submit Report</a>
        <a href="reportBrowser.php">Report Browser</a>
        <a href="chat.php">Chat AI</a>
        <a href="logout.php">Logout</a>
    </nav>

    <main>
        <!-- Map -->
        <div class="map-container" id="map"></div>

        <!-- Statistic Cards -->
        <div class="card">
            <h3>Total Reports</h3>
            <p><strong>56</strong></p>
        </div>

        <div class="card">
            <h3>Pending Tasks</h3>
            <p><strong>12</strong></p>
        </div>

        <div class="card">
            <h3>AI Messages Today</h3>
            <p><strong>34</strong></p>
        </div>

        <!-- Placeholder Table -->
        <div class="card" style="width: 100%; max-width: 900px;">
            <h3>Recent Users</h3>
            <table>
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Report</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>Faiz</td><td>Water Leakage</td><td>Resolved</td></tr>
                    <tr><td>Aina</td><td>Broken Lamp</td><td>Pending</td></tr>
                    <tr><td>Sarah</td><td>Blocked Drain</td><td>In Progress</td></tr>
                </tbody>
            </table>
        </div>
    </main>

    <footer>
        <p>&copy; 2025 Grove-Cite. All rights reserved.</p>
    </footer>

    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
    <script>
        const map = L.map('map').setView([3.0738, 101.5183], 15);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        L.marker([3.0738, 101.5183])
            .addTo(map)
            .bindPopup('MSU Campus')
            .openPopup();
    </script>
</body>
</html>
