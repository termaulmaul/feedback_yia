<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }

        header {
            background-color: #242632;
            color: #fff;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #1d1f2a;
        }

        header h1 {
            margin: 0;
            font-size: 1.5em;
        }

        .profile {
            display: flex;
            align-items: center;
        }

        .profile img {
            border-radius: 50%;
            width: 40px;
            height: 40px;
            margin-right: 10px;
        }

        .profile span {
            font-size: 1em;
        }

        nav {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
        }

        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        nav ul li {
            margin: 0 10px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        nav ul li a:hover {
            background-color: #444;
            text-decoration: none;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            border-radius: 8px;
        }

        .charts-wrapper {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            flex-wrap: wrap;
        }

        .chart-container {
            flex: 1 1 calc(33.333% - 20px); /* Adjusted to fit 3 items per row with gaps */
            box-sizing: border-box;
            max-width: calc(33.333% - 20px); /* Ensures charts don't exceed container width */
            margin-bottom: 20px; /* Add some spacing below each chart */
        }

        .chart {
            width: 100%;
            height: 250px; /* Reduced height to fit better */
        }

        .chart-title {
            font-size: 1em; /* Adjusted font size */
            margin-top: 10px;
            color: #242632;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #242632;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        .button {
            background-color: #242632;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s ease;
            display: block;
            margin: 20px auto;
            text-align: center;
            text-decoration: none;
        }

        .button:hover {
            background-color: #1d1f2a;
        }
    </style>
</head>
<body>
    <header>
        <h1>Admin Dashboard</h1>
        <div class="profile">
            <img src="https://web3school.com/assets/images/logo.svg" alt="Avatar">
            <span>{{ Auth::user()->name }}</span>
        </div>
    </header>
    <nav>
        <ul>
            <li><a href="/admin">Dashboard</a></li>
            <li><a href="/admin/questions">Questions</a></li>
            <li><a href="/admin/responses">Responses</a></li>
            <li><a href="/admin/settings">Settings</a></li>
            <li>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="button">Logout</button>
                </form>
            </li>
        </ul>
    </nav>
    <div class="container">
        <div class="charts-wrapper">
            <div class="chart-container">
                <div class="chart">
                    <canvas id="facilityChart"></canvas>
                </div>
                <div class="chart-title">Facility Rating Distribution</div>
            </div>
            <div class="chart-container">
                <div class="chart">
                    <canvas id="staffChart"></canvas>
                </div>
                <div class="chart-title">Staff Rating Distribution</div>
            </div>
            <div class="chart-container">
                <div class="chart">
                    <canvas id="processChart"></canvas>
                </div>
                <div class="chart-title">Process Rating Distribution</div>
            </div>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Facility Rating</th>
                    <th>Staff Rating</th>
                    <th>Process Rating</th>
                    <th>Suggestion</th>
                    <th>Contact Info</th>
                </tr>
            </thead>
            <tbody>
                @foreach($feedbacks as $feedback)
                <tr>
                    <td>{{ $feedback->facility_rating }}</td>
                    <td>{{ $feedback->staff_rating }}</td>
                    <td>{{ $feedback->process_rating }}</td>
                    <td>{{ $feedback->suggestion }}</td>
                    <td>{{ $feedback->contact_info }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Facility Rating Chart
            const ctx1 = document.getElementById('facilityChart').getContext('2d');
            new Chart(ctx1, {
                type: 'pie',
                data: {
                    labels: ['Rating 1', 'Rating 2', 'Rating 3', 'Rating 4', 'Rating 5'],
                    datasets: [{
                        data: [{{ $facilityRatings[1] ?? 0 }}, {{ $facilityRatings[2] ?? 0 }}, {{ $facilityRatings[3] ?? 0 }}, {{ $facilityRatings[4] ?? 0 }}, {{ $facilityRatings[5] ?? 0 }}],
                        backgroundColor: ['#8B0000', '#FF0000', '#FFFF00', '#FFA500', '#008000'],
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    let label = context.label || '';
                                    let value = context.raw || 0;
                                    if (value > 0) {
                                        label += ': ' + value;
                                    }
                                    return label;
                                }
                            }
                        }
                    }
                }
            });

            // Staff Rating Chart
            const ctx2 = document.getElementById('staffChart').getContext('2d');
            new Chart(ctx2, {
                type: 'pie',
                data: {
                    labels: ['Rating 1', 'Rating 2', 'Rating 3', 'Rating 4', 'Rating 5'],
                    datasets: [{
                        data: [{{ $staffRatings[1] ?? 0 }}, {{ $staffRatings[2] ?? 0 }}, {{ $staffRatings[3] ?? 0 }}, {{ $staffRatings[4] ?? 0 }}, {{ $staffRatings[5] ?? 0 }}],
                        backgroundColor: ['#8B0000', '#FF0000', '#FFFF00', '#FFA500', '#008000'],
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    let label = context.label || '';
                                    let value = context.raw || 0;
                                    if (value > 0) {
                                        label += ': ' + value;
                                    }
                                    return label;
                                }
                            }
                        }
                    }
                }
            });

            // Process Rating Chart
            const ctx3 = document.getElementById('processChart').getContext('2d');
            new Chart(ctx3, {
                type: 'pie',
                data: {
                    labels: ['Rating 1', 'Rating 2', 'Rating 3', 'Rating 4', 'Rating 5'],
                    datasets: [{
                        data: [{{ $processRatings[1] ?? 0 }}, {{ $processRatings[2] ?? 0 }}, {{ $processRatings[3] ?? 0 }}, {{ $processRatings[4] ?? 0 }}, {{ $processRatings[5] ?? 0 }}],
                        backgroundColor: ['#8B0000', '#FF0000', '#FFFF00', '#FFA500', '#008000'],
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    let label = context.label || '';
                                    let value = context.raw || 0;
                                    if (value > 0) {
                                        label += ': ' + value;
                                    }
                                    return label;
                                }
                            }
                        }
                    }
                }
            });
        });
    </script>
</body>
</html>
