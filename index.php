<?php 

include("config/db_connect.php");

// write query for all pizzas
$sql ='SELECT title, ingredients, id FROM PIZZAS ORDER BY created_at';

//make query and get result
$result = mysqli_query($conn, $sql);

//fetch the resulting rows as an array
$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

// print_r($pizzas);

mysqli_free_result($result);
mysqli_close($conn);

// print_r(explode(',', $pizzas[0]['ingredients']));

?>

<!DOCTYPE html>
<html>

    <?php include('templates/header.php'); ?>

    <h4 class="center grey_text">Pizzas!</h4>
    <div class ="container">
        <div class="row">
            <?php foreach($pizzas as $pizza):
                ?>
                <div class="col s6 md3">
                    <div class="card z depth-0">
                        <div class="cardf-content center">
                            <h6><?php echo htmlspecialchars($pizza['title']); ?></h6>
                            <ul>
                                <?php foreach(explode(",", $pizza["ingredients"]) as $ing){ ?>
                                    <li><?php echo htmlspecialchars($ing); ?></li>
                                <?php } ?>
                            </ul>

                        </div>
                    
                    <div class="card-action right-align">
                        <a class="brand-text" href="details.php?id=<?php echo $pizza["id"] ?>"> more info</a>
                    </div>
                    </div>
                </div>
            <?php endforeach ?>
            <?php if(count($pizzas) >= 3){ ?>
                <p>there are 3 or more pizzas</p>
            <?php } else { ?>
                <p>there are less than 3 pizzas</p>
            <?php } ?>
        </div>
    </div>
    <?php include('templates/footer.php'); ?>


</body>
</html>