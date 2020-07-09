	<!DOCTYPE html>
   <html>
   <head>
      <title>Task 2 (PHP)</title>
   </head>
   <?php

        $id = $_POST['id'];
        
         // build SELECT query
         $query = "SELECT move FROM `moves` WHERE id = $id";

         // Connect to MySQL
         if ( !( $database = mysqli_connect( "localhost", "root", "" ) ) )                      
         	die( "Could not connect to database </body></html>" );
         
         // open Products database
         if ( !mysqli_select_db( $database, "robotctrl") )
         	die( "Could not open products database </body></html>" );

         // query Products database
         if ( !( $result = mysqli_query($database, $query) ) ) 
         {
         	print( "<p style='color:blue'> $id </p>" );
         	die( mysqli_error($query) . "</body></html>" );
         } // end if

         mysqli_close( $database );
         ?><!-- end PHP script -->
         <br>
         <?php
         if (mysqli_num_rows($result)>0){
            echo $result;
            while ( $row = mysqli_fetch_row( $result ))
            {
               // build table to display results
               foreach ( $row as $value ) 
                  print( $value );
            } // end while
         }else {
            echo "NO Record Found !!";
         }

      ?>
      
   </body>
   </html>