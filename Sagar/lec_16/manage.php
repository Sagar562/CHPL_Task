<?php
// Check if data is received via POST
if (isset($_POST['action'])) {
    // Get the values from POST

    $country = $_POST['action'];
 
   switch ($country)
   {
        case 'India' :
                $state = ['Gujarat','Goa'];
                break;

        case 'USA' :
                $state = ['L.A','Texas'];
                break;
        
        default :
            echo "No country record";
            break;
   }

}
?>