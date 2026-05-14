<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Portfolio Bilal Bouharrat</title>

  <!-- GOOGLE FONT -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- ICONS -->
  <link rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

  <style>

    *{
      margin:0;
      padding:0;
      box-sizing:border-box;
      font-family:'Poppins', sans-serif;
    }

    body{
      background:#0f172a;
      color:white;
      overflow-x:hidden;
    }

    /* ================= HEADER ================= */

    header{
      height:100vh;
      display:flex;
      justify-content:center;
      align-items:center;
      text-align:center;
      padding:20px;
      background:
      linear-gradient(rgba(15,23,42,.85), rgba(15,23,42,.9)),
      url('https://images.unsplash.com/photo-1515879218367-8466d910aaa4?q=80&w=2070&auto=format&fit=crop');
      background-size:cover;
      background-position:center;
    }

    .hero h1{
      font-size:70px;
      margin-bottom:20px;
      color:#38bdf8;
    }

    .hero p{
      font-size:22px;
      color:#cbd5e1;
      margin-bottom:35px;
    }

    .hero button{
      padding:15px 35px;
      border:none;
      border-radius:50px;
      background:#38bdf8;
      color:#0f172a;
      font-size:18px;
      font-weight:600;
      cursor:pointer;
      transition:.3s;
    }

    .hero button:hover{
      transform:scale(1.08);
      background:white;
    }

    /* ================= SECTION ================= */

    section{
      width:90%;
      max-width:1400px;
      margin:auto;
      padding:80px 0;
    }

    .section-title{
      text-align:center;
      margin-bottom:60px;
    }

    .section-title h2{
      font-size:45px;
      color:#38bdf8;
      margin-bottom:10px;
    }

    .section-title p{
      color:#94a3b8;
      font-size:18px;
    }

    /* ================= GRID ================= */

    .grid{
      display:grid;
      grid-template-columns:repeat(auto-fit,minmax(300px,1fr));
      gap:30px;
    }

    /* ================= CARD ================= */

    .card{
      background:#1e293b;
      border-radius:20px;
      overflow:hidden;
      transition:.4s;
      position:relative;
      box-shadow:0 10px 25px rgba(0,0,0,.3);
    }

    .card:hover{
      transform:translateY(-10px);
      box-shadow:0 15px 35px rgba(56,189,248,.4);
    }

    .card img{
      width:100%;
      height:220px;
      object-fit:cover;
    }

    .card-content{
      padding:25px;
    }

    .card-content h3{
      font-size:28px;
      margin-bottom:15px;
      color:#38bdf8;
    }

    .card-content p{
      color:#cbd5e1;
      line-height:1.7;
      margin-bottom:25px;
      font-size:15px;
    }

    /* ================= BUTTONS ================= */

    .buttons{
      display:flex;
      gap:15px;
    }

    .btn{
      flex:1;
      text-align:center;
      padding:13px;
      border-radius:10px;
      text-decoration:none;
      font-weight:600;
      transition:.3s;
      font-size:15px;
    }

    .pdf{
      background:#ef4444;
      color:white;
    }

    .pdf:hover{
      background:#dc2626;
      transform:scale(1.05);
    }

    .github{
      background:#38bdf8;
      color:#0f172a;
    }

    .github:hover{
      background:white;
      transform:scale(1.05);
    }

    /* ================= FOOTER ================= */

    footer{
      background:#020617;
      text-align:center;
      padding:30px;
      color:#94a3b8;
      margin-top:80px;
      border-top:1px solid #1e293b;
    }

    footer i{
      color:#38bdf8;
      margin:0 8px;
    }

    /* ================= RESPONSIVE ================= */

    @media(max-width:768px){

      .hero h1{
        font-size:45px;
      }

      .hero p{
        font-size:18px;
      }

      .section-title h2{
        font-size:35px;
      }

    }

  </style>
</head>

<body>

  <!-- ================= HERO ================= -->

  <header>

    <div class="hero">

      <h1>Bilal Bouharrat</h1>

      <p>
        Portfolio GitHub - 12 Ateliers Développement Web
      </p>

      <button onclick="document.getElementById('portfolio').scrollIntoView()">
        Voir Portfolio
      </button>

    </div>

  </header>

  <!-- ================= PORTFOLIO ================= -->

  <section id="portfolio">

    <div class="section-title">
      <h2>Mes Ateliers</h2>
      <p>Découvrez mes projets et travaux réalisés</p>
    </div>

    <div class="grid">

      <!-- CARD 1 -->

      <div class="card">

        <img src="https://picsum.photos/500/300?random=1">

        <div class="card-content">

          <h3>Atelier 1</h3>

          <p>
            Projet HTML CSS moderne avec design responsive et animations.
          </p>

          <div class="buttons">

            <a href="pdf/atelier1.pdf" class="btn pdf" target="_blank">
              <i class="fa-solid fa-file-pdf"></i>
              PDF
            </a>

            <a href="atelier1" class="btn github" target="_blank">
              <i class="fa-brands fa-github"></i>
              GitHub
            </a>

          </div>

        </div>

      </div>

      <!-- CARD 2 -->

      <div class="card">

        <img src="https://picsum.photos/500/300?random=2">

        <div class="card-content">

          <h3>Atelier 2</h3>

          <p>
            Application web responsive utilisant HTML CSS et JavaScript.
          </p>

          <div class="buttons">

            <a href="pdf/atelier2.pdf" class="btn pdf" target="_blank">
              <i class="fa-solid fa-file-pdf"></i>
              PDF
            </a>

            <a href="Atelier2" class="btn github" target="_blank">
              <i class="fa-brands fa-github"></i>
              GitHub
            </a>

          </div>

        </div>

      </div>

      <!-- CARD 3 -->

      <div class="card">

        <img src="https://picsum.photos/500/300?random=3">

        <div class="card-content">

          <h3>Atelier 3</h3>

          <p>
            Création d’une interface utilisateur moderne et professionnelle.
          </p>

          <div class="buttons">

            <a href="pdf/atelier3.pdf" class="btn pdf" target="_blank">
              <i class="fa-solid fa-file-pdf"></i>
              PDF
            </a>

            <a href="atelier3" class="btn github" target="_blank">
              <i class="fa-brands fa-github"></i>
              GitHub
            </a>

          </div>

        </div>

      </div>

      <!-- CARD 4 -->

      <div class="card">

        <img src="https://picsum.photos/500/300?random=4">

        <div class="card-content">

          <h3>Atelier 4</h3>

          <p>
            Dashboard élégant avec cartes et composants modernes.
          </p>

          <div class="buttons">

            <a href="pdf/atelier4.pdf" class="btn pdf" target="_blank">
              <i class="fa-solid fa-file-pdf"></i>
              PDF
            </a>

            <a href="atelier4" class="btn github" target="_blank">
              <i class="fa-brands fa-github"></i>
              GitHub
            </a>

          </div>

        </div>

      </div>

      <!-- CARD 5 -->

      <div class="card">

        <img src="https://picsum.photos/500/300?random=5">

        <div class="card-content">

          <h3>Atelier 5</h3>

          <p>
            Site web dynamique avec animations et transitions modernes.
          </p>

          <div class="buttons">

            <a href="pdf/atelier5.pdf" class="btn pdf" target="_blank">
              <i class="fa-solid fa-file-pdf"></i>
              PDF
            </a>

            <a href="" class="btn github" target="_blank">
              <i class="fa-brands fa-github"></i>
              GitHub
            </a>

          </div>

        </div>

      </div>

      <!-- CARD 6 -->

      <div class="card">

        <img src="https://picsum.photos/500/300?random=6">

        <div class="card-content">

          <h3>Atelier 6</h3>

          <p>
            Interface moderne avec sections professionnelles stylisées.
          </p>

          <div class="buttons">

            <a href="pdf/atelier6.pdf" class="btn pdf" target="_blank">
              <i class="fa-solid fa-file-pdf"></i>
              PDF
            </a>

            <a href="" class="btn github" target="_blank">
              <i class="fa-brands fa-github"></i>
              GitHub
            </a>

          </div>

        </div>

      </div>

      <!-- DUPLICATION -->

      <!-- CARD 7 -->

      <div class="card">
        <img src="https://picsum.photos/500/300?random=7">
        <div class="card-content">
          <h3>Atelier 7</h3>
          <p>Projet moderne responsive et professionnel.</p>
          <div class="buttons">
            <a href="#" class="btn pdf">PDF</a>
            <a href="#" class="btn github">GitHub</a>
          </div>
        </div>
      </div>

      <!-- CARD 8 -->

      <div class="card">
        <img src="https://picsum.photos/500/300?random=8">
        <div class="card-content">
          <h3>Atelier 8</h3>
          <p>Projet moderne responsive et professionnel.</p>
          <div class="buttons">
            <a href="#" class="btn pdf">PDF</a>
            <a href="#" class="btn github">GitHub</a>
          </div>
        </div>
      </div>

      <!-- CARD 9 -->

      <div class="card">
        <img src="https://picsum.photos/500/300?random=9">
        <div class="card-content">
          <h3>Atelier 9</h3>
          <p>Projet moderne responsive et professionnel.</p>
          <div class="buttons">
            <a href="#" class="btn pdf">PDF</a>
            <a href="#" class="btn github">GitHub</a>
          </div>
        </div>
      </div>

      <!-- CARD 10 -->

      <div class="card">
        <img src="https://picsum.photos/500/300?random=10">
        <div class="card-content">
          <h3>Atelier 10</h3>
          <p>Projet moderne responsive et professionnel.</p>
          <div class="buttons">
            <a href="#" class="btn pdf">PDF</a>
            <a href="#" class="btn github">GitHub</a>
          </div>
        </div>
      </div>

      <!-- CARD 11 -->

      <div class="card">
        <img src="https://picsum.photos/500/300?random=11">
        <div class="card-content">
          <h3>Atelier 11</h3>
          <p>Projet moderne responsive et professionnel.</p>
          <div class="buttons">
            <a href="#" class="btn pdf">PDF</a>
            <a href="#" class="btn github">GitHub</a>
          </div>
        </div>
      </div>

      <!-- CARD 12 -->

      <div class="card">
        <img src="https://picsum.photos/500/300?random=12">
        <div class="card-content">
          <h3>Atelier 12</h3>
          <p>Projet moderne responsive et professionnel.</p>
          <div class="buttons">
            <a href="#" class="btn pdf">PDF</a>
            <a href="#" class="btn github">GitHub</a>
          </div>
        </div>
      </div>

    </div>

  </section>

  <!-- ================= FOOTER ================= -->

  <footer>

    <p>
      © 2026 Bilal Bouharrat |
      <i class="fa-brands fa-github"></i>
      Portfolio GitHub
    </p>

  </footer>

</body>
</html>