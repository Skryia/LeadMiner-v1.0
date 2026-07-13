<?php

declare(strict_types=1);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>LeadMiner</title>

        <link
            rel="stylesheet"
            href="assets/css/app.css"
        >
    </head>
    <body>

    <div class="container">

        <h1>LeadMiner</h1>

        <form id="searchForm">

            <div>
                <label>Keyword</label>

                <input
                    type="text"
                    name="keyword"
                    value="African Churches"
                >
            </div>

            <div>
                <label>Location</label>

                <input
                    type="text"
                    name="location"
                    value="Southampton"
                >
            </div>

            <div>
                <label>Max Results</label>

                <input
                    type="number"
                    name="max_results"
                    value="500"
                >
            </div>

            <hr>

            <label>
                <input type="checkbox"
                    name="include_facebook"
                    checked>
                Facebook
            </label>

            <label>
                <input type="checkbox"
                    name="include_instagram"
                    checked>
                Instagram
            </label>

            <label>
                <input type="checkbox"
                    name="include_website"
                    checked>
                Website
            </label>

            <label>
                <input type="checkbox"
                    name="include_email"
                    checked>
                Email
            </label>

            <label>
                <input type="checkbox"
                    name="include_phone"
                    checked>
                Phone
            </label>

            <br><br>

            <button type="submit">
                Search
            </button>

        </form>

        <hr>

        <div id="result"></div>

    </div>

    <script src="assets/js/app.js"></script>

    </body>
</html>