<div class="content">
    <nav class="navbar fixed-top navbar-light bg-light">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="assets/img/actscc_logo.png" width="50" height="50" class="d-inline-block align-top" alt="Logo">
            <span id="alumniText" class="ml-2"
                style="font-family: 'Arial', sans-serif; font-weight: bold; color: black; margin-left: 10px;">
                ALUMNI TRACER SYSTEM
            </span>
        </a>
        <div class="ml-auto d-flex align-items-center">
            <a href="#" class="mr-3 text-dark" title="Notifications">
                <img src="assets/img/notification-bell.png" alt="Notifications" width="25" height="25">
            </a>
            <div class="dropdown">
                <a class="nav-link dropdown-toggle text-dark d-flex align-items-center" href="#" id="profileDropdown"
                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="assets/img/user.png" alt="Profile" class="rounded-circle" width="30" height="30">
                    <span class="ml-2">Profile</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profileDropdown">
                    <a class="dropdown-item" href="#">Settings</a>
                    <a class="dropdown-item" href="../capstone/index.php">Logout</a>
                </div>
            </div>
        </div>


    </nav>

    <div class="sidebar" id="sidebar"
        style="position: fixed; top: 60px; left: 0; width: 350px; height: 100%; background-color: #f8f9fa; padding-top: 20px; z-index: 1000;">
        <ul class="list-group">
            <li class="list-group-item">
                <a href="../Capstone/dash.php">
                    <img src="assets/img/speedometer.png" width="20" height="20" alt="Dashboard" class="mr-2">Dashboard
                </a>
            </li>
            <li class="list-group-item dropdown">
                <a class="" href="../capstone/bsit.php" id="manageAlumniDropdown" role="button" aria-haspopup="true"
                    aria-expanded="false">
                    <img src="assets/img/student.png" width="20" height="20" alt="Alumni Courses" class="mr-2">List of
                    Submitted Form
                </a>
                <!-- <div class="dropdown-menu" aria-labelledby="manageAlumniDropdown">
                    <a class="dropdown-item" href="../CAPSTONEDASHBOARD/bsit.php">
                        <img src="assets/img/bsit-icon.png" width="15" height="15" alt="BSIT" class="mr-2">
                    </a>
                    <a class="dropdown-item" href="#">
                        <img src="assets/img/bscs-icon.png" width="15" height="15" alt="BSCS" class="mr-2">
                    </a>
                    <a class="dropdown-item" href="#">
                        <img src="assets/img/bsba-icon.png" width="15" height="15" alt="BSBA" class="mr-2">
                    </a>
                </div> -->
            </li>
            <li class="list-group-item"
                style="position: relative; display: flex; align-items: center; justify-content: space-between;">
                <a href="#">
                    <img src="assets/img/megaphone.png" width="20" height="20" alt="Reports" class="mr-2">
                    Employ and Not-Employ Graphical Reports
                </a>
                <img src="assets/img/down-arrow.png" alt="Dropdown" class="dropdown-icon" width="20" height="20"
                    style="cursor: poindown-arrowter;">

                    <li class="list-group-item">
                    <a href="./views/report_graph.php">Employment Report</a>
        <img src="assets/img/chart.png" width="20" height="20" alt="Reports" class="mr-2">Employment Report
    </a>
</li>
                   

            <li class="list-group-item">
                <a href="../capstone/file.php">
                    <img src="assets/img/megaphone.png" width="20" height="20" alt="Reports" class="mr-2">Course-Job
                    Misalignment Graphical
                    Reports
                </a>
            </li>
            <li class="list-group-item">
                <a href="../capstone/management.php">
                    <img src="assets/img/usermanagement.png" width="20" height="20" alt="User Management"
                        class="mr-2">User Management
                </a>
            </li>
        </ul>
    </div>
    <style>
    .sidebar .list-group-item {
        position: relative;
        /* Ensure parent is positioned */
    }

    .sidebar .list-group-item a {
        color: #333;
        text-decoration: none;
        display: flex;
        align-items: center;
    }

    .side-dropdown {
        display: none;
        position: absolute;
        /* Ensures it overlaps instead of pushing content */
        top: 100%;
        left: 0;
        background-color: white;
        list-style: none;
        padding: 10px;
        margin-top: 5px;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        width: 250px;
        max-height: 200px;
        overflow-y: auto;
        border-radius: 5px;
        z-index: 9999;
        /* Ensures it appears on top */
    }


    .list-group-item {
        position: relative;
        /* Prevents dropdown from affecting layout */
    }

    .side-dropdown.show {
        display: block;
    }

    .dropdown-icon {
        transition: transform 0.3s ease;
        cursor: pointer;
    }

    .dropdown-icon.active {
        transform: rotate(180deg);
    }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const allDropdowns = document.querySelectorAll(".side-dropdown");
        const dropdownIcons = document.querySelectorAll(".dropdown-icon");

        dropdownIcons.forEach((icon, index) => {
            icon.addEventListener("click", function(e) {
                e.stopPropagation();

                allDropdowns.forEach((dropdown, i) => {
                    if (i !== index) {
                        dropdown.classList.remove("show");
                        dropdownIcons[i].classList.remove("active");
                    }
                });

                const dropdown = icon.parentElement.querySelector(".side-dropdown");
                dropdown.classList.toggle("show");
                icon.classList.toggle("active");
            });
        });

        document.addEventListener("click", function() {
            allDropdowns.forEach((dropdown) => {
                dropdown.classList.remove("show");
            });

            dropdownIcons.forEach((icon) => {
                icon.classList.remove("active");
            });
        });
    });
    </script>