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
                <div class="form-group">
                    <label>Your name:
                        <input type="text" class="form-control" name="name">
                    </label>
                </div>
                <p>Cupcake flavors</p>
                <?php
                $flavors = array("grasshopper"=>"The Grasshopper","maple"=>"Whiskey Maple Bacon",
                    "carrot"=>"Carrot Walnut","caramel"=>"Salted Caramel Cupcake","velvet"=>"Red Velvet",
                    "lemon"=>"Lemon Drop","tiramisu"=>"Tiramisu");
                foreach ($flavors as $flavor => $name)
                {
                    echo '<div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" name="'.$flavor.'">
                            '.$name.'
                        </label>
                    </div>';
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>