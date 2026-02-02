<?php
include './connection/config.php';
session_start();

$msg = '';
$msgtype = '';
if (!empty($_GET['msg']) && !empty($_GET['msgtype'])) {
  $msg = base64_decode($_GET['msg']);
  $msgtype = base64_decode($_GET['msgtype']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SK Portal</title>
  <link rel="stylesheet" href="./css/styles.css">
  <link rel="shortcut icon" href="./images/fav2.png" type="image/x-icon">


</head>

<body class="font-sans bg-dark text-textLight">

  <!-- NAVBAR border-b border-border-->
  <header class="fixed w-full z-20 bg-dark backdrop-blur  text-textLight">
    <div class="max-w-6xl mx-auto px-6 py-4 flex justify-between items-center">
      <h1 class="text-xl font-bold text-primary font-poppins">SK Mabini Portal</h1>

      <nav class="space-x-6 hidden md:flex text-textLight">
        <a href="#about" class="hover:text-primary font-semibold">About</a>
        <a href="#features" class="hover:text-primary font-semibold">Features</a>
        <a href="#officials" class="hover:text-primary font-semibold">Officials</a>
        <a href="#contact" class="hover:text-primary font-semibold">Contact</a>
      </nav>


      <div class="flex items-center space-x-4">

        <!-- Register / Login -->
        <a id="register2"
          class="hidden md:flex rounded-[7px] text-textLight bg-card px-4 py-1.5 font-poppins font-regular transition border border-transparent hover:border-primary hover:bg-transparent hover:text-primary">Register</a>

        <a id="login2"
          class="hidden md:flex rounded-[7px] text-textLight bg-primary px-4 py-1.5 font-poppins font-regular transition border border-transparent hover:border-primary hover:bg-transparent hover:text-primary">Log
          in</a>
      </div>


      <!-- Hamburger Button -->
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


    <!-- Mobile Menu -->
    <div id="mobile-menu"
      class="hidden absolute w-40 top-10 right-0 mr-10 border border-border text-textLight rounded-xl shadow-xl overflow-hidden z-40 justify-end md:hidden">
      <div class="bg-dark  text-textLight rounded-xl w-full">
        <a href="#about" class="block px-6 py-3 hover:bg-primaryHover transition-colors rounded-lg">About</a>
        <a href="#features" class="block px-6 py-3 hover:bg-primaryHover transition-colors rounded-lg">Features</a>
        <a href="#officials" class="block px-6 py-3 hover:bg-primaryHover transition-colors rounded-lg">Officials</a>
        <a href="#contact" class="block px-6 py-3 hover:bg-primaryHover transition-colors rounded-lg">Contact</a>
        <a id="register" class="block px-6 py-3 hover:bg-primaryHover transition-colors rounded-lg">Register</a>
        <a id="login" class="block px-6 py-3 hover:bg-primaryHover transition-colors rounded-lg">Login</a>
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

  <!-- HERO -->
  <section class="pt-32 pb-24 bg-dark text-center md:text-left">
    <div class="max-w-6xl mx-auto px-6 flex flex-col md:flex-row items-center gap-12">

      <!-- IMAGE for small screens -->
      <div class="w-full md:hidden mt-10 flex justify-center">
        <img src="./images/fav2.png" alt="Community Icon" width="200" height="200" class="w-1/2 drop-shadow-lg">
      </div>

      <!-- TEXT -->
      <div class="md:w-1/2 mt-10">
        <h2 class="text-4xl md:text-5xl font-bold mb-6 font-poppins">
          Empowering the Youth, <span class="text-primary">Building the Future</span>
        </h2>
        <p class="mb-8 text-textMuted leading-relaxed">
          The official digital hub of <strong>Sangguniang Kabataan Mabini</strong> — connecting young leaders, sharing
          programs, and making community engagement accessible for everyone.
        </p>
        <a href="#about"
          class="bg-primary text-textLight px-6 py-3 rounded-full hover:bg-primaryHover font-poppins opacity-90">
          Explore
        </a>
      </div>

      <!-- IMAGE for medium+ screens -->
      <div class="hidden md:flex md:w-1/2 mt-10">
        <img src="./images/fav2.png" alt="Community Icon" class="w-full max-w-md mx-auto drop-shadow-lg">
      </div>

    </div>
  </section>



  <!-- ABOUT border-t border-dark -->
  <section id="about" class="py-20 bg-dark ">
    <div class="max-w-6xl mx-auto px-6 text-center">
      <h2 class="text-3xl font-bold text-textLight mb-6 font-poppins">About the Portal</h2>
      <p class="text-textMuted max-w-3xl mx-auto mb-12 font-nunito">
        The SK Portal is designed to bring transparency, accessibility, and connection between the youth and their
        leaders.
        Through this platform, you can view programs, submit suggestions, and stay informed about your barangay’s youth
        activities.
      </p>

      <div class="grid md:grid-cols-3 gap-8">
        <!-- Transparency -->
        <div class="bitem bg-dark border border-border p-6 rounded-xl hover:shadow-lg transition">
          <div class="flex justify-center mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-primary" fill="none" viewBox="0 0 24 24"
              stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 8c1.657 0 3 .895 3 2s-1.343 2-3 2-3-.895-3-2 1.343-2 3-2z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M2.458 12C3.732 7.943 7.523 5 12 5s8.268 2.943 9.542 7c-1.274 4.057-5.065 7-9.542 7s-8.268-2.943-9.542-7z" />
            </svg>
          </div>
          <h3 class="font-semibold text-lg mb-2 text-primary font-poppins">Transparency</h3>
          <p class="text-textMuted font-nunito">Access reports, project updates, and SK budget allocations anytime.</p>
        </div>

        <!-- Engagement -->
        <div class="bitem bg-dark border border-border p-6 rounded-xl hover:shadow-lg transition">
          <div class="flex justify-center mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-primary" fill="none" viewBox="0 0 24 24"
              stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M17 20h5v-2a4 4 0 00-4-4h-1m-4 6h5v-2a4 4 0 00-4-4h-1m-4 6h5v-2a4 4 0 00-4-4H9m-4 6h5v-2a4 4 0 00-4-4H4" />
            </svg>
          </div>
          <h3 class="font-semibold text-lg mb-2 text-primary font-poppins">Engagement</h3>
          <p class="text-textMuted font-nunito">Join programs, events, and training designed for youth empowerment.</p>
        </div>

        <!-- Innovation -->
        <div class="bitem bg-dark border border-border p-6 rounded-xl hover:shadow-lg transition">
          <div class="flex justify-center mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-primary" fill="none" viewBox="0 0 24 24"
              stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
            </svg>
          </div>
          <h3 class="font-semibold text-lg mb-2 text-primary font-poppins">Innovation</h3>
          <p class="text-textMuted font-nunito">A modern system built to simplify public service and participation.</p>
        </div>
      </div>
    </div>
  </section>


  <!-- FEATURES border-t border-border-->
  <section id="features" class="py-20 bg-dark ">
    <div class="max-w-6xl mx-auto px-6 text-center">
      <h2 class="text-3xl font-bold text-textLight mb-6 font-poppins">Portal Features</h2>
      <p class="text-textMuted max-w-2xl mx-auto mb-12 font-nunito">
        Everything you need to stay updated, involved, and informed about SK initiatives.
      </p>

      <div class="grid md:grid-cols-3 gap-10">

        <!-- Announcements -->
        <div class="bitem bg-dark p-6 rounded-2xl border border-border hover:shadow-lg transition">
          <div class="flex justify-center mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-14 h-14 text-primary" fill="none" viewBox="0 0 24 24"
              stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M19 13V5l-7 3-7-3v8a4 4 0 004 4h6a4 4 0 004-4z" />
            </svg>
          </div>
          <h3 class="text-xl font-semibold mb-2 text-primary font-poppins">Announcements</h3>
          <p class="text-textMuted font-nunito">
            Stay informed about upcoming projects, events, and youth assemblies.
          </p>
        </div>

        <!-- KK Profiling -->
        <div class="bitem bg-dark p-6 rounded-2xl border border-border hover:shadow-lg transition">
          <div class="flex justify-center mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-14 h-14 text-primary" fill="none" viewBox="0 0 24 24"
              stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M5.121 17.804A13.937 13.937 0 0112 15c2.39 0 4.63.56 6.879 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
          </div>
          <h3 class="text-xl font-semibold mb-2 text-primary font-poppins">KK Profiling</h3>
          <p class="text-textMuted font-nunito">
            Register for community activities and volunteer opportunities online.
          </p>
        </div>

        <!-- Feedback System -->
        <div class="bitem bg-dark p-6 rounded-2xl border border-border hover:shadow-lg transition">
          <div class="flex justify-center mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-14 h-14 text-primary" fill="none" viewBox="0 0 24 24"
              stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M7 8h10M7 12h6m-6 4h8M21 12c0 4.418-4.03 8-9 8a9.77 9.77 0 01-4-.84L3 20l1.26-3.36A8.962 8.962 0 013 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
            </svg>
          </div>
          <h3 class="text-xl font-semibold mb-2 text-primary font-poppins">Feedback System</h3>
          <p class="text-textMuted font-nunito">
            Send suggestions or concerns directly to the SK for action and improvement.
          </p>
        </div>

      </div>
    </div>
  </section>

  <!-- OFFICIALS border-t border-border-->
  <section id="officials" class="py-20 bg-dark text-textLight">
    <div class="max-w-6xl mx-auto px-6">
      <h2 class="text-3xl font-bold font-poppins text-center mb-12">
        Meet the <span class="text-primary font-poppins">SK Officials</span>
      </h2>

      <!-- Officials Grid -->
      <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-5 text-center">

        <!-- Chairperson (larger image) -->
        <div
          class="relative group overflow-hidden rounded-2xl shadow-lg shadow-black/30 hover:shadow-primary/30 transition duration-300 col-span-2 row-span-2 md:col-span-3 md:row-span-5">
          <img src="images/chairperson.jpg" alt="Chairperson"
            class="w-full h-[460px] object-cover object-center rounded-2xl transition-transform duration-300 group-hover:scale-105">
          <div
            class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 flex flex-col items-center justify-center transition duration-300 rounded-2xl">
            <span class="bg-primary text-dark text-xs font-semibold px-3 py-1 rounded-full mb-2">Chairperson</span>
            <h3 class="text-white font-semibold text-base font-poppins">Gayl Oybenes</h3>
            <p class="text-textMuted text-xs font-poppins">SK Chairperson</p>
          </div>
        </div>

        <!-- 9 smaller officials -->
        <div
          class="relative group overflow-hidden rounded-2xl shadow-lg shadow-black/30 hover:shadow-primary/30 transition duration-300">
          <img src="images/secretary.jpg" alt="Secretary"
            class="w-full h-56 object-cover object-center rounded-2xl transition-transform duration-300 group-hover:scale-105">
          <div
            class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 flex flex-col items-center justify-center transition duration-300 rounded-2xl">
            <span
              class="bg-primary text-dark text-xs font-semibold px-3 py-1 rounded-full mb-2 font-poppins">Secretary</span>
            <h3 class="text-white font-semibold text-sm font-poppins">Christian Louie Yongco</h3>
          </div>
        </div>

        <div
          class="relative group overflow-hidden rounded-2xl shadow-lg shadow-black/30 hover:shadow-primary/30 transition duration-300">
          <img src="images/treasurer.jpg" alt="Treasurer"
            class="w-full h-56 object-cover object-center rounded-2xl transition-transform duration-300 group-hover:scale-105">
          <div
            class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 flex flex-col items-center justify-center transition duration-300 rounded-2xl">
            <span
              class="bg-primary text-dark text-xs font-semibold px-3 py-1 rounded-full mb-2 font-poppins">Treasurer</span>
            <h3 class="text-white font-semibold text-sm font-poppins">Robie Mea R. Pitogo</h3>
          </div>
        </div>

        <div
          class="relative group overflow-hidden rounded-2xl shadow-lg shadow-black/30 hover:shadow-primary/30 transition duration-300">
          <img src="images/cons1.jpg" alt="Councilor"
            class="w-full h-56 object-cover object-center rounded-2xl transition-transform duration-300 group-hover:scale-105">
          <div
            class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 flex flex-col items-center justify-center transition duration-300 rounded-2xl">
            <span
              class="bg-primary text-dark text-xs font-semibold px-3 py-1 rounded-full mb-2 font-poppins">Councilor</span>
            <h3 class="text-white font-semibold text-sm font-poppins">Kenth R. Pitogo</h3>
          </div>
        </div>

        <div
          class="relative group overflow-hidden rounded-2xl shadow-lg shadow-black/30 hover:shadow-primary/30 transition duration-300">
          <img src="images/cons2.jpg" alt="Councilor"
            class="w-full h-56 object-cover object-center rounded-2xl transition-transform duration-300 group-hover:scale-105">
          <div
            class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 flex flex-col items-center justify-center transition duration-300 rounded-2xl">
            <span
              class="bg-primary text-dark text-xs font-semibold px-3 py-1 rounded-full mb-2 font-poppins">Councilor</span>
            <h3 class="text-white font-semibold text-sm font-poppins">Kisha Mae Sorela</h3>
          </div>
        </div>

        <div
          class="relative group overflow-hidden rounded-2xl shadow-lg shadow-black/30 hover:shadow-primary/30 transition duration-300">
          <img src="images/cons3.jpg" alt="Councilor"
            class="w-full h-56 object-cover object-center rounded-2xl transition-transform duration-300 group-hover:scale-105">
          <div
            class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 flex flex-col items-center justify-center transition duration-300 rounded-2xl">
            <span
              class="bg-primary text-dark text-xs font-semibold px-3 py-1 rounded-full mb-2 font-poppins">Councilor</span>
            <h3 class="text-white font-semibold text-sm font-poppins">Ericka Rose Parinasan</h3>
          </div>
        </div>

        <div
          class="relative group overflow-hidden rounded-2xl shadow-lg shadow-black/30 hover:shadow-primary/30 transition duration-300">
          <img src="images/cons4.jpg" alt="Councilor"
            class="w-full h-56 object-cover object-center rounded-2xl transition-transform duration-300 group-hover:scale-105">
          <div
            class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 flex flex-col items-center justify-center transition duration-300 rounded-2xl">
            <span
              class="bg-primary text-dark text-xs font-semibold px-3 py-1 rounded-full mb-2 font-poppins">Councilor</span>
            <h3 class="text-white font-semibold text-sm font-poppins">Ferlyn Mae Gapo</h3>
          </div>
        </div>

        <div
          class="relative group overflow-hidden rounded-2xl shadow-lg shadow-black/30 hover:shadow-primary/30 transition duration-300">
          <img src="images/cons5.jpg" alt="Councilor"
            class="w-full h-56 object-cover object-center rounded-2xl transition-transform duration-300 group-hover:scale-105">
          <div
            class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 flex flex-col items-center justify-center transition duration-300 rounded-2xl">
            <span
              class="bg-primary text-dark text-xs font-semibold px-3 py-1 rounded-full mb-2 font-poppins">Councilor</span>
            <h3 class="text-white font-semibold text-sm font-poppins">James Ryan Pepito</h3>
          </div>
        </div>

        <div
          class="relative group overflow-hidden rounded-2xl shadow-lg shadow-black/30 hover:shadow-primary/30 transition duration-300">
          <img src="images/cons6.jpg" alt="Councilor"
            class="w-full h-56 object-cover object-center rounded-2xl transition-transform duration-300 group-hover:scale-105">
          <div
            class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 flex flex-col items-center justify-center transition duration-300 rounded-2xl">
            <span
              class="bg-primary text-dark text-xs font-semibold px-3 py-1 rounded-full mb-2 font-poppins">Councilor</span>
            <h3 class="text-white font-semibold text-sm font-poppins text-center">Arian Claire Emmanuel O. Nable</h3>
          </div>
        </div>

        <div
          class="relative group overflow-hidden rounded-2xl shadow-lg shadow-black/30 align-middle hover:shadow-primary/10 transition duration-300">
          <img src="images/cons7.jpg" alt="Councilor"
            class="w-full h-56 object-cover object-center rounded-2xl transition-transform duration-300 group-hover:scale-105">
          <div
            class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 flex flex-col items-center justify-center transition duration-300 rounded-2xl">
            <span
              class="bg-primary text-dark text-xs font-semibold px-3 py-1 rounded-full mb-2 font-poppins">Councilor</span>
            <h3 class="text-white font-semibold text-sm font-poppins">Clyde A. Nopal</h3>
          </div>
        </div>

      </div>
    </div>
  </section>



  <!-- CONTACT  border-t border-border-->
  <!-- CONTACT -->
  <section id="contact" class="py-20 bg-dark">
    <div class="max-w-4xl mx-auto px-6 text-center">
      <h2 class="text-3xl font-bold text-textLight mb-6 font-poppins">Contact Us</h2>
      <p class="text-textMuted mb-10 max-w-xl mx-auto font-nunito">
        Have suggestions, questions, or feedback? Reach out to your SK team — we’d love to hear from you!
      </p>

      <form action="./connection/send_email.php" method="POST" class="grid gap-6 text-left">
        <input type="text" name="name" placeholder="Full Name"
          class="border border-border bg-card text-textLight p-3 rounded-lg w-full font-poppins focus:outline-primary"
          required>

        <input type="email" name="email" placeholder="Email"
          class="border border-border bg-card text-textLight p-3 rounded-lg w-full font-poppins focus:outline-primary"
          required>

        <textarea name="message" rows="4" placeholder="Your Message"
          class="border border-border bg-card text-textLight p-3 font-poppins rounded-lg w-full focus:outline-primary"
          required></textarea>

        <button type="submit"
          class="bg-primary text-dark font-poppins font-semibold px-6 py-3 rounded-lg hover:bg-primaryHover transition">
          Send Message
        </button>
      </form>
    </div>
  </section>


  <!-- FOOTER -->
  <footer class="bg-card text-textMuted text-center py-6 border-t border-border font-nunito">
    <div class="flex justify-center space-x-6 mb-3">
      <!-- Facebook -->
      <a href="https://www.facebook.com/profile.php?id=61550530281075&__tn__=-UC" target="_blank"
        class="hover:text-primary transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 inline-block" fill="currentColor" viewBox="0 0 24 24">
          <path
            d="M22 12.07C22 6.48 17.52 2 11.93 2S2 6.48 2 12.07c0 5.02 3.66 9.19 8.44 9.93v-7.03H8.1v-2.9h2.34V9.41c0-2.32 1.38-3.6 3.49-3.6.99 0 2.02.18 2.02.18v2.23h-1.14c-1.13 0-1.48.7-1.48 1.42v1.7h2.52l-.4 2.9h-2.12v7.03C18.34 21.26 22 17.09 22 12.07z" />
        </svg>
      </a>

      <!-- Instagram -->
      <a href="https://www.instagram.com/_skmabini0?utm_source=ig_web_button_share_sheet&igsh=Mnc2eWdkY3F6OHc="
        target="_blank" class="hover:text-primary transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 inline-block" fill="currentColor" viewBox="0 0 24 24">
          <path
            d="M7.75 2h8.5A5.76 5.76 0 0 1 22 7.75v8.5A5.76 5.76 0 0 1 16.25 22h-8.5A5.76 5.76 0 0 1 2 16.25v-8.5A5.76 5.76 0 0 1 7.75 2zm0 2A3.75 3.75 0 0 0 4 7.75v8.5A3.75 3.75 0 0 0 7.75 20h8.5A3.75 3.75 0 0 0 20 16.25v-8.5A3.75 3.75 0 0 0 16.25 4zm4.25 3.5a4.75 4.75 0 1 1 0 9.5 4.75 4.75 0 0 1 0-9.5zm0 2A2.75 2.75 0 1 0 14.75 12 2.75 2.75 0 0 0 12 9.5zm5.25-.75a.75.75 0 1 1 .75.75.75.75 0 0 1-.75-.75z" />
        </svg>
      </a>
    </div>

    <p class="text-sm">&copy; 2025 SK Mabini. All rights reserved.</p>
  </footer>




  <!-- LOGIN MODAL -->
  <div id="loginModal"
    class="fixed inset-0 bg-black/70 backdrop-blur-sm flex items-center justify-center opacity-0 pointer-events-none transition-opacity duration-300 z-50"
    style="flex-direction: column">

    <div
      class="bg-card border border-border rounded-2xl w-full max-w-md mx-4 transform scale-95 opacity-0 transition-all duration-300"
      id="modalBox">
      <div class="p-6">
        <div class="flex justify-between items-center mb-4">
          <h2 class="text-xl font-semibold text-primary text-end font-poppins">Login to SK Portal</h2>
          <button id="closeModal" class="text-textMuted hover:text-primary text-xl">&times;</button>
        </div>
        <br>
        <p id="error" class="block text-sm mb-1 font-poppins text-red rounded text-center"
          style="display: none; color: red; opacity: 0;"></p>


        <form id="loginform" class="space-y-4" action="./connection/login_process.php" method="post">
          <div>
            <label class="block text-sm text-textMuted mb-1 font-poppins">Email</label>
            <input id="email" type="email" name="email" autocomplete="username" placeholder="Enter your email"
              class="w-full bg-dark border border-border rounded-lg p-3 text-white focus:outline-none focus:ring-2 focus:ring-primary font-poppins"
              required>
          </div>
          <div>
            <label class="block text-sm text-textMuted mb-1 font-poppins">Password</label>
            <input type="password" name="password" autocomplete="current-password" placeholder="Enter your password"
              class="w-full bg-dark border border-border rounded-lg p-3 text-white focus:outline-none focus:ring-2 focus:ring-primary font-poppins"
              required>
          </div>
          <button id="signinbtn" type="submit"
            class="w-full py-2.5 bg-primary hover:bg-primaryHover text-dark font-semibold rounded-lg transition flex justify-center items-center gap-2">
            <div id="loadingCircle" class="hidden relative w-6 h-6">
              <div class="absolute inset-0 rounded-full border-2 border-textLight opacity-25"></div>
              <div
                class="absolute inset-0 rounded-full border-2 border-textLight border-t-transparent animate-spin-smooth">
              </div>
            </div>
            <span id="btnText" class="text-textLight font-poppins">Sign In</span>
          </button>

        </form>

      </div>
    </div>

  </div>


  <script>
    const form = document.getElementById("loginform");
    const signinBtn = document.getElementById("signinbtn");

    const loading = document.getElementById("loadingCircle");
    const btnText = document.getElementById("btnText");

    form.addEventListener("submit", () => {
      // Disable button to prevent multiple submissions
      signinBtn.disabled = true;
      signinBtn.classList.add("opacity-70", "cursor-not-allowed");

      btnText.textContent = "Submitting...";
      //loading.style.display = 'flex';
    });
  </script>


  <!-- Sign Up Modal -->
  <div id="signupModal" class="fixed inset-0 bg-black/70 backdrop-blur-sm hidden flex items-center justify-center z-50">
    <div id="signupBox"
      class="bg-card border border-border rounded-xl shadow-lg w-[90%] max-w-2xl max-h-[90vh] overflow-y-auto p-6 text-textLight font-poppins relative hide-scroll pointer-events-auto">

      <!-- Close Button -->
      <button id="closeSModal" class="absolute top-3 right-3 text-textMuted hover:text-primary text-xl font-bold">
        ✕
      </button>

      <!-- Header -->
      <h2 class="text-2xl font-semibold text-primary mb-4 text-center font-poppins">Create Account</h2>
      <p class="text-textMuted text-sm mb-6 text-center font-poppins">Fill in your details to register as a user</p>

      <!-- Form -->
      <form id="signupForm" action="./connection/signup.php" method="post" class="grid md:grid-cols-2 gap-4"
        enctype="multipart/form-data">

        <!-- Profile Image -->
        <div class="md:col-span-2 flex flex-col items-center">
          <label class="text-textMuted text-sm mb-2 font-poppins">Profile Image</label>
          <div class="relative">
            <img id="profilePreview" src="./images/icon.png" alt="Profile Preview"
              class="w-28 h-28 rounded-full object-cover border border-border shadow-md">
            <input type="file" name="profileImage" id="profileImage" accept="image/*"
              class="absolute inset-0 opacity-0 cursor-pointer" onchange="previewProfileImage(event)">
          </div>
        </div>

        <!-- Name -->
        <div>
          <label class="block text-textMuted mb-1 text-sm font-poppins">Full Name</label>
          <input type="text" name="name" placeholder="Enter your full name"
            class="w-full p-2.5 bg-dark border border-border rounded-lg focus:outline-none focus:border-primary font-poppins"
            required>
        </div>

        <!-- Contact Number -->
        <div>
          <label class="block text-textMuted mb-1 text-sm font-poppins">Contact Number</label>
          <input type="text" name="contact" placeholder="09xxxxxxxxx"
            class="w-full p-2.5 bg-dark border border-border rounded-lg focus:outline-none focus:border-primary font-poppins"
            required>
        </div>

        <!-- Role -->
        <div>
          <label class="block text-textMuted mb-1 text-sm font-poppins">Role</label>
          <select name="role"
            class="w-full p-2.5 bg-dark border border-border rounded-lg focus:outline-none focus:border-primary font-poppins"
            required>
            <option value="">Select Role</option>
            <option value="Youth">Youth</option>
            <option value="Official">Official</option>
          </select>
        </div>



        <!-- Date of Birth -->
        <div>
          <label class="block text-textMuted mb-1 text-sm font-poppins">Date of Birth</label>
          <input type="date" name="dob"
            class="w-full p-2.5 bg-dark border border-border rounded-lg focus:outline-none focus:border-primary font-poppins"
            required>
        </div>

        <!-- Gender -->
        <div>
          <label class="block text-textMuted mb-1 text-sm font-poppins">Gender</label>
          <select name="gender"
            class="w-full p-2.5 bg-dark border border-border rounded-lg focus:outline-none focus:border-primary font-poppins"
            required>
            <option value="">Select Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
          </select>
        </div>

        <!-- Location -->
        <div>
          <label class="block text-textMuted mb-1 text-sm font-poppins">Sitio</label>
          <select name="location"
            class="w-full p-2.5 bg-dark border border-border rounded-lg focus:outline-none focus:border-primary font-poppins"
            required>
            <option value="">Select</option>
            <option value="Luton">Luton</option>
            <option value="Sandayong">Sandayong</option>
            <option value="Camansi">Camansi</option>
            <option value="Proper I">Proper I</option>
            <option value="Proper II">Proper II</option>
            <option value="Skwelahan">Skwelahan</option>
            <option value="Tuburan">Tuburan</option>
            <option value="Buntod">Buntod</option>
          </select>
        </div>

        <!-- Email -->
        <div>
          <label class="block text-textMuted mb-1 text-sm font-poppins">Email</label>
          <input type="email" name="email" autocomplete="username" placeholder="Enter your email"
            class="w-full p-2.5 bg-dark border border-border rounded-lg focus:outline-none focus:border-primary font-poppins"
            required>
        </div>

        <!-- Password -->
        <div>
          <label class="block text-textMuted mb-1 text-sm font-poppins">Password</label>
          <input type="password" autocomplete="current-password" name="password" placeholder="Enter your password"
            class="w-full p-2.5 bg-dark border border-border rounded-lg focus:outline-none focus:border-primary font-poppins"
            required>
        </div>



        <div class="md:col-span-2 flex justify-center mt-2">
          <div class="p-2 bg-dark border border-border rounded-lg shadow-sm font-poppins">
            <div class="g-recaptcha" data-sitekey="<?php echo $RECAPTCHA_SITE_KEY; ?>"></div>
          </div>
        </div>

        <!-- Submit Button -->
        <div class="md:col-span-2 mt-4">

          <button type="submit" id="signupbtn"
            class="w-full py-2.5 bg-primary hover:bg-primaryHover text-dark font-semibold rounded-lg transition"
            required>
            <div id="loadingCircle2" class="hidden relative w-6 h-6">
              <div class="absolute inset-0 rounded-full border-2 border-dark opacity-25"></div>
              <div class="absolute inset-0 rounded-full border-2 border-dark border-t-transparent animate-spin-smooth">
              </div>
            </div>
            <span id="btnText2" class="text-textLight font-poppins">Sign Up</span>
          </button>
        </div>
      </form>
    </div>
  </div>




  <!-- 🔔 Notification Container (Top Center) -->
  <div id="toastContainer"
    class="fixed top-20 left-1/2 transform -translate-x-1/2 z-[9999] space-y-3 flex flex-col items-center"></div>




  <script>
    const sform = document.getElementById("signupForm"); // adjust if needed
    const signupBtn = document.getElementById("signupbtn");

    const loading2 = document.getElementById("loadingCircle2");
    const btnText2 = document.getElementById("btnText2");

    sform.addEventListener("submit", () => {
      // Disable button to prevent multiple submissions
      signupBtn.disabled = true;
      signupBtn.classList.add("opacity-70", "cursor-not-allowed");

      btnText2.textContent = "Submitting...";
      //loading2.style.display = 'flex';
    });





    document.getElementById('signupForm').addEventListener('submit', function (e) {
      const captchaChecked = grecaptcha && grecaptcha.getResponse().length !== 0;

      if (!captchaChecked) {
        const formData = {};
        new FormData(this).forEach((value, key) => formData[key] = value);
        localStorage.setItem('signupData', JSON.stringify(formData));
        localStorage.setItem('signup', 'true');
      }
    });


</script>



  <!-- 🔔 Notification Container (Top Center) -->
  <div id="toastContainer" class="fixed top-20 left-1/2 transform -translate-x-1/2 z-[9999] space-y-3 flex flex-col items-center"></div>


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


    <?php

    if (!empty($msg)) { ?>

      showToast('<?= $msg ?>', '<?= $msgtype ?>');
      <?php
      $msg = null;
      $msgtype = null;
    }
    ?>







    const loginBtn = document.getElementById("login2");
    const loginBtn2 = document.getElementById("login");
    const regBtn = document.getElementById("register");
    const regBtn2 = document.getElementById("register2");

    const loginModal = document.getElementById("loginModal");
    const signupModal = document.getElementById("signupModal");
    const closeModal = document.getElementById("closeModal");
    const closeSModal = document.getElementById("closeSModal");
    const modalBox = document.getElementById("modalBox");
    const signupBox = document.getElementById("signupBox");
    /* 
     document.getElementById("signinbtn").addEventListener('click', ()=>{
       window.location = './page/dashboard.php';
       console.log('Click')
     })
       */

    <?php
    if (!empty($_GET['err'])) { ?>
      showToast('<?php echo base64_decode($_GET['err']); ?>', 'error');
      /*document.getElementById('error').style = "font-family: 'Poppins', 'Nunito'; font-weight: semibold; color: red; opacity: 0.7;";
      document.getElementById('error').innerText = '< $_GET['err'] ?>';
         loginModal.classList.remove("pointer-events-none");
      loginModal.classList.add("opacity-100");
      setTimeout(() => {
        modalBox.classList.remove("scale-95", "opacity-0");
        modalBox.classList.add("scale-100", "opacity-100");
      }, 50);
      */
      <?php if (!empty($_GET['user'])) { ?>
        document.getElementById('email').value = '<?php echo base64_decode($_GET['user']); ?>';
        loginBtn.click();
        <?php
      }

    }

    ?>


    loginBtn.addEventListener("click", () => {
      document.getElementById('error').style.opacity = '0';
      loginModal.classList.remove("pointer-events-none");
      loginModal.classList.add("opacity-100");
      setTimeout(() => {
        modalBox.classList.remove("scale-95", "opacity-0");
        modalBox.classList.add("scale-100", "opacity-100");
      }, 50);
    });


    loginBtn2.addEventListener("click", () => {
      document.getElementById('error').style.opacity = '0';
      loginModal.classList.remove("pointer-events-none");
      loginModal.classList.add("opacity-100");
      setTimeout(() => {
        modalBox.classList.remove("scale-95", "opacity-0");
        modalBox.classList.add("scale-100", "opacity-100");
      }, 50);
    });

    <?php
    if (!empty($_GET['loginrequired'])): ?>
      loginBtn.click();
      <?php
    endif;
    ?>


    closeModal.addEventListener("click", () => {
      modalBox.classList.add("scale-95", "opacity-0");
      modalBox.classList.remove("scale-100", "opacity-100");
      setTimeout(() => {
        loginModal.classList.add("pointer-events-none");
        loginModal.classList.remove("opacity-100");
      }, 200);
    });

    // Close modal on background click
    loginModal.addEventListener("click", (e) => {
      if (e.target === loginModal) {
        closeModal.click();
      }
    });





    function previewProfileImage(event) {
      const reader = new FileReader();
      reader.onload = function () {
        document.getElementById('profilePreview').src = reader.result;
      }
      reader.readAsDataURL(event.target.files[0]);
    }









    // Open modal for both buttons
    document.querySelectorAll('#register, #register2').forEach(btn => {
      btn.addEventListener('click', () => {
        signupModal.classList.add('active');
        signupModal.classList.remove('hidden');
      });
    });

    // Close modal (✕ button)
    closeSModal.addEventListener('click', () => {
      signupModal.classList.remove('active');
      setTimeout(() => signupModal.classList.add('hidden'), 300);
    });

    // Close when clicking outside the box
    signupModal.addEventListener('click', (e) => {
      if (e.target === signupModal) {
        signupModal.classList.remove('active');
        setTimeout(() => signupModal.classList.add('hidden'), 300);
      }
    });

    document.addEventListener("DOMContentLoaded", function () {
      if (localStorage.getItem('signup') === 'true') {
        localStorage.removeItem('signup');
        const signupModal = document.getElementById('signupModal');
        const signupForm = document.getElementById('signupForm');

        if (signupModal) {
          signupModal.style.opacity = 0;
          signupModal.style.scale = 0.5;
          signupModal.classList.remove('hidden');
          signupModal.classList.add('flex');



          setTimeout(() => {
            signupModal.style.transition = "opacity 0.3s ease";
            signupModal.style.opacity = 1;
            signupModal.style.scale = 1;

          }, 300);
        }

        // Restore data if it exists
        const savedData = JSON.parse(localStorage.getItem('signupData') || '{}');
        if (Object.keys(savedData).length > 0 && signupForm) {
          for (const [key, value] of Object.entries(savedData)) {
            const input = signupForm.querySelector(`[name="${key}"]`);
            if (input) {
              // Skip file inputs to prevent "InvalidStateError"
              if (input.type === 'file') {
                document.getElementById('profilePreview').src = value;
              } else {

                input.value = value;
              }
            }
          }
        }

        // Optional alert message
        showToast("Please complete the reCAPTCHA before signing up.", 'error');

        // Clean up localStorage
        localStorage.removeItem('signup');
        localStorage.removeItem('signupData');
      }
    });


  </script>





  <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</body>

</html>