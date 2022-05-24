<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Orijin PC</title>
      <link rel="stylesheet" href="style.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
   </head>
   <body class="bg-contact">
      <nav>
         <div class="menu-icon">
            <span class="fas fa-bars"></span>
         </div>
         <div class="logo">
            Orijin PC
         </div>
         <div class="nav-items">
            <li><a href="index.html">Home</a></li>
            <li><a href="pcModel.html">PC Model</a></li>
            <li><a href="contact.html">Contact Support</a></li>
            <li><a href="Review.html">Review</a></li>
         </div>
         <div class="search-icon">
            <span class="fas fa-search"></span>
         </div>
         <div class="cancel-icon">
            <span class="fas fa-times"></span>
         </div>
         <form action="#">
            <input type="search" class="search-data" placeholder="Search" required>
            <button type="submit" class="fas fa-search"></button>
         </form>
      </nav>
      <div class="content-contact">
         <h1>Get In Touch</h1>
         <p>We are help for you!</p><br><br><br>
         <div class="kontak">
            <table>
               <tr>
                  <td><img src="img/location.svg"></td>
                  <td><p>6th Filkom, Veteran Street, Malang</p></td>
               </tr>
               <tr>
                  <td><img src="img/email.svg"></td>
                  <td><p>haveagreatday@gmail.com</p></td>
               </tr>
               <tr>
                  <td><img src="img/call.svg"></td>
                  <td><p>602-216-4143</p></td>
               </tr>
            </table>
         </div>
      </div>
      <script>
         const menuBtn = document.querySelector(".menu-icon span");
         const searchBtn = document.querySelector(".search-icon");
         const cancelBtn = document.querySelector(".cancel-icon");
         const items = document.querySelector(".nav-items");
         const form = document.querySelector("form");
         menuBtn.onclick = ()=>{
           items.classList.add("active");
           menuBtn.classList.add("hide");
           searchBtn.classList.add("hide");
           cancelBtn.classList.add("show");
         }
         cancelBtn.onclick = ()=>{
           items.classList.remove("active");
           menuBtn.classList.remove("hide");
           searchBtn.classList.remove("hide");
           cancelBtn.classList.remove("show");
           form.classList.remove("active");
           cancelBtn.style.color = "#ff3d00";
         }
         searchBtn.onclick = ()=>{
           form.classList.add("active");
           searchBtn.classList.add("hide");
           cancelBtn.classList.add("show");
         }
      </script>
      <footer>
         <p>bismillah</p>
         <p>insyaallah 100 ini mah</p>
      </footer>
   </body>
</html>