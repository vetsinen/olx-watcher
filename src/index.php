<?php
session_start();
unset($_SESSION['userid']);
//$_SESSION['userid'] = 1;
?>
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

        <div class="if_user-logged-in">
            <?php if (isset($_SESSION['userid'])):?>
            <h2> hello user <?=$_SESSION['userid']?> </h2>
            <?php else: ?>
            <h2>to get email-notifications about price changes, you need to register or login</h2>
                <div class="columns">
                    <!-- First Row -->
                    <div class="column">
                        <div class="box">
                            <!-- Your content for the first row goes here -->
                            <p>Fill this form to register</p>
                            <div class="columns is-centered">
                                <div class="column is-one-third">
                                    <form action="process_registration.php" method="post">
                                        <!-- User Registration Form -->
                                        <div class="field">
                                            <label class="label">Email</label>
                                            <div class="control">
                                                <input class="input" type="email" placeholder="Your Email" name="email" required>
                                            </div>
                                        </div>

                                        <div class="field">
                                            <label class="label">Password</label>
                                            <div class="control">
                                                <input class="input" type="password" placeholder="Your Password" name="password" required>
                                            </div>
                                        </div>

                                        <div class="field">
                                            <label class="label">Repeat password</label>
                                            <div class="control">
                                                <input class="input" type="password" placeholder="Your Password" name="password" required>
                                            </div>
                                        </div>

                                        <div class="field">
                                            <div class="control">
                                                <button class="button is-primary" type="submit">Register</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Second Row -->
                    <div class="column">
                        <div class="box">
                            <!-- Your content for the second row goes here -->
                            <p>Fill this form to login</p>
                            <div class="columns is-centered">
                                <div class="column is-one-third">
                                    <form action="process_login.php" method="post">
                                        <div class="field">
                                            <label class="label">Email</label>
                                            <div class="control">
                                                <input class="input" type="email" placeholder="Your Email" name="email" required>
                                            </div>
                                        </div>

                                        <div class="field">
                                            <label class="label">Password</label>
                                            <div class="control">
                                                <input class="input" type="password" placeholder="Your Password" name="password" required>
                                            </div>
                                        </div>

                                        <div class="field">
                                            <div class="control">
                                                <button class="button is-primary" type="submit">Login</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <div class="url-adding-section">
            <form action="addwatcher.php" method="post">
                <div class="field">
                    <label class="label">add url to watch here:</label>
                    <div class="control">
                        <input class="input" type="text"
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

