<?php
/*
Template Name: Register
*/
get_header();
if (!defined('ABSPATH')) exit; // Exit if accessed directly 
?>

<body id="page" <?php body_class(); ?>>
   <div class="container">
      <div class="register">
         <?php
         global $wpdb, $user_ID;    //Check whether the user is already logged in 
         if (!$user_ID) {
            // Default page shows register form. To show Login form set query variable action=login
            $action = (isset($_GET['action'])) ? $_GET['action'] : 0;
            // Login Page
            if ($action === "login") { ?>
               <?php
               $login = (isset($_GET['login'])) ? $_GET['login'] : 0;
               if ($login === "failed") {
                  echo '<div class="error"><strong>ERROR:</strong> Invalid username and/or password.</div>';
               } elseif ($login === "empty") {
                  echo '<div class="error"><strong>ERROR:</strong> Username and/or Password is empty.</div>';
               } elseif ($login === "false") {
                  echo '<div class="error"><strong>ERROR:</strong> You are logged out.</div>';
               }
               ?>
               <div class="login">
                  <?php
                  $args = array(
                     'redirect' => home_url() . '/login/',
                  );
                  wp_login_form($args); ?>
                  <p class="text-center"><a class="mr-2" href="<?php echo wp_registration_url(); ?>">Register</a>
                     <span clas="mx-2">·</span><a class="ml-2" href="<?php echo wp_lostpassword_url(); ?>" title="Lost Password">Lost Password?</a>
                  </p>
               </div>
            <?php
            } else { // Register Page 
            ?>
               <?php
               if ($_POST) {
                  $error = 0;
                  $username = esc_sql($_REQUEST['username']);
                  if (empty($username)) {
                     echo '<div class="error">User name should not be empty.</div>';
                     $error = 1;
                  }
                  $email = esc_sql($_REQUEST['email']);
                  if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/", $email)) {
                     echo '<div class="error">Please enter a valid email.</div>';
                     $error = 1;
                  }
                  if ($error == 0) {
                     $random_password = wp_generate_password(12, false);
                     $status = wp_create_user($username, $random_password, $email);
                     if (is_wp_error($status)) {
                        echo '<div class="error">Username already exists. Please try another one.</div>';
                     } else {
                        $from = get_option('admin_email');
                        $headers = 'From: ' . $from . "\r\n";
                        $subject = "Registration successful";
                        $message = "Registration successful.\nYour login details\nUsername: $username\nPassword: $random_password";
                        // Email password and other details to the user
                        wp_mail($email, $subject, $message, $headers);
                        echo "Please check your email for login details.";
                        $error = 2; // We will check for this variable before showing the sign up form. 
                     }
                  }
               }
               if ($error != 2) { ?>
                  <?php if (get_option('users_can_register')) { ?>
                     <div class="register">
                        <form action="" method="post">
                           <p>
                              <label for="user_login">Username</label>
                              <input type="text" name="username" placeholder="Type your Username Here" class="inputs" value="<?php if (!empty($username)) echo $username; ?>" /><br />
                           </p>
                           <p>
                              <label for="user_email">Email</label>
                              <input type="text" name="email" placeholder="Type your Email Here" class="inputs" value="<?php if (!empty($email)) echo $email; ?>" /> <br />
                           </p>
                           <input type="submit" id="submit_button" class="mb-4" name="submit" value="SignUp" />
                        </form>
                        <p>Already have an account? <a href="/login">Login Here</a></p>
                     </div>
               <?php } else {
                     echo "Registration is currently disabled. Please try again later.";
                  }
               } ?>
            <?php }
         } else { ?>
            <p>You are logged in. Click <a href="<?php bloginfo('wpurl'); ?>">here to go home</a></p>
         <?php } ?>
      </div>
   </div>
   <?php get_footer();
   ?>
</body>

</html>