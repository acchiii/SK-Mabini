<?php
session_start();
include '../../connection/config.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] == 'Youth') {
  header("Location: ../../index.php?msg=Invalid Action!&msgtype=warning");
  exit;
}

$role = 'Youth';
$male = 'Male';
$female = 'Female';

$youths = $conn->query("SELECT id FROM users WHERE role='$role'");
$females = $conn->query("SELECT id FROM users WHERE gender='$female' and role='$role'");
$males = $conn->query("SELECT id FROM users WHERE role='$role' and gender='$male'");
$events = $conn->query("SELECT id FROM events");
$ongoingprojects = $conn->query("SELECT id FROM projects where project_status='Ongoing'");
$totalbudget = $conn->query("SELECT total_budget FROM budget where end_year='2026'");
$budgetr = $totalbudget->fetch_assoc();
$used = $budgetr['total_budget'] / 2.5;

$youth_participation_labels = "'Jan', 'Feb', 'Mar', 'Apr', 'May'";
$youth_participation = "$youths->num_rows, $youths->num_rows, $youths->num_rows, $youths->num_rows, $youths->num_rows";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard | SK Mabini</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../css/styles.css">
  <link rel="shortcut icon" href="../../images/fav2.png" type="image/x-icon">
  <style>
    body.sidebar-open {
      overflow: hidden;
    }
  </style>
</head>

<body class="bg-dark font-poppins text-textLight flex flex-col md:flex-row overflow-x-hidden">

  <!-- Sidebar -->
  <aside id="sidebar"
    class="hidden md:flex sticky  w-64 top-0 left-0 max-h-[100dvh] bg-dark border-r border-border transform -translate-x-full md:translate-x-0 transition-all duration-300 ease-in-out z-50">
    <div class="p-4 flex flex-col h-full">
      <h1 class="text-xl font-bold text-primary mb-6 text-center">SK Mabini</h1>
      <nav class="space-y-2 flex-1 overflow-y-auto">
        <a href="#" class="block p-2 rounded bg-primary hover:bg-primaryHover transition">🏠 Dashboard</a>
        <a href="./announcements.php" class="block p-2 rounded hover:bg-primaryHover transition">📢 Announcements</a>
        <a href="./events.php" class="block p-2 rounded hover:bg-primaryHover transition">📆 Events</a>
        <a href="./projects.php" class="block p-2 rounded hover:bg-primaryHover transition">📁 Projects</a>
        <a href="./finances.php" class="block p-2 rounded hover:bg-primaryHover transition">💰 Finances</a>
        <a href="./users.php" class="block p-2 rounded hover:bg-primaryHover transition">👥 Youth</a>
        <a href="./reports.php" class="block p-2 rounded hover:bg-primaryHover transition">💬 Feedbacks</a>
        <a href="../logout.php" class="block p-2 rounded hover:bg-primaryHover transition">🔒 Logout</a>
      </nav>
    </div>
  </aside>


  <!-- Main content -->
  <div id="main-content" class="flex-1 flex-col min-h-screen transition-all duration-300 ease-in-out w-full">

    <!-- Header -->
    <header
      class="md:hidden w-full bg-card border-b border-border p-4 flex justify-between items-center sticky top-0 z-30">
      <div class="flex items-center gap-3">
        <h2 class="text-base sm:text-lg md:text-xl font-semibold truncate">Dashboard Overview</h2>
      </div>

      <div class="flex items-center gap-4">
        <span class="flex md:hidden text-textMuted">Admin</span>

        <img
          src="<?= $_SESSION['profile'] == '' ? '../../images/icon.png' : '../../connection/' . $_SESSION['profile'] ?>"
          class="headericon hidden !w-8 !h-8 sm:!w-9 sm:!h-9 object-fit rounded-full border border-border max-h-[50px] max-w-5"
          alt="Admin" />
        <div
          class="md:hidden w-8 h-8 sm:w-9 sm:h-9 rounded-full border border-border overflow-hidden flex items-center justify-center">
          <button id="menu-btn"
            class="relative z-50 w-10 h-10 p-2 rounded-full bg-card text-textLight shadow-lg flex items-center justify-center transition-all duration-300 md:hidden">
            <svg id="menu-icon" class="w-6 h-6 transition-transform duration-300" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <line x1="3" y1="6" x2="21" y2="6" class="line1 transition-all duration-300" />
              <line x1="3" y1="12" x2="21" y2="12" class="line2 transition-all duration-300" />
              <line x1="3" y1="18" x2="21" y2="18" class="line3 transition-all duration-300" />
            </svg>
          </button>
        </div>

        <div id="mobile-menu"
          class="hidden absolute top-0 w-64 right-0 mt-10 mr-10 bg-dark border border-border text-textLight rounded-xl shadow-xl overflow-hidden z-40 md:hidden">
          <div class=" text-textLight rounded-xl ml-0 z-50 w-64 text-left">
            <a href="#" class="block p-2 rounded bg-primaryHover hover:bg-primaryHover transition text-left">🏠
              Dashboard</a>
            <a href="./announcements.php" class="block p-2 rounded hover:bg-primaryHover transition text-left">📢
              Announcements</a>
            <a href="./events.php" class="block p-2 rounded hover:bg-primaryHover transition text-left">📆 Events</a>
            <a href="./projects.php" class="block p-2 rounded hover:bg-primaryHover transition text-left">📁
              Projects</a>
            <a href="./finances.php" class="block p-2 rounded hover:bg-primaryHover transition text-left">💰
              Finances</a>
            <a href="./users.php" class="block p-2 rounded hover:bg-primaryHover transition text-left">👥 Youth</a>
            <a href="./reports.php" class="block p-2 rounded hover:bg-primaryHover transition ttext-left">💬 Feedbacks</a>
            <a href="../logout.php" class="block p-2 rounded hover:bg-primaryHover transition text-left">🔒 Logout</a>
          </div>

        </div>
    </header>



    <script>
      const line1 = document.querySelector('.line1');
      const line2 = document.querySelector('.line2');
      const line3 = document.querySelector('.line3');



      const mobileMenu = document.getElementById('mobile-menu');

      document.getElementById("menu-btn").addEventListener("click", () => {
        mobileMenu.classList.toggle("hidden");
        line1.classList.toggle('rotate-45');
        line1.classList.toggle('translate-y-0');

        line2.classList.toggle('rotate-0');
        line2.classList.toggle('translate-y-0');

        line3.classList.toggle('-rotate-45');
        line3.classList.toggle('-translate-y-0');

      });

      // Select all links inside the mobile menu
      const menuLinks = mobileMenu.querySelectorAll('a');

      // Add click event to each link
      menuLinks.forEach(link => {
        link.addEventListener('click', () => {
          mobileMenu.classList.toggle("hidden");
          line1.classList.toggle('rotate-45');
          line1.classList.toggle('translate-y-0');

          line2.classList.toggle('rotate-0');
          line2.classList.toggle('translate-y-0');

          line3.classList.toggle('-rotate-45');
          line3.classList.toggle('-translate-y-0');
        });
      });

    </script>


    <section id="maincontent" class="max-h-80">
      <!-- Dashboard cards -->
      <h3 class="hidden md:hidden pt-20 p-6 text-lg font-semibold">Dashboard Overview</h3>
      <main class="mt-10 px-6 gap-6 grid grid-cols-2 md:grid-cols-4 lg:grid-cols-4 xxl:grid-cols-6">
        <?php
        $cards = [
          ['label' => 'Youth(s)', 'value' => $youths->num_rows],
          ['label' => 'Male', 'value' => $males->num_rows],
          ['label' => 'Female ', 'value' => $females->num_rows],
          ['label' => 'Zones', 'value' => '8'],
          ['label' => 'Events', 'value' => $events->num_rows],
          ['label' => 'Ongoing Projects', 'value' => $ongoingprojects->num_rows],
          ['label' => 'Total Budget Used', 'value' => '₱ ' . number_format($used, 2)]
        ];
        foreach ($cards as $c): ?>
          <div
            class="bg-card border border-border rounded-2xl p-4 shadow hover:shadow-lg transition text-left md:text-center md:p-8 lg:p-12 xl:p-16 xxl:p-20">
            <h3 class="text-textMuted text-sm mb-2"><?= $c['label'] ?></h3>
            <p class="text-2xl sm:text-3xl font-bold text-primary"><?= $c['value'] ?></p>
          </div>
        <?php endforeach; ?>
      </main>

      <!-- Charts -->

      <h3 class="hidden md:hidden mt-20 pt-20 p-6 pb-0 text-lg font-semibold mb-2">Reports and Analytics</h3>

      <section class="p-4 sm:p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-card border border-border rounded-2xl p-4">
          <h3 class="text-lg font-semibold mb-2">Project Budget Usage</h3>
          <br>
          <div class="h-64 sm:h-72">
            <canvas id="budgetChart"></canvas>
          </div>
        </div>

        <div class="bg-card border border-border rounded-2xl p-4">
          <h3 class="text-lg font-semibold mb-2">Youth Participation</h3>
          <br>
          <div class="h-64 sm:h-72">
            <canvas id="youthChart"></canvas>
          </div>
        </div>
      </section>

    </section>
  </div>

  <!-- Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <!-- Charts -->
  <script>
    const ctx1 = document.getElementById('budgetChart');
    new Chart(ctx1, {
      type: 'doughnut',
      data: {
        labels: ['Used', 'Remaining'],
        datasets: [{ data: [<?= $used ?>, <?= $budgetr['total_budget'] - $used ?>], backgroundColor: ['#10B981', '#2E3439'] }]
      },
      options: { responsive: true, maintainAspectRatio: false }
    });

    const ctx2 = document.getElementById('youthChart');
    new Chart(ctx2, {
      type: 'bar',
      data: {
        labels: [<?= $youth_participation_labels ?>],
        datasets: [{ label: 'Participants', data: [<?= $youth_participation ?>], backgroundColor: '#10B981' }]
      },
      options: { responsive: true, maintainAspectRatio: false }
    });
  </script>
</body>

</html>