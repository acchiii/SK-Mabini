<?php
include '../../connection/config.php';
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'Youth') {
  header("Location: ../../index.php?loginrequired=1&msg=Invalid Action&msgtype=warning");
  exit;
}

$msg = '';
$msgtype = '';
if (!empty($_GET['msg']) && !empty($_GET['msgtype'])) {
  $msg = $_GET['msg'];
  $msgtype = $_GET['msgtype'];
}

$email = $_SESSION['email'];
$feedbacksent = $conn->query("SELECT id FROM feedbacks WHERE sender_email='$email'");
$ongoingprojects = $conn->query("SELECT id FROM projects where project_status='Ongoing'");


$events = $conn->query("SELECT start_date FROM events");
$currentdate = date('Y-m-d');
$upcomingevents = 0;
while ($row = $events->fetch_assoc()) {
  $event_start = new DateTime($row['start_date']);

  if ($currentdate < $event_start->format('Y-m-d')) {
    $upcomingevents++;
  }

}




$em = $email;

// Use quotes and prepared statement (more secure)
$stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
$stmt->bind_param("s", $em);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
  $user = $result->fetch_assoc();
} else {
  echo "User not found.";
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>User Dashboard | SK Mabini</title>
  <link rel="stylesheet" href="../../css/styles.css">
  <link rel="shortcut icon" href="../../images/fav2.png" type="image/x-icon">
</head>

<body class="bg-dark font-poppins text-textLight flex">

  <!-- Sidebar -->
  <aside class="hidden md:flex flex-col w-64 sticky max-h-[100dvh] bg-dark border-r border-border p-4 ">
    <h1 class="text-xl font-bold text-primary mb-6">SK Mabini</h1>
    <nav class="space-y-2">
      <a href="#" class="block p-2 rounded bg-primaryHover hover:bg-primaryHover transition">🏠 Dashboard</a>
      <a href="#" class="block p-2 rounded hover:bg-primaryHover transition">📢 Announcements</a>
      <a href="#" class="block p-2 rounded hover:bg-primaryHover transition">📆 Events</a>
      <a href="#" class="block p-2 rounded hover:bg-primaryHover transition">🧾 Projects</a>
      <a href="#" class="block p-2 rounded hover:bg-primaryHover transition">💬 Feedback</a>
      <a href="#" class="block p-2 rounded hover:bg-primaryHover transition">👤 Profile</a>
      <a href="../logout.php" class="block p-2 rounded hover:bg-primaryHover transition">🔒 Logout</a>
    </nav>
  </aside>

  <!-- Main content -->
  <div class="flex-1 flex flex-col min-h-full w-full">

    <!-- Header -->
    <header class="flex md:hidden bg-card border-b border-border p-4 justify-between items-center w-full">
      <h2 class="text-lg font-semibold">Dashboard</h2>
      <div class="flex items-center gap-4">
        <span class="text-textMuted">Youth Member</span>

        <img
          src="<?= $_SESSION['profile'] == '' ? '../../images/icon.png' : '../../connection/' . $_SESSION['profile'] ?>"
          class="hidden w-8 h-8 rounded-full border border-border" alt="User">
        <div
          class="w-8 h-8 sm:w-9 sm:h-9 rounded-full border border-border overflow-hidden flex items-center justify-center">

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
          <div class=" text-textLight rounded-xl ml-0 z-50 w-64">
            <a href="#" class="block p-2 rounded bg-primaryHover hover:bg-primaryHover transition">🏠 Dashboard</a>
            <a href="#" class="block p-2 rounded hover:bg-primaryHover transition">📢 Announcements</a>
            <a href="#" class="block p-2 rounded hover:bg-primaryHover transition">📆 Events</a>
            <a href="#" class="block p-2 rounded hover:bg-primaryHover transition">🧾 Projects</a>
            <a href="#" class="block p-2 rounded hover:bg-primaryHover transition">💬 Feedback</a>
            <a href="#" class="block p-2 rounded hover:bg-primaryHover transition">👤 Profile</a>
            <a href="../logout.php" class="block p-2 rounded hover:bg-primaryHover transition">🔒 Logout</a>
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

    <!-- Dashboard main -->
    <main class="flex-2 p-6 space-y-8 w-full">

      <!-- Quick Stats -->
      <h3 class="hidden text-xl font-semibold mb-4 md:flex">♾️ Whats New?</h3>

      <section class="gap-6 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 xl:grid-cols-6">
        <div class="bg-card border border-border rounded-2xl p-4 shadow hover:shadow-lg transition">
          <h3 class="text-textMuted text-sm mb-2">Upcoming Events</h3>
          <p class="text-3xl font-bold text-primary"><?= $upcomingevents ?></p>
        </div>
        <div class="bg-card border border-border rounded-2xl p-4 shadow hover:shadow-lg transition">
          <h3 class="text-textMuted text-sm mb-2">Ongoing Projects</h3>
          <p class="text-3xl font-bold text-primary"><?= $ongoingprojects->num_rows ?></p>
        </div>
        <div class="bg-card border border-border rounded-2xl p-4 shadow hover:shadow-lg transition">
          <h3 class="text-textMuted text-sm mb-2">Feedbacks Sent</h3>
          <p class="text-3xl font-bold text-primary"><?= $feedbacksent->num_rows ?></p>
        </div>
      </section>

      <!-- Announcements -->
      <section>
        <h3 class="text-xl font-semibold mb-4">📢 Latest Announcements</h3>
        <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6">
          <div class="bg-card border border-border rounded-2xl p-4 hover:shadow-lg transition">
            <h4 class="font-semibold text-primary mb-2">Barangay Clean-Up Drive</h4>
            <p class="text-textMuted text-sm mb-3">Join us this weekend for our community clean-up program.</p>
            <button class="px-3 py-2 bg-primary hover:bg-primaryHover rounded text-dark font-semibold transition">View
              Details</button>
          </div>
          <div class="bg-card border border-border rounded-2xl p-4 hover:shadow-lg transition">
            <h4 class="font-semibold text-primary mb-2">Youth Sports League</h4>
            <p class="text-textMuted text-sm mb-3">Registration is open for basketball, volleyball, and e-sports.</p>
            <button class="px-3 py-2 bg-primary hover:bg-primaryHover rounded text-dark font-semibold transition">Join
              Now</button>
          </div>
          <div class="bg-card border border-border rounded-2xl p-4 hover:shadow-lg transition">
            <h4 class="font-semibold text-primary mb-2">Leadership Seminar</h4>
            <p class="text-textMuted text-sm mb-3">Develop your leadership skills with our upcoming seminar.</p>
            <button
              class="px-3 py-2 bg-primary hover:bg-primaryHover rounded text-dark font-semibold transition">Register</button>
          </div>
        </div>
      </section>

      <!-- Feedback Form -->
      <section>
        <h3 class="text-xl font-semibold mb-4">💬 Send Feedback</h3>
        <form method="POST" action="../../connection/send_feedback.php"
          class="bg-card border border-border rounded-2xl p-6 space-y-4">
          <textarea name="message" rows="4" placeholder="Write your feedback here..." required
            class="w-full p-3 rounded border border-border bg-dark text-textLight focus:outline-none focus:ring-2 focus:ring-primary"></textarea>
          <button type="submit"
            class="px-4 py-2 bg-primary hover:bg-primaryHover rounded text-dark font-semibold transition">Submit</button>
        </form>
      </section>

    </main>

  </div>

  <!-- 🔔 Notification Container (Top Center) -->
  <div id="toastContainer"
    class="fixed top-20 left-1/2 transform -translate-x-1/2 z-[9999] space-y-3 flex flex-col items-center"></div>




  <script>
    function showToast(message, type = 'error') {
      const toastContainer = document.getElementById('toastContainer');
      if (!toastContainer) return;

      const colors = {
        success: 'bg-green-600',
        error: 'bg-red-600',
        warning: 'bg-yellow-600'
      };

      const toast = document.createElement('div');
      toast.className = `text-white px-4 py-2 rounded-lg shadow-md flex items-center justify-between transition-opacity duration-500 opacity-0 ${colors[type] || colors.error}`;
      toast.innerHTML = `
    <span class="font-medium">${message}</span>
  `;

      toastContainer.appendChild(toast);

      // Fade in
      setTimeout(() => toast.classList.remove('opacity-0'), 50);

      // Remove after 3 seconds
      setTimeout(() => {
        toast.classList.add('opacity-0');
        setTimeout(() => toast.remove(), 500);
      }, 3000);
    }

  </script>
  <?php

  if (!empty($msg)) { ?>

    showToast('<?= $msg ?>', '<?= $msgtype ?>');
    <?php
    $msg = null;
    $msgtype = null;
  }
  ?>



</body>

</html>