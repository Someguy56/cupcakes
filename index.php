<!--
    Author: Max Lee
    Date: 4/4/2019
    URL: http://mlee.greenriverdev.com/328/cupcakes/

    This is a cupcake order form to help review PHP. The form is sticky and sanitizes inputs.
-->

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Cupcake Order Form</title>
</head>
<body>
    <h1 class="jumbotron">Cupcake Fundraiser</h1>

    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <form method="post">
                    <div class="form-group">
                        <label>Your name:
                            <input type="text" class="form-control" name="name" value="<?php
                            if(isset($_POST['name'])) echo $_POST['name'];?>">
                        </label>
                    </div>
                    <p>Cupcake flavors:</p>
                    <?php
                    $flavors = array("grasshopper"=>"The Grasshopper","maple"=>"Whiskey Maple Bacon",
                        "carrot"=>"Carrot Walnut","caramel"=>"Salted Caramel Cupcake","velvet"=>"Red Velvet",
                        "lemon"=>"Lemon Drop","tiramisu"=>"Tiramisu");
                    foreach ($flavors as $flavor => $name)
                    {
                        echo '<div class="form-check">'.
                            '<label class="form-check-label">'.
                                '<input class="form-check-input" type="checkbox" name="flavors[]" value="'.$flavor.'"';
                                if (isset($_POST['flavors']) && in_array($flavor, $_POST['flavors']))
                                {
                                    echo 'checked';
                                }
                                echo '>'.$name .
                            '</label>'.
                        '</div>';
                    }
                    ?>
                    <br>
                    <button type="submit" class="btn btn-primary">Order</button>
                </form>
            </div>
            <div class="col-sm-4">
                <?php
                if($_SERVER['REQUEST_METHOD'] == 'POST')
                {
                    //holds all the error messages
                    $errors = [];

                    //checks if a name was given
                    if(!empty($_POST['name']))
                    {
                        //sanitizes the name provided
                        $name = filter_var($_POST['name'],FILTER_SANITIZE_STRING);
                    }
                    else
                    {
                        $errors[] = "You forgot to add your name.";
                    }

                    //checks if no flavor was given
                    if (empty($_POST['flavors']))
                    {
                        $errors[] = "You forgot to pick any cupcakes.";
                    }

                    //if no error messages display a success message with name, order, and cost.
                    if(empty($errors))
                    {
                        echo '<div class="alert alert-success" role="alert"><h4>Success!</h4>';

                        echo '<p>Thank you, '.$_POST['name'].', for your order!</p>';
                        echo '<p>Order Summary:</p><ul>';
                        foreach ($_POST['flavors'] as $cupcake)
                        {
                            echo "<li>$flavors[$cupcake]</li>";
                        }

                        echo '</ul><p>Order Total: $'.number_format((sizeof($_POST['flavors'])*3.5),2).'</p></div>';
                    }
                    //displays the errors
                    else
                    {
                        echo '<div class="alert alert-danger" role="alert"><h4>Error!</h4>';

                        echo '<p>The following error(s) occurred:<br>';
                        foreach ($errors as $msg) { // Print each error.
                            echo " - $msg<br>\n";
                        }
                        echo '</p><p>Please try again.</p>';
                        echo '</div>';
                    }
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>