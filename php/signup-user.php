<?php require_once "controllerUserData.php"; ?>
<?php
                    if(count($errors) == 1){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo "<script>alert('$showerror');</script>"; 
                                echo "<script>window.location.href = 'login-user.php';</script>";
                            }
                            ?>
                        </div>
                        <?php
                    }elseif(count($errors) > 1){
                        ?>
                        <div class="alert alert-danger">
                            <?php
                            foreach($errors as $showerror){
                                ?>
                                 <li><?php echo "<script>alert('$showerror');</script>";
                                           echo "<script>window.location.href = 'login-user.php';</script>"  
                                        ?></li>
                                <?php
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>