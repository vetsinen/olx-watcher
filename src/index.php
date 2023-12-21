<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Price watcher service</title>
    <!-- Include Bulma CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
</head>
<body>

<section class="section">
    <div class="container">
        <h1 class="title">add url to watch here</h1>
        <form action="process.php" method="post">
            <div class="field">
                <label class="label">Enter Url:</label>
                <div class="control">
                    <input class="input" type="text"
                           value="https://www.olx.ua/d/uk/obyavlenie/mototsikl-tekken-250-IDMCsTV.html" name="url" placeholder="Type url...">
                </div>
            </div>

            <div class="field">
                <div class="control">
                    <button class="button is-primary" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
</section>

</body>
</html>

