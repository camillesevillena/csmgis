<?php
include '../includes/conn.php';

 


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = mysqli_query($conn, "UPDATE  municipality_climatic_data  SET del = 'Y' WHERE  id = '$id' ");
    if ($query) {
?>
        <script>
            alert('Climatic Data Removed Successfully!');
            window.location.href = "index.php";
        </script>
    <?php
    } else { ?>
        <script>
            alert('Error Deleting try again later.');
            window.location.href = "index.php";
        </script> <?php
                }
            }


          



            if (isset($_GET['account_id'])) {
                $account_id = $_GET['account_id'];
            
                $query2 = mysqli_query($conn, "UPDATE  municipality_account  SET del = 'Y' where id = '$account_id' ");

                
                if ($query2) {
            ?>
                    <script>
                        alert('Municipality Account Removed Successfully!');
                        window.location.href = "municipality-account.php";
                    </script>
                <?php
                } else { ?>
                    <script>
                        alert('Error Deleting try again later.');
                        window.location.href = "municipality-account.php";
                    </script> <?php
                            }
                        }
            



                    ?>