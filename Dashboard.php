<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Cards</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.5/main.min.css" />
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 200vh;
            background-color: #f4f4f4;
            color: #333;
            font-family: 'Poppins', sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            transition: background-color 0.3s, color 0.3s;
        }

        .container {
            width: 80%;
            max-width: 1000px; /* Reduced width */
            height: 80%; /* Increased height */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
            transition: background-color 0.3s, box-shadow 0.3s;
            display: flex;
            flex-direction: column;
            align-items: center;
            overflow: hidden; /* Prevent overflow */
        }

        .dashboard {
            display: flex;
            gap: 20px;
            justify-content: center;
            margin-bottom: 20px;
            width: 100%;
            flex-wrap: wrap;
        }

        .card {
            flex: 1;
            max-width: calc(33.333% - 20px); /* Ensures cards fit in the container with gaps */
            height: 150px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            border-radius: 10px;
            color: white;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            transition: background-color 0.3s, box-shadow 0.3s;
        }

        .card h2 {
            margin: 0 0 10px;
            font-size: 18px;
        }

        .card p {
            margin: 0;
            font-size: 16px;
        }

        .orange {
            background-color: #FFA500; /* Orange */
        }

        .green {
            background-color: #008000; /* Green */
        }

        .maroon {
            background-color: #800000; /* Maroon */
        }

        .calendar-container {
            width: 100%;
            height: 100px; /* Set a fixed height for the calendar */
        }

        .button-container {
            display: flex;
            gap: 20px;
            justify-content: center;
            margin-top: 20px;
        }

        .btn {
            width: 300px;
            height: 80px;
            text-decoration: none;
            border: none;
            border-radius: 8px;
            color: white;
            font-size: 20px; /* Increased font size */
            font-weight: bold;
            display: flex;
            align-items: center; /* Center text vertically */
            justify-content: center; /* Center text horizontally */
            cursor: pointer;
            transition: background-color 0.3s ease, opacity 0.3s;
            text-align: center;
        }

        .orange-btn {
            background-color: #FFA500; /* Orange */
        }

        .green-btn {
            background-color: #008000; /* Green */
        }

        .maroon-btn {
            background-color: #800000; /* Maroon */
        }

        .btn:hover {
            opacity: 0.9;
        }

        /* Dark Mode Styles */
        .dark-mode body {
            background-color: #1e1e1e;
            color: #e0e0e0;
        }

        .dark-mode .container {
            background-color: #2e2e2e;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        .dark-mode .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        .dark-mode .orange-btn {
            background-color: #FF8C00; /* Darker Orange */
        }

        .dark-mode .green-btn {
            background-color: #006400; /* Darker Green */
        }

        .dark-mode .maroon-btn {
            background-color: #660000; /* Darker Maroon */
        }

        .toggle-container {
            position: absolute;
            top: 20px;
            right: 20px;
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        .toggle-container i {
            font-size: 24px;
            margin-left: 10px;
            transition: color 0.3s;
        }

        .toggle-container i.sun {
            color: #f1c40f; /* Yellow for sun */
        }

        .toggle-container i.moon {
            color: #34495e; /* Dark color for moon */
        }

        .dark-mode .toggle-container i.sun {
            color: #f39c12; /* Darker yellow for sun in dark mode */
        }

        .dark-mode .toggle-container i.moon {
            color: #ecf0f1; /* Lighter color for moon in dark mode */
        }
    </style>
</head>
<body>
    <div class="toggle-container" id="toggle-mode">
        <i class="fas fa-sun sun"></i>
        <i class="fas fa-moon moon"></i>
    </div>
    <div class="container">
        <div class="dashboard">
            <div class="card orange">
                <h2>No of Employees</h2>
                <p>16</p>
            </div>
            <div class="card green">
                <h2>No of Checks Received</h2>
                <p>2</p>
            </div>
            <div class="card maroon">
                <h2>No of Days Worked</h2>
                <p>23</p>
            </div>
        </div>
        <div class="button-container">
            <a href="add-employees.php" class="btn orange-btn">Add Employees</a>
            <a href="search-employees.php" class="btn green-btn">Search Employees</a>
            <a href="add-checks.php" class="btn maroon-btn">Add Checks</a>
        </div>
        <div class="calendar-container">
            <div id="calendar"></div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.5/main.min.js"></script>
    <script>
        // Toggle dark mode
        const toggle = document.getElementById('toggle-mode');
        toggle.addEventListener('click', () => {
            document.body.classList.toggle('dark-mode');
        });

        // Initialize FullCalendar
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                editable: true,
                selectable: true,
            });
            calendar.render();
        });
    </script>
</body>
</html>
