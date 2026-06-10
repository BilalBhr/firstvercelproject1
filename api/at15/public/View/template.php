<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TDM-Classroom</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Syne:wght@700;800&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --bg:        #0d0f14;
            --surface:   #14171f;
            --card:      #1b1f2a;
            --border:    #252935;
            --accent:    #6c63ff;
            --accent2:   #a78bfa;
            --text:      #e8eaf0;
            --muted:     #7b82a0;
            --danger:    #ff5f6d;
            --success:   #22d3a5;
            --radius:    12px;
            --nav-h:     64px;
        }

        html { scroll-behavior: smooth; }

        body {
            background: var(--bg);
            color: var(--text);
            font-family: 'Inter', sans-serif;
            font-size: 15px;
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* ── NAV ── */
        nav {
            position: sticky; top: 0; z-index: 100;
            height: var(--nav-h);
            background: rgba(13,15,20,.85);
            backdrop-filter: blur(16px);
            border-bottom: 1px solid var(--border);
            display: flex; align-items: center;
            padding: 0 32px;
            gap: 40px;
        }
        .nav-brand {
            font-family: 'Syne', sans-serif;
            font-size: 22px; font-weight: 800;
            color: var(--text);
            text-decoration: none;
            display: flex; align-items: center; gap: 6px;
        }
        .nav-brand span { color: var(--accent); }
        .nav-links { display: flex; gap: 4px; flex: 1; }
        .nav-links a {
            color: var(--muted);
            text-decoration: none;
            font-size: 14px; font-weight: 500;
            padding: 6px 14px;
            border-radius: 8px;
            transition: color .2s, background .2s;
        }
        .nav-links a:hover, .nav-links a.active {
            color: var(--text);
            background: var(--card);
        }

        /* ── HERO ── */
        .hero {
            position: relative;
            height: 340px;
            overflow: hidden;
            display: flex; align-items: center;
        }
        .hero-img {
            position: absolute; inset: 0;
            background-image: url('<?= URL ?>public/images/school.jpg');
            background-size: cover; background-position: center;
            filter: brightness(.35);
        }
        .hero-overlay {
            position: absolute; inset: 0;
            background: linear-gradient(120deg, rgba(108,99,255,.25) 0%, transparent 60%);
        }
        .hero-content {
            position: relative; z-index: 1;
            padding: 0 48px;
        }
        .hero-label {
            font-size: 12px; font-weight: 600; letter-spacing: .12em;
            color: var(--accent2); text-transform: uppercase; margin-bottom: 12px;
        }
        .hero-title {
            font-family: 'Syne', sans-serif;
            font-size: clamp(32px, 5vw, 52px);
            font-weight: 800; line-height: 1.1;
            color: #fff;
        }
        .hero-title span { color: var(--accent); }

        /* ── MAIN CONTENT ── */
        main { flex: 1; padding: 48px 32px; max-width: 900px; margin: 0 auto; width: 100%; }

        .section-title {
            font-family: 'Syne', sans-serif;
            font-size: 22px; font-weight: 700;
            margin-bottom: 24px;
            color: var(--text);
        }
        .section-title span { color: var(--accent); }

        /* ── CARD ── */
        .card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 32px;
        }

        /* ── FORM ── */
        .form-group { margin-bottom: 20px; }
        .form-group label {
            display: block; margin-bottom: 6px;
            font-size: 13px; font-weight: 500; color: var(--muted);
            text-transform: uppercase; letter-spacing: .06em;
        }
        .form-group input[type="text"],
        .form-group input[type="password"],
        .form-group input[type="file"] {
            width: 100%;
            background: var(--bg);
            border: 1px solid var(--border);
            border-radius: 8px;
            padding: 10px 14px;
            color: var(--text);
            font-family: 'Inter', sans-serif;
            font-size: 14px;
            outline: none;
            transition: border-color .2s, box-shadow .2s;
        }
        .form-group input:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(108,99,255,.18);
        }
        .form-group input[type="file"] { cursor: pointer; }

        /* ── BUTTONS ── */
        .btn {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 10px 22px;
            border-radius: 8px;
            font-family: 'Inter', sans-serif;
            font-size: 14px; font-weight: 600;
            cursor: pointer;
            border: none;
            transition: opacity .2s, transform .15s;
        }
        .btn:hover { opacity: .88; transform: translateY(-1px); }
        .btn:active { transform: translateY(0); }
        .btn-primary { background: var(--accent); color: #fff; }
        .btn-ghost {
            background: transparent;
            border: 1px solid var(--border);
            color: var(--muted);
        }
        .btn-ghost:hover { color: var(--text); border-color: var(--text); }
        .btn-actions { display: flex; gap: 10px; margin-top: 8px; flex-wrap: wrap; }

        /* ── TABLE ── */
        .table-wrap { overflow-x: auto; margin-top: 24px; }
        table { width: 100%; border-collapse: collapse; }
        thead tr { border-bottom: 1px solid var(--border); }
        th {
            padding: 10px 14px;
            font-size: 11px; font-weight: 600;
            text-transform: uppercase; letter-spacing: .1em;
            color: var(--muted); text-align: left;
        }
        tbody tr {
            border-bottom: 1px solid var(--border);
            transition: background .15s;
        }
        tbody tr:hover { background: rgba(108,99,255,.06); }
        td {
            padding: 12px 14px;
            font-size: 14px; color: var(--text);
        }
        td img {
            width: 42px; height: 42px;
            border-radius: 50%; object-fit: cover;
            border: 2px solid var(--border);
        }

        /* ── FEEDBACK ── */
        #imsg, .msg {
            margin-top: 14px;
            font-size: 13px;
            color: var(--danger);
        }
        .msg-success { color: var(--success); }

        /* ── SEARCH BAR ── */
        .search-row {
            display: flex; gap: 10px; align-items: flex-end;
            flex-wrap: wrap; margin-bottom: 20px;
        }
        .search-row .form-group { margin-bottom: 0; flex: 1; min-width: 200px; }

        /* ── ERROR ── */
        .error-page {
            text-align: center; padding: 80px 24px;
        }
        .error-code {
            font-family: 'Syne', sans-serif;
            font-size: 96px; font-weight: 800;
            color: var(--accent); opacity: .3;
            line-height: 1;
        }
        .error-msg { color: var(--muted); margin-top: 12px; }

        /* ── FOOTER ── */
        footer {
            border-top: 1px solid var(--border);
            padding: 24px 32px;
            text-align: center;
            color: var(--muted);
            font-size: 13px;
        }
        footer strong { color: var(--accent2); font-family: 'Syne', sans-serif; }
    </style>
</head>
<body>

<!-- NAV -->
<nav>
    <a class="nav-brand" href="<?= URL ?>accueil">TDM<span>.</span>Classroom</a>
    <div class="nav-links">
        <a href="<?= URL ?>accueil">Accueil</a>
        <a href="<?= URL ?>save">Nouveau</a>
        <a href="<?= URL ?>search">Rechercher</a>
    </div>
</nav>

<!-- HERO -->
<div class="hero">
    <div class="hero-img"></div>
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <div class="hero-label">Gestion des étudiants</div>
        <h1 class="hero-title">Bienvenue à<br>TDM<span>-</span>Classroom</h1>
    </div>
</div>

<!-- MAIN -->
<main>
    <h2 class="section-title"><?= $titre ?></h2>
    <div class="card">
        <?= $content ?>
    </div>
</main>

<!-- FOOTER -->
<footer>
    <strong>TDM-Classroom</strong> &nbsp;·&nbsp; Copyright © Tous droits réservés.
</footer>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(function(){
    // Authentification
    $('#ibc').click(function(){
        var login = $('#ilog').val();
        var password = $('#ipass').val();
        $.ajax({
            type: "POST",
            url: "<?= URL ?>accueil/aut",
            data: 'login=' + login + '&pass=' + password,
            dataType: 'json'
        }).done(function(res){
            let message = res.message;
            if(message == 'ok'){
                window.location = "<?= URL ?>save";
            } else {
                $("#imsg").html('<span style="color:var(--danger)">' + message + '</span>');
            }
        });
    });

    // Afficher tous
    $('#iball').click(function(){
        $.ajax({
            type: "POST",
            url: "<?= URL ?>search/all",
            data: 'display=all',
            dataType: 'json'
        }).done(function(res){ renderTable(res.all); });
    });

    // Recherche par ville
    $('#ibyville').click(function(){
        let ville = $('#iville').val();
        $.ajax({
            type: "POST",
            url: "<?= URL ?>search/ville",
            data: 'byville=' + ville,
            dataType: 'json'
        }).done(function(res){ renderTable(res.all); });
    });

    function renderTable(data){
        let html = '<tr><th>Nom</th><th>Prénom</th><th>Ville</th><th>Photo</th></tr>';
        for(let i in data){
            html += `<tr>
                <td>${data[i].nom}</td>
                <td>${data[i].prenom}</td>
                <td>${data[i].ville}</td>
                <td><img src="${data[i].image}" alt="${data[i].nom}"/></td>
            </tr>`;
        }
        $("#iresall").html(html);
    }
});
</script>
</body>
</html>
