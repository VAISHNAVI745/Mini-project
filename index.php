<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* Fullscreen Image with Overlay and Design */
    .fullscreen-image {
      position: relative;
      width: 100%;
      height: 100vh; /* Fullscreen height */
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      background-image: url(indexpic.jpg);
    }

    /* Optional: Add an overlay */
    .fullscreen-image::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.4); /* Dark overlay, adjust opacity */
      z-index: 1;
    }

    /* Text container */
    .text-container {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      text-align: center;
      color: white;
      z-index: 2;
    }

    /* Title style */
    .text-container h1 {
      font-size: 5rem; /* Adjust font size as needed */
      text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7); /* Text shadow for better readability */
      margin-bottom: 1rem;
    }

    /* Description style */
    .text-container p {
      font-size: 1.5rem; /* Adjust font size as needed */
      text-shadow: 1px 1px 6px rgba(0, 0, 0, 0.7);
    }
  </style>
</head>
<body>
    <header class="text-gray-600 body-font">
        <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
          <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
            <img src="logo 2.jpg" alt="Student Connect Logo" height="100px" width="100px">
            <span class="ml-1" style="font-size: 40px;">Student Connect</span>
          </a>
          <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
            <a href="index.php" class="mr-5 hover:text-gray-1000">Home</a>
            <a href="aboutus.php" class="mr-5 hover:text-gray-900">About</a>
            <a href="faqs.php" class="mr-5 hover:text-gray-900">FAQ</a>
          </nav>
          <!-- Register button with direct redirection -->
          <button onclick="window.location.href='register.php';" class="bg-blue-500 text-white px-4 py-2 rounded">Register</button>
        </div>
      </header>
      <section class="fullscreen-image">
        <div class="text-container">
          <h1>Student Connect</h1>
          <p>Welcome to our website! Students often struggle to find peers with similar academic interests or complementary skills for group projects, research, or extracurricular activities. This website is a platform where students can connect with their seniors and juniors, know about their skills and information, and take help from them for any academic interests.</p>
        </div>
      </section>
      <footer class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto flex md:items-center lg:items-start md:flex-row md:flex-nowrap flex-wrap flex-col">
          <div class="w-64 flex-shrink-0 md:mx-0 mx-auto text-center md:text-left">
            <a class="flex title-font font-medium items-center md:justify-start justify-center text-gray-900">
              <img src="https://kjsit.somaiya.edu.in/assets/kjsieit/images/Logo/kjsieit-logo.svg" alt="KJSIT Logo" class="h-100">
            </a>
          </div>
          <div class="flex-grow flex flex-wrap md:pl-20 -mb-10 md:mt-0 mt-10 md:text-left text-center">
            <div class="lg:w-1/4 md:w-1/2 w-full px-4">
              <h2 class="title-font font-medium text-gray-900 tracking-widest text-sm mb-3">Branches</h2>
              <nav class="list-none mb-10">
                <li>
                  <a href="https://kjsit.somaiya.edu.in/en/programme/computer-engineering" class="text-gray-600 hover:text-gray-800">Computer Engineering</a>
                </li>
                <li>
                  <a href="https://kjsit.somaiya.edu.in/en/programme/information-technology-engineering" class="text-gray-600 hover:text-gray-800">Information Technology</a>
                </li>
                <li>
                  <a href="https://kjsit.somaiya.edu.in/en/programme/artificial-intelligence" class="text-gray-600 hover:text-gray-800">Artificial Intelligence</a>
                </li>
                <li>
                  <a href="https://kjsit.somaiya.edu.in/en/programme/electronics-and-telecommunication-engineering" class="text-gray-600 hover:text-gray-800">Electronics and Telecommunication</a>
                </li>
              </nav>
            </div>
            <div class="lg:w-1/4 md:w-1/2 w-full px-4">
              <h2 class="title-font font-medium text-gray-900 tracking-widest text-sm mb-3">About</h2>
              <nav class="list-none mb-10">
                <li>
                  <a href="https://kjsit.somaiya.edu.in/en/introduction" class="text-gray-600 hover:text-gray-800">Introduction</a>
                </li>
                <li>
                  <a href="https://kjsit.somaiya.edu.in/en/vision-mission" class="text-gray-600 hover:text-gray-800">Vision & Mission</a>
                </li>
                <li>
                  <a href="https://kjsit.somaiya.edu.in/en/awards-honors" class="text-gray-600 hover:text-gray-800">Awards & Honors</a>
                </li>
              </nav>
            </div>
            <div class="lg:w-1/4 md:w-1/2 w-full px-4">
              <h2 class="title-font font-medium text-gray-900 tracking-widest text-sm mb-3">Authority</h2>
              <nav class="list-none mb-10">
                <li>
                  <a href="https://kjsit.somaiya.edu.in/en/principal-words" class="text-gray-600 hover:text-gray-800">Principal's Word</a>
                </li>
                <li>
                  <a href="https://kjsit.somaiya.edu.in/en/vice-principal-words" class="text-gray-600 hover:text-gray-800">Vice Principal's Word</a>
                </li>
                <li>
                  <a href="https://president.somaiya.edu.in/en" class="text-gray-600 hover:text-gray-800">Office of President</a>
                </li>
              </nav>
            </div>
            <div class="lg:w-1/4 md:w-1/2 w-full px-4">
              <h2 class="title-font font-medium text-gray-900 tracking-widest text-sm mb-3">Explore</h2>
              <nav class="list-none mb-10">
                <li>
                  <a href="https://kjsit.somaiya.edu.in/en/" class="text-gray-600 hover:text-gray-800">KJSIT</a>
                </li>
                <li>
                  <a href="https://myaccount.somaiya.edu/#/login" class="text-gray-600 hover:text-gray-800">My Account</a>
                </li>
                <li>
                  <a href="https://sportsacademy.somaiya.edu/en" class="text-gray-600 hover:text-gray-800">Sports Academy</a>
                </li>
                <li>
                  <a href="https://brand.somaiya.edu.in/en" class="text-gray-600 hover:text-gray-800">Somaiya Brand Center</a>
                </li>
                <li>
                  <a href="https://scel.somaiya.edu/" class="text-gray-600 hover:text-gray-800">Experimental Learning</a>
                </li>
              </nav>
            </div>
          </div>
        </div>
        <div class="bg-gray-100">
          <div class="container mx-auto py-4 px-5 flex flex-wrap flex-col sm:flex-row">
            <p class="text-gray-500 text-sm text-center sm:text-left">Student Connect —
              <a href="https://twitter.com/knyttneve" rel="noopener noreferrer" class="text-gray-600 ml-1" target="_blank">@knyttneve</a>
            </p>
            <span class="inline-flex sm:ml-auto sm:mt-0 mt-2 justify-center sm:justify-start">
              <a class="text-gray-500" href="https://www.facebook.com/SomaiyaVidyaVihar/">
                <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                  <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3.28L18 10h-3V7a1 1 0 0 1 1-1h2z"></path>
                </svg>
              </a>
              <a class="ml-3 text-gray-500" href="https://twitter.com/SomaiyaTrust">
                <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                  <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53A4.48 4.48 0 0 0 16.13 3a4.48 4.48 0 0 0-4.48 4.48c0 .35.04.7.11 1.03A12.85 12.85 0 0 1 3 4.13a4.48 4.48 0 0 0 1.39 6A4.51 4.51 0 0 1 2 9.84v.06a4.48 4.48 0 0 0 3.6 4.4 4.48 4.48 0 0 1-2.03.08 4.48 4.48 0 0 0 4.2 3.12A9.04 9.04 0 0 1 1 18.57a12.75 12.75 0 0 0 6.91 2.03"></path>
                </svg>
              </a>
              <a class="ml-3 text-gray-500" href="https://www.instagram.com/somaiyatrust/">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                  <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                  <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                  <path d="M17.5 6.5h.01"></path>
                </svg>
              </a>
              <a class="ml-3 text-gray-500" href="https://www.linkedin.com/school/somaiya-vidya-vihar/">
                <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="0" class="w-5 h-5" viewBox="0 0 24 24">
                  <path stroke="none" d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-4 0v7h-4v-7a6 6 0 0 1 6-6z"></path>
                  <rect width="4" height="12" x="2" y="9"></rect>
                  <circle cx="4" cy="4" r="2"></circle>
                </svg>
              </a>
            </span>
          </div>
        </div>
      </footer>
</body>
</html>
