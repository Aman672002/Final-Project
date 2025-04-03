
<main>
	 <h1> Welcome <?php echo $Username ?></h1>
        <form action="session_example.php" method="post">

                <label>Username:</label>
                <input type="text" name="Username" value=<?php echo $Username ?>><br>

                <label>Email:</label>
                <input type="email" name="email" value=<?php echo $email ?>><br>

                <input type="submit" name ="action" value="Set Values"><br>
        </form>

</main>