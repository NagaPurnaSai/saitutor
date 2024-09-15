<?php
  /*#######################****connection to database****###############*/
  require("config.php");
  /*######################****session login***##################*/
 /* if( $_SESSION['login'] != "yes" ){
  header("Location: login.php?SessionExpired");
  exit;
}*/
  if( $_GET['submit'] == "logout" ){
    unset( $_SESSION['login'] );
    header("Location: login.php?");
    exit;
  }

  if ( $_POST['action'] == "check_username" ) {
    $stage = 2;
    $username = mysqli_escape_string($con, $_POST['username']);
    $query = "select id,security_question from datatable where username = '$username'";
    $result = mysqli_query($con, $query);
    $user = mysqli_fetch_assoc($result);
    echo "found!";
  }
  if ( $_POST['action'] == "check_question" ) {

    $query = "select id, security_question,security_answer from datatable where id = ".$_POST['user_id'];
    $result = mysqli_query($con, $query);
    $user = mysqli_fetch_assoc($result);
    if( $user['security_answer'] == $_POST['security_answer'] ){
      $stage = 3; 
    }else{
      $stage = 2;
      $stage2_error = "Incorrect answer!";
    }
  }
  if ( $_POST['action'] == "update_password" ) {
    $stage = 3;
    /*$username = mysqli_escape_string($con, $_POST['username']);*/
    $query = "update  datatable set 
    password = '".mysqli_escape_string($con,$_POST['new_password'])."'
    where id = ".$_POST['user_id'];
    $result = mysqli_query($con, $query);
    if( !mysqli_error($con) ){
      header("Location: login.php?");
       
    }else{
      $stage = 3;
      $stage3_error = "password enter!";
    }
    
  }

    if( $stage == 3 ){ ?>

      <form method="post" action="forget.php">  
        New password: 
        <input type="text" name="new_password" />

        <input type="submit" name="submit" value="submit" />
        <input type="hidden" name="action" value="update_password" >
        <input type="hidden" name="user_id" value="<?=$user['id'] ?>" >
      </form>

      <?php if( $stage2_error ){ ?><div style='color:red;' ><?=$stage2_error ?></div><?php } ?>


    <?php }elseif( $stage == 2 ){ ?>

      <form method="post" action="forget.php">  
        <p>Security Question:</p>
        <p><?=$user['security_question'] ?></p>
        <label>Answer:</label>
        <input type="text" name="security_answer" />
        <input type="submit" name="submit" value="Submit" />
        <input type="hidden" name="action" value="check_question" >
        <input type="hidden" name="user_id" value="<?=$user['id'] ?>" >
      </form>

      <?php if( $stage2_error ){ ?><div style='color:red;' ><?=$stage2_error ?></div><?php } ?>


    <?php }else{ ?>
    <form method="post" action="forget.php">
      <label for="username">Username:</label>
      <input type="text" name="username" id="username" />
      <input type="submit" name="submit" value="Submit" />
      <input type="hidden" name="action" value="check_username" >
    </form>
    <?php
    }

?>
