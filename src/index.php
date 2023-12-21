<?php
session_start();
//unset($_SESSION['userid']);
//$_SESSION['email'] = 'watchroot@yopmail.com';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Price watcher service</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
</head>
<body>

<section class="section">
    <div class="container">

        <div class="if_user-logged-in">
            <?php if (isset($_SESSION['msg'])):?>
            <span>results of data processing: <?=$_SESSION['msg']?></span>
            <?php else: ?>

            <?php endif; ?>
        </div>
        <div class="url-adding-section">
            <form action="addwatcher.php" method="post">
                <div class="field">
                    <label class="label">add email for notifications:</label>
                    <div class="control">
                        <input class="input" type="email"
                               value="<?=$_SESSION['email']?>" name="email"
                               placeholder="<?=$_SESSION['email']?>">
                    </div>
                </div>

                <div class="field">
                    <label class="label">add url to watch:</label>
                    <div class="control">
                        <input class="input" type="url"
                               value="https://www.olx.ua/d/uk/obyavlenie/mototsikl-tekken-250-IDMCsTV.html" name="url"
                               placeholder="Type url...">
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                        <button class="button is-primary" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

</body>
</html>

