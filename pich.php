<?php
require_once('config.php');
require_once('catalogs.php');

if ( ! empty( $_POST ) ) { 
	// Send to database
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	
	$name=$_POST['name'];
	$email=$_POST['email'];
	$description=$_POST['description'];
	$vAppName=$_POST['vAppName'];
	$catalog=$_POST['catalog'];
		
	$sql1 = "INSERT INTO users (name,email,description) VALUES ('$name','$email','$description')";
	$query=mysqli_query($conn, $sql1);
	
	if ($query){
		
		$sql2 = "INSERT INTO vapps (vApp_Name,catalog) VALUES('$vAppName','$catalog')";
		$result=mysqli_query($conn, $sql2);
		echo 'Data submitted successfully';
	}else{
		echo 'There was an error during data submission';
		
	}
	
	
	
 //   $insert = $mysql->query( $query1 );
}
?>
<!-- html block-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="style.css">
        <title>Lab Audit Form</title>
    </head>
    <body>
 <?php // if(!empty($insert)) { ?> 
<!-- Function called "do_messages" and a function called "insert"-->
        <?php // echo do_messages($insert); ?>
	<?php // }  ?> 
<!--Self-submitting form-->
        <form action="" method="post">
            <input type="hidden" name="form_action" value="<?php echo $form_action; ?>">
            <div class="form-field">
                <input type="text" class="text" name="name" placeholder="Enter your name" required>
            </div>
            <div class="form-field">
                <input type="email" class="text" name="email" placeholder="Enter your email" required>
            </div>
			<div class="form-field">
                <h3 class="section-title">Comments</h3>
                <textarea class="textarea" name="description" placeholder="Enter your vApp description here"></textarea>
            </div>
         
			<div class="form-field">
                <h3 class="section-title">vApp Name</h3>
                <textarea class="textarea" name="vAppName" placeholder="Name of vApp"></textarea>
            </div>
            <div class="form-field">
                <h3 class="section-title">Catalog</h3>
                <select name="catalog" class="select" >
                    <option value="">Select a Catalog</option>
                    <?php foreach ( $catalogs as $catalog ) : ?>
                        <option value="<?php echo $catalog; ?>"><?php echo $catalog; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-field">
                <button class="button">Submit</button>
            </div>
        </form>
    </body>
</html>