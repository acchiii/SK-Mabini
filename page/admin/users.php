<?php
session_start();
include '../../connection/config.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] == 'Youth') {
    header("Location: ../../index.php?msg=Invalid Action!&msgtype=warning");
    exit;
}


$query = $conn->query("SELECT * FROM users where role='Youth' ORDER BY name ASC");


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Users | SK Mabini</title>
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
        <a href="./announcements.php" class="block p-2 rounded hover:bg-primaryHover transition">📢 Announcements</a>
        <a href="./events.php" class="block p-2 rounded hover:bg-primaryHover transition">📆 Events</a>
        <!-- <a href="./projects.php" class="block p-2 rounded  hover:bg-primaryHover transition">📁 Projects</a>
        <a href="./finances.php" class="block p-2 rounded  hover:bg-primaryHover transition">💰 Finances</a> -->
        <a href="./users.php" class="block p-2 rounded bg-primaryHover hover:bg-primaryHover transition">👥 Youth</a>
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
        <h2 class="text-base sm:text-lg md:text-xl font-semibold truncate">Users</h2>
      </div>

   <div class="flex items-center gap-4">
      <span class="flex md:hidden text-textMuted">Admin</span>
    
            <img 
                  src="<?= $_SESSION['profile'] == '' ? '../../images/icon.png' : '../../connection/'.$_SESSION['profile'] ?>"
                  class="headericon hidden !w-8 !h-8 sm:!w-9 sm:!h-9 object-fit rounded-full border border-border max-h-[50px] max-w-5"
                  alt="profile" />
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
                <a href="./announcements.php" class="block p-2 rounded hover:bg-primaryHover transition text-left">📢 Announcements</a>
                <a href="./events.php" class="block p-2 rounded hover:bg-primaryHover transition text-left">📆 Events</a>
                <!-- <a href="./projects.php" class="block p-2 rounded  hover:bg-primaryHover transition text-left">📁 Projects</a>
                <a href="./finances.php" class="block p-2 rounded hover:bg-primaryHover transition text-left">💰 Finances</a> -->
                <a href="./users.php" class="block p-2 rounded bg-primaryHover hover:bg-primaryHover transition text-left">👥 Youth</a>
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



<br>

<!-- Add a searchbar that can filter the data of $query -->
 <div class="relative w-full max-w-md mx-auto mb-4">
    <input type="text" id="searchInput" placeholder="&nbsp; &nbsp;Search name or location..." class="w-full pl-10 pr-4 py-2 rounded-lg border border-border bg-card text-textLight focus:outline-none focus:ring-2 focus:ring-primary">
    <!-- <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-textMuted" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg> -->
   </div>

<p id="noResult" class="text-center text-textMuted mt-4 hidden">No matching youth found.</p>



<?php
echo '
<div class="grid grid-cols-2 md:grid-cols-4 xl:grid-cols-5 2xl:grid-cols-6 px-4 xl:px-5 py-8">
';

 

 if ($query->num_rows == 0) {
        echo '<p class="text-center text-textMuted mt-8">No youth available.</p>';
    }

  while($row = $query->fetch_assoc()){
    //Grid display user information here with small icon and age calculation, dob, name, location and add max-width of each box to prevent images from being too large and wrap profile to limit the size, make the text centered

    $dob = new DateTime($row['dob']);
    $location = $row['location'];
    $age = $dob->diff(new DateTime())->y;

echo '
<div class="youth-card bg-card border border-border rounded-lg xl:p-2 p-4 mb-4 mx-auto max-w-xs text-center"
     style="max-width: 220px; min-width: 220px;"
     data-name="'.strtolower(htmlspecialchars($row['name'])).'"
     data-location="'.strtolower(htmlspecialchars($row['location'])).'"
     data-age="'.$age.'">

    <img src="'.($row['profile'] == '' ? '../../images/icon.png' : '../../connection/'.$row['profile']).'" 
         alt="Profile" 
         style="width: 80px; height: 80px; object-fit: cover; border-radius: 50%; margin: 0 auto 1rem; display: block;">

    <h4 class="text-sm font-semibold mb-2">'.htmlspecialchars($row['name']).'</h4>
    <p class="text-sm text-textMuted mb-1">'.$age.' '.($age > 1 ? 'years old' : 'year old').'</p>
    <p class="text-sm text-textMuted mb-1">From '.htmlspecialchars($row['location']).'</p>
</div>';



} 
echo '
</div>';
?>

<script>
document.getElementById('searchInput').addEventListener('keyup', function () {
    const value = this.value.toLowerCase().trim();
    const cards = document.querySelectorAll('.youth-card');

    cards.forEach(card => {
        const name = card.dataset.name;
        const location = card.dataset.location;
        const age = card.dataset.age;

        // Check if search matches any field
        if (
            name.includes(value) ||
            location.includes(value) ||
            age.includes(value)
        ) {
            card.style.display = "block";
        } else {
            card.style.display = "none";
        }
    });
});
</script>


    
</body>
</html>
