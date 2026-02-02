<?php
session_start();
include '../../connection/config.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] == 'Youth') {
    header("Location: ../../index.php?msg=Invalid Action!&msgtype=warning");
    exit;
}


$query = $conn->query("SELECT * FROM announcements");

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Announcements | SK Mabini</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../css/styles.css">
  <link rel="shortcut icon" href="../../images/fav2.png" type="image/x-icon">
  <style>
    body.sidebar-open { overflow: hidden; }
  </style>
</head>
<body class="bg-dark font-poppins text-textLight flex flex-col md:flex-row overflow-x-hidden">

  <!-- Sidebar -->
  <aside id="sidebar"
    class="hidden md:flex sticky  w-64 top-0 left-0 max-h-[100dvh] bg-dark border-r border-border transform -translate-x-full md:translate-x-0 transition-all duration-300 ease-in-out z-50">
    <div class="p-4 flex flex-col h-full">
      <h1 class="text-xl font-bold text-primary mb-6 text-center">SK Mabini</h1>
      <nav class="space-y-2 flex-1 overflow-y-auto">
        <a href="./index.php" class="block p-2 rounded hover:bg-primaryHover transition">🏠 Dashboard</a>
        <a href="#" class="block p-2 rounded bg-primary hover:bg-primaryHover transition">📢 Announcements</a>
        <a href="./events.php" class="block p-2 rounded hover:bg-primaryHover transition">📆 Events</a>
        <!-- <a href="./projects.php" class="block p-2 rounded hover:bg-primaryHover transition">📁 Projects</a>
        <a href="./finances.php" class="block p-2 rounded hover:bg-primaryHover transition">💰 Finances</a> -->
        <a href="./users.php" class="block p-2 rounded hover:bg-primaryHover transition">👥 Youth</a>
        <a href="./reports.php" class="block p-2 rounded hover:bg-primaryHover transition">💬 Feedbacks</a>
        <a href="../logout.php" class="block p-2 rounded hover:bg-primaryHover transition">🔒 Logout</a>
      </nav>
    </div>
  </aside>

  
  <!-- Main content -->
  <div id="main-content" class="flex-1 flex-col min-h-screen transition-all duration-300 ease-in-out w-full">

    <!-- Header -->
   <header class="md:hidden w-full bg-card border-b border-border p-4 flex justify-between items-center sticky top-0 z-30">
      <div class="flex items-center gap-3">
        <h2 class="text-base sm:text-lg md:text-xl font-semibold truncate">Announcements</h2>
      </div>

   <div class="flex items-center gap-4">
      <span class="flex md:hidden text-textMuted">Admin</span>
    
            <img 
                  src="<?= $_SESSION['profile'] == '' ? '../../images/icon.png' : '../../connection/'.$_SESSION['profile'] ?>"
                  class="headericon hidden !w-8 !h-8 sm:!w-9 sm:!h-9 object-fit rounded-full border border-border max-h-[50px] max-w-5"
                  alt="Admin" />
          <div class="md:hidden w-8 h-8 sm:w-9 sm:h-9 rounded-full border border-border overflow-hidden flex items-center justify-center">
                <button id="menu-btn" class="relative z-50 w-10 h-10 p-2 rounded-full bg-card text-textLight shadow-lg flex items-center justify-center transition-all duration-300 md:hidden">
                    <svg id="menu-icon" class="w-6 h-6 transition-transform duration-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <line x1="3" y1="6"  x2="21" y2="6"  class="line1 transition-all duration-300"/>
                      <line x1="3" y1="12" x2="21" y2="12" class="line2 transition-all duration-300"/>
                      <line x1="3" y1="18" x2="21" y2="18" class="line3 transition-all duration-300"/>
                    </svg>
                  </button>
           </div>

         <div id="mobile-menu" class="hidden absolute top-0 w-64 right-0 mt-10 mr-10 bg-dark border border-border text-textLight rounded-xl shadow-xl overflow-hidden z-40 md:hidden">
            <div class=" text-textLight rounded-xl ml-0 z-50 w-64 text-left">
                <a href="./index.php" class="block p-2 rounded hover:bg-primaryHover transition text-left">🏠 Dashboard</a>
                <a href="#" class="block p-2 rounded bg-primaryHover hover:bg-primaryHover transition text-left">📢 Announcements</a>
                <a href="./events.php" class="block p-2 rounded hover:bg-primaryHover transition text-left">📆 Events</a>
                <!-- <a href="./projects.php" class="block p-2 rounded hover:bg-primaryHover transition text-left">📁 Projects</a>
                <a href="./finances.php" class="block p-2 rounded hover:bg-primaryHover transition text-left">💰 Finances</a> -->
                <a href="./reports.php" class="block p-2 rounded hover:bg-primaryHover transition text-left">👥 Youth</a>
                <a href="./users.php" class="block p-2 rounded hover:bg-primaryHover transition text-left">💬 Feedbacks</a>
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
<br>
<?php
  if ($query->num_rows == 0) {
        echo '<p class="text-center text-textMuted mt-8">No announcements available.</p>';
    }  else {
          echo '<div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-4 px-5">';
  while($row = $query->fetch_assoc()){

    //show announcement details here
    // If no announcements exist, show a message
  


    echo '<div class="bg-card border border-border rounded-lg p-4 mb-4
  mx-auto max-w-xs text-center ml-4 gap-4" style="max-width: 250px;">
        <h4 class="text-md font-semibold mb-2">'.htmlspecialchars($row['title']).'</h4>
        <p class="text-sm text-textMuted mb-2">'.htmlspecialchars($row['created_at']).'</p>
        <p class="text-sm">'.htmlspecialchars($row['description']).'</p>
    </div>';
    
  }
  echo '</div>';
}
?>
</section>

<div id="floating-button" class="absolute bottom-0 right-0 mr-3 bg-transparent border border-white text-white rounded-lg px-3 py-2 shadow-lg cursor-pointer transition-transform transform hover:scale-110">
  &nbsp;&nbsp;+ Add&nbsp;&nbsp;
</div>


<!-- Modal -->
<div id="modal" class="fixed inset-0 bg-black/50 backdrop-blur-sm hidden justify-center items-center transition-opacity duration-300 rounded-lg z-50">
  <div class="bg-card rounded-lg p-6 max-w-md w-full">
    <h2 class="text-lg font-semibold mb-4 text-left">Add Announcement</h2>
    <form id="announcement-form" action="process/add_announcement.php" method="POST">
      <div class="mb-4">
        <label for="title" class="block text-sm font-medium">Title</label>
        <input type="text" id="title" name="title" placeholder="Enter Announcement Title" class="border border-gray-300 rounded w-full p-2 text-textMuted bg-transparent" required>
      </div>
      <div class="mb-4">
        <label for="content" class="block text-sm font-medium">Content</label>
        <textarea id="content" name="content" placeholder="Enter Content" class="border border-gray-300 rounded w-full p-2 text-textMuted bg-transparent" required></textarea>
      </div>
     
      <button type="submit" class="bg-primary text-white rounded px-4 py-2 w-full mx-24">Save</button>
      <button type="button" id="close-modal-btn" class="bg-transparent border border-white text-white rounded px-4 py-2 mt-2 w-full mx-24" >Close</button>
    </form>
    <button id="close-modal" class="hidden absolute top-2 right-2 text-gray-500 hover:text-gray-700">✖</button>
  </div>
</div>

<script>
  const floatingButton = document.getElementById('floating-button');
  const modal = document.getElementById('modal');
  const closeModal = document.getElementById('close-modal');

  floatingButton.addEventListener('click', () => {
    modal.classList.remove('hidden');
    modal.classList.add('flex', 'opacity-0');
    setTimeout(() => modal.classList.remove('opacity-0'), 10);
  });

  closeModal.addEventListener('click', () => {
    modal.classList.add('opacity-0');
    setTimeout(() => modal.classList.add('hidden'), 300);
  });

  const closeModalBtn = document.getElementById('close-modal-btn');
  closeModalBtn.addEventListener('click', () => {
    modal.classList.add('opacity-0');
    setTimeout(() => modal.classList.add('hidden'), 300);
  });

  modal.addEventListener('click', (e) => {
    if (e.target === modal) {
      closeModal.click();
    }
  });
</script>



  </div>


    <!-- 🔔 Notification Container (Top Center) -->
  <div id="toastContainer"
    class="fixed top-20 left-1/2 transform -translate-x-1/2 z-[9999] space-y-3 flex flex-col items-center"></div>
  <script src="../../library/toast.js"></script>
  <?php
    if (isset($_GET['msg']) && isset($_GET['msgtype'])) {
        $msg = htmlspecialchars(base64_decode($_GET['msg']));
        $msgtype = htmlspecialchars(base64_decode($_GET['msgtype']));
        echo "<script>showToast('$msg', '$msgtype');</script>";
    }
  ?>
</body>
</html>
