<?php   
function getPremium($vehicleType) {  
    if ($vehicleType == "Compact")
        $premiumAmount = 0;
    elseif ($vehicleType == "Sedan" || $vehicleType == "Minivan")
        $premiumAmount = 50;
    elseif ($vehicleType == "SUV")
        $premiumAmount = 75;
    elseif ($vehicleType == "Truck")
        $premiumAmount = 125;
    elseif ($vehicleType == "Sport")
        $premiumAmount = 200;
    return $premiumAmount;
}

function calculateBaseRate($age, $yearsInsured) { 
    $totalYears = $age + $yearsInsured;
    if ($totalYears >= 16 && $totalYears <= 24)
        $baseRate = 1000;
    elseif ($totalYears >= 25 && $totalYears <= 34)
        $baseRate = 600;
    elseif ($totalYears >= 35)
        $baseRate = 250;
    return $baseRate;
}   

$action = filter_input(INPUT_POST, 'action'); 

if ($action == "Submit Application") { 
    $fullName = filter_input(INPUT_POST, 'fullName');
    $emailAddress = filter_input(INPUT_POST, 'email');
    $userAge = filter_input(INPUT_POST, 'age', FILTER_VALIDATE_INT);
    $insuredYears = filter_input(INPUT_POST, 'yearsInsured', FILTER_VALIDATE_INT);
    $selectedVehicleType = filter_input(INPUT_POST, 'vehicleType');
    $errorMessage = "";

    if (empty($fullName) || empty($emailAddress) || empty($userAge) || empty($insuredYears) || empty($selectedVehicleType))
        $errorMessage = "<p>All fields are required.</p>";

    if ($userAge === false || $insuredYears === false)
        $errorMessage .= "<p>Age and Years Insured must be valid numbers.</p>";

    if ($userAge < 16)
        $errorMessage .= "<p>Your age must be at least 16 years.</p>";

    if ($errorMessage == "") {
        $baseRate = calculateBaseRate($userAge, $insuredYears);
        $premiumAmount = getPremium($selectedVehicleType);                 
        $monthlyInsuranceRate = $baseRate + $premiumAmount;
        
        $message = "<label>Name:</label>
                    <span>$fullName</span><br>
                    <label>Email:</label>
                    <span>$emailAddress</span><br>
                    <label>Age:</label>
                    <span>$userAge</span><br>
                    <label>Years Insured:</label>
                    <span>$insuredYears</span><br>
                    <label>Vehicle Type:</label>
                    <span>$selectedVehicleType</span><br>
                    <label>Monthly Rate:</label>
                    <span>$monthlyInsuranceRate</span><br>";
    }
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Insurance Quote</title>
        <link rel="stylesheet" href="main.css">
    </head>
    <body>
        <p><a href="insurance_application.php">Back to Application Form</a></p>
        <main>
            <h1>Insurance Quote:</h1>
            <div><?php echo $errorMessage; ?></div>
            <p><a href="insurance_application.php">Back to Application Form</a></p>
        </main>
    </body>
    </html>
    <?php 
} else { 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Insurance Application Form</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <main>
    <h1>Insurance Application Form</h1>        
    <form action="insurance_application.php" method="post">
        <div id="data">
            <label>Full Name:</label>
            <input type="text" name="fullName">
            <br>

            <label>Email:</label>
            <input type="text" name="email">
            <br>

            <label>Age (minimum 16):</label>
            <input type="text" name="age">
            <br>

            <label>Number of Years Insured:</label>
            <input type="text" name="yearsInsured">
            <br>

            <label>Vehicle Type:</label>
            <select name="vehicleType">
                <option value=""></option>
                <option value="Compact">Compact</option>
                <option value="Sedan">Sedan</option>
                <option value="Sport">Sport</option>
                <option value="SUV">SUV</option>
                <option value="Minivan">Minivan</option>
                <option value="Truck">Truck</option>  
            </select>
            <br>
        </div>
        <div id="buttons">
            <label>&nbsp;</label>
            <input type="submit" name="action" value="Submit Application"><br>
        </div>
    </form>
    </main>
</body>
</html>
<?php  } ?>
