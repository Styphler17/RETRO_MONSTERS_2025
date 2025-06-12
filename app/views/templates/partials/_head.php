<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>RetroMonsters</title>
    <link rel="icon" type="image/png" href="images/favico.png" />
    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Creepster&family=Roboto:wght@100;400;900&display=swap"
        rel="stylesheet" />
    <!-- FontAwesome -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <!-- Tailwind CSS -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" />
    <!-- Alpine.js -->
    <script src="//unpkg.com/alpinejs" defer></script>
    <!-- Nouislider -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/nouislider/distribute/nouislider.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/nouislider/distribute/nouislider.min.js"></script>
    <!-- Main CSS -->
    <style>
        .monster-card[data-monster-type="Cosmique"] {
            background: linear-gradient(to right, #6e48aa, #9d50bb);
        }

        .monster-card[data-monster-type="Aquatique"] {
            background: linear-gradient(to right, #395ca6, #546da4);
        }

        .monster-card[data-monster-type="Terrestre"] {
            background: linear-gradient(to right, #3a4146, #657581);
        }

        .monster-card[data-monster-type="Volant"] {
            background: linear-gradient(to right, #2e5063, #457791);
        }

        .monster-card[data-monster-type="Spectral"] {
            background: linear-gradient(to right, #7b195a, #9d3078);
        }

        body {
            font-family: "Roboto", sans-serif;
        }

        h1, h2, h3, span {
            color: #fff;
        }
        .creepster {
            font-family: "Creepster", system-ui;
            font-size: 2rem;
            letter-spacing: 0.2rem;
        }

        .noUi-connect {
            background: #516ba4;
        }

        .prev-page, .next-page {
            margin-right: 1rem;
            color: #fff;
            background: #516ba4;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            text-decoration: none;
        }
        .prev-page:hover, .next-page:hover {
            background: #9d3078;
            transition: background 0.3s ease-in-out;
            cursor: pointer;
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            color: #fff;
        }
        .prev-page::before {
            background: linear-gradient(to right, #516ba4, #9d3078);
        }
        .next-page::before {
            background: linear-gradient(to right, #9d3078, #516ba4);
        }
    </style>
</head>