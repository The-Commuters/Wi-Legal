<?Php
/* This is the registration page where users are created,
It contains three forms where you can  one who registers new users */

/* Connects to database and retrieves time */
require '../config/config.php';
/* Retrieving php code from register_handler.php */
require '../src/model/form_handlers/register_handler.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr" >

    <!-- HEAD -->
    <?php $page_title = '';include "../src/utils/template/components/head.php";?>  

<body>
    <!-- HEADER -->
    <?php $current_page = 'register'; include '../src/utils/template/components/header.php'; ?>
    <main class="marg-container">

        <div class="register center-marg med-marg-top">

            <!-- Register title -->
            <h1 class="blue-txt">What type of account do you wish to register?</h1>

            <!-- User register -->
            <div class="med-marg-bot card fade-right-2s">
                <div id="user" class="register-tab full-w ">
                    <div class="register-title center-marg container white-txt">
                        <h2>User</h2>
                        <i class="fas fa-play"></i>
                    </div>
                </div>
            
                <div id="user-register" class="register-form full-w bread-txt faded-black-txt 
                    <?php if (isset($toggle) && $toggle=='user') { echo 'toggle'; } ?>">


                    <form action="register.php" method="POST">

                        <div class="input-wrapper-split"> <!-- Name -->

                            <div class="input-container">
                                <div>First name *</div>
                                <!-- First name input -->
                                <input class="bread-txt full-w" type="text" name="r_firstname" value="<?php 
                                if(isset($_SESSION['r_firstname'])) {
                                    echo $_SESSION['r_firstname'];
                                } ?>" required>
                                
                                <?php if(in_array("Your first name must be between 2 and 25 characters", $error_array)) 
                                 echo "Your first name must be between 2 and 25 characters"; ?>
                            </div>
                            
                            <div class="input-container ">
                                <div>Last name *</div>
                                <!-- Last name input -->
                                <input class="bread-txt full-w" type="text" name="r_lastname" value="<?php 
                                if(isset($_SESSION['r_lastname'])) {
                                    echo $_SESSION['r_lastname'];
                                } 
                                ?>" required>
                                <?php if(in_array("Your last name must be between 2 and 25 characters", $error_array)) 
                                 echo "Your last name must be between 2 and 25 characters"; ?>
                            </div>

                        </div>

                        <div class="input-wrapper-full full-w"> <!-- Email -->

                            <div class="input-container full-w">
                                <div>Email *</div>
                                <!-- Email input -->
                                <input class="bread-txt full-w" type="email" name="r_email" value="<?php 
                                if(isset($_SESSION['r_email'])) {
                                    echo $_SESSION['r_email'];
                                } 
                                ?>" required>
                                    <?php if(in_array("Email already in use", $error_array)) echo "Email already in use"; 
                                    else if(in_array("Invalid email format", $error_array)) echo "Invalid email format"; ?>
                            </div>

                        </div>

                        <div class="input-wrapper-split"> <!-- Password -->

                            <div class="input-container ">
                                <div>Password *</div>
                                <!-- Password input -->
                                <input class="bread-txt full-w" type="password" name="r_password" required>
                                        <?php if(in_array("Your passwords do not match", $error_array)) echo "Your passwords do not match"; 
                                        else if(in_array("Your password can only contain english characters or numbers", 
                                            $error_array)) echo "Your password can only contain english characters or numbers";
                                        else if(in_array("Your password must be betwen 5 and 30 characters", $error_array)) 
                                            echo "Your password must be betwen 5 and 30 characters"; ?>
                            </div>
                            
                            <div class="input-container ">
                                <div>Password confirmation *</div>
                                <!-- Password confirmation -->
                                <input class="bread-txt full-w" type="password" name="r_password_check" required>
                                        <?php if(in_array("Your passwords do not match", $error_array)) echo "Your passwords do not match"; 
                                        else if(in_array("Your password can only contain english characters or numbers", 
                                            $error_array)) echo "Your password can only contain english characters or numbers";
                                        else if(in_array("Your password must be betwen 5 and 30 characters", $error_array)) 
                                            echo "Your password must be betwen 5 and 30 characters"; ?>
                            </div>

                        </div>

                        <div class="input-wrapper-split"> <!-- Phone-number & submit -->

                            <div class="input-container ">
                                <div>Phone-number *</div>
                                <!-- Phone-number input -->
                                <input class="bread-txt full-w" type="tel" name="r_phone_number" required>
                            </div>

                            <div class="input-container">
                                <!-- Submit -->
                                <input class="center-txt bread-txt" type="submit" name="register_button" value="Register">
                                <?php if(in_array("<span>You're all set! Go ahead and login!</span>", $error_array)) 
                                echo "<span>You're all set! Go ahead and login!</span>"; ?>
                            </div>

                        </div>

                    </form>
                </div>
            </div>

            <!-- Lawyer register -->
            <div class="med-marg-bot card fade-right-3s">
                <div id="lawyer" class="register-tab full-w white-txt">
                    <div class="register-title center-marg container">
                        <h2>Lawyer</h2>
                        <i class="fas fa-play"></i>
                    </div>
                </div>
            
                <div id="lawyer-register" class="register-form full-w bread-txt faded-black-txt 
                    <?php if (isset($toggle) && $toggle=='lawyer') { echo 'toggle'; } ?>">
                    <form action="register.php" method="POST" enctype="multipart/form-data">

                        <div class="input-wrapper-split"> <!-- Name -->

                            <div class="input-container ">
                                <div>First name *</div>
                                <!-- First name input -->
                                <input class="bread-txt full-w" type="text" name="r_firstname" value="<?php 
                                if(isset($_SESSION['r_firstname'])) {
                                    echo $_SESSION['r_firstname'];
                                } 
                                ?>" required>
                                
                                <?php if(in_array("Your first name must be between 2 and 25 characters", $error_array)) 
                                echo "Your first name must be between 2 and 25 characters"; ?>
                            </div>
                            
                            <div class="input-container ">
                                <div>Last name *</div>
                                <!-- Last name input -->
                                <input class="bread-txt full-w" type="text" name="r_lastname" value="<?php 
                                if(isset($_SESSION['r_lastname'])) {
                                    echo $_SESSION['r_lastname'];
                                } 
                                ?>" required>
                                
                                <?php if(in_array("Your last name must be between 2 and 25 characters", $error_array)) 
                                echo "Your last name must be between 2 and 25 characters"; ?>
                            </div>

                        </div>

                        <div class="input-wrapper-full full-w"> <!-- Email -->

                            <div class="input-container full-w">
                                <div>Email *</div>
                                <!-- Email input -->
                                <input class="bread-txt full-w" type="email" name="r_email" value="<?php 
                                if(isset($_SESSION['r_email'])) {
                                    echo $_SESSION['r_email'];
                                } 
                                ?>" required>
                                
                                <?php if(in_array("Email already in use", $error_array)) echo "Email already in use"; 
                                else if(in_array("Invalid email format", $error_array)) echo "Invalid email format"; ?>
                            </div>

                        </div>

                        <div class="input-wrapper-split"> <!-- Password -->

                            <div class="input-container ">
                                <div>Password *</div>
                                <!-- Password input -->
                                <input class="bread-txt full-w" type="password" name="r_password" required>
                                <?php if(in_array("Your passwords do not match", $error_array)) echo "Your passwords do not match"; 
                                else if(in_array("Your password can only contain english characters or numbers", 
                                    $error_array)) echo "Your password can only contain english characters or numbers";
                                else if(in_array("Your password must be betwen 5 and 30 characters", $error_array)) 
                                    echo "Your password must be betwen 5 and 30 characters"; ?>
                            </div>
                            
                            <div class="input-container ">
                                <div>Password confirmation *</div>
                                <!-- Password confirmation -->
                                <input class="bread-txt full-w" type="password" name="r_password_check" required>
                                <?php if(in_array("Your passwords do not match", $error_array)) echo "Your passwords do not match"; 
                                else if(in_array("Your password can only contain english characters or numbers", 
                                    $error_array)) echo "Your password can only contain english characters or numbers";
                                else if(in_array("Your password must be betwen 5 and 30 characters", $error_array)) 
                                    echo "Your password must be betwen 5 and 30 characters"; ?>
                            </div>

                        </div>

                        <div class="input-wrapper-split"> <!-- Username & Phone-number -->

                            <div class="input-container ">
                                <div>Username *</div>
                                <!-- Username input -->
                                <input class="bread-txt full-w" type="text" name="r_username" value="<?php 
                                if(isset($_SESSION['r_username'])) {
                                    echo $_SESSION['r_username'];
                                } 
                                ?>" required>

                                <?php if(in_array("This must be between 3 and 25 characters", $error_array)) 
                                echo "This must be between 3 and 25 characters";
                                elseif (in_array("The username is already taken.", $error_array)) 
                                    echo "The username is already taken.";?>
                            </div>

                            <div class="input-container ">
                                <div>Phone-number *</div>
                                <!-- Phone-number input -->
                                <input class="bread-txt full-w" type="tel" name="r_phone_number" value="<?php 
                                if(isset($_SESSION['r_phone_number'])) {
                                    echo $_SESSION['r_phone_number'];
                                } 
                                ?>" required>
                            </div>

                        </div>

                        <div class="input-wrapper-split"> <!-- COE & Firm -->

                            <div class="input-container ">
                                <div>City of employment *</div>
                                <!-- City of employment input -->
                                <input class="bread-txt full-w" type="text" name="r_city" value="<?php 
                                if(isset($_SESSION['r_city'])) {
                                    echo $_SESSION['r_city'];
                                } 
                                ?>">
                            </div>

                            <div class="input-container ">
                                <div>Firm</div>
                                <!-- Firm input -->
                                <input class="bread-txt full-w" type="text" name="r_firm" value="<?php 
                                if(isset($_SESSION['r_firm'])) {
                                    echo $_SESSION['r_firm'];
                                } 
                                ?>">
                            </div>

                        </div>

                        <div class="input-wrapper-split"> <!-- Identification -->

                            <div class="input-container ">
                                <div>Valid ID *</div>
                                <!-- Valid ID input -->
                                <input class="bread-txt" type="file" name="fileToUpload" required>

                                <?php if(in_array("Your file is not an image", $error_array)) echo "Your file is not an image"; 
                                else if(in_array("Your file is to big", $error_array)) echo "Your file is to big";
                                else if(in_array("Sorry, only JPG, JPEG, PNG & GIF files are allowed.", $error_array)) 
                                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                                ?>
                            </div>

                            <div class="input-container ">
                                <div>Valid lsp certification *</div>
                                <!-- Valid lsp certification input -->
                                <input class="bread-txt" type="file" name="fileToUpload2" required>

                                <?php if(in_array("Your file is not an image", $error_array)) echo "Your file is not an image"; 
                                else if(in_array("Your file is to big", $error_array)) echo "Your file is to big";
                                else if(in_array("Sorry, only JPG, JPEG, PNG & GIF files are allowed.", $error_array)) 
                                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                                ?>
                            </div>

                        </div>

                        <div class="input-wrapper-full full-w"> <!-- Main field -->

                            <div class="input-container full-w">
                                <div>Main field *</div>
                                <!-- Main field input -->
                                <select name="r_mainField" class="bread-txt full-w" required>
					                <option value="none">Choose one</option>
					                <option value="Contract Law">Contract Law</option>
					                <option value="Company Law">Company Law</option>
					                <option value="Banking and Financial Law">Banking and Financial Law</option>
					                <option value="Consumer Protection Law">Consumer Protection Law</option>
					                <option value="Intellectual Property Law">Intellectual Property Law</option>
					                <option value="Investement Law">Investement Law</option>
					                <option value="Land Law">Land Law</option>
					                <option value="Civil Law">Civil Law</option>
					                <option value="Criminal Law">Criminal Law</option>
					                <option value="Marriage and Divorce Law">Marriage and Divorce Law</option>
                                </select>

                            </div>

                        </div>

                        <div class="input-wrapper-full"> <!-- Sub fields -->

                            <div class="input-container full-w">
                                <div>Sub fields</div>
                                <!-- Sub fields input -->
                                <div class="full-w bread-txt tag-list">
                                    <div class="tag-item"><input type="checkbox" name="r_ContractLaw" value="Contract Law"><span>Contract Law</span></div>
                                    <div class="tag-item"><input type="checkbox" name="r_CompanyLaw" value="Company Law"><span>Company Law</span></div>
                                    <div class="tag-item"><input type="checkbox" name="r_BankingandFinancialLaw" value="Banking and Financial Law"><span>Banking and Financial Law</span></div>
                                    <div class="tag-item"><input type="checkbox" name="r_ConsumerProtectionLaw" value="Consumer Protection Law"><span>Consumer Protection Law</span></div>
                                    <div class="tag-item"><input type="checkbox" name="r_IntellectualPropertyLaw" value="Intellectual Property Law"><span>Intellectual Property Law</span></div>
                                    <div class="tag-item"><input type="checkbox" name="r_InvestementLaw" value="Investement Law"><span>Investement Law</span></div>
                                    <div class="tag-item"><input type="checkbox" name="r_LandLaw" value="Land Law"><span>Land Law</span></div>
                                    <div class="tag-item"><input type="checkbox" name="r_CivilLaw" value="Civil Law"><span>Civil Law</span></div>
                                    <div class="tag-item"><input type="checkbox" name="r_CriminalLaw" value="Criminal Law"><span>Criminal Law</span></div>
                                    <div class="tag-item"><input type="checkbox" name="r_MarriageAndDivorceLaw" value="Marriage and Divorce Law"><span>Marriage and Divorce Law</span></div>
                                </div>
                            </div>

                        </div>

                        <div class="input-wrapper-split"> <!-- Submit -->

                            <div></div>

                            <div class="input-container">
                                <!-- Submit -->
                                <input class="center-txt bread-txt" type="submit" name="registerlawyer_button" value="Register">
                                
                                <?php if(in_array("<span>You're all set! Go ahead and login!</span>", $error_array)) 
                                echo "<span>You're all set! Go ahead and login!</span>"; ?>
                            </div>
                            
                        </div>

                    </form>
                </div>
            </div>

            <!-- firm register -->
            <div class="med-marg-bot card fade-right-4s">
                <div id="firm" class="register-tab full-w white-txt">
                    <div class="register-title center-marg container">
                        <h2>Firm</h2>
                        <i class="fas fa-play"></i>
                    </div>
                </div>
            
                <div id="firm-register" class="register-form full-w bread-txt faded-black-txt 
                    <?php if (isset($toggle) && $toggle=='firm') { echo 'toggle'; } ?>">
                    <form action="register.php" method="POST" enctype="multipart/form-data">

                        <div class="input-wrapper-full full-w"> <!-- Email -->

                            <div class="input-container full-w">
                                <div>Firm name *</div>
                                <!-- Firm name input -->
                                <input class="bread-txt full-w" type="text" name="r_firmname" required>
                                
                            </div>

                        </div>

                        <div class="input-wrapper-full full-w"> <!-- Email -->

                            <div class="input-container full-w">
                                <div>Email *</div>
                                <!-- Email input -->
                                <input class="bread-txt full-w" type="email" name="r_email" required>
                                <?php if(in_array("Email already in use", $error_array)) echo "Email already in use"; 
                                else if(in_array("Invalid email format", $error_array)) echo "Invalid email format"; ?>
                            </div>

                        </div>

                        <div class="input-wrapper-split"> <!-- Password -->

                            <div class="input-container ">
                                <div>Password *</div>
                                <!-- Password input -->
                                <input class="bread-txt full-w" type="password" name="r_password" required>
                                <?php if(in_array("Your passwords do not match", $error_array)) echo "Your passwords do not match"; 
                                else if(in_array("Your password can only contain english characters or numbers", 
                                    $error_array)) echo "Your password can only contain english characters or numbers";
                                else if(in_array("Your password must be betwen 5 and 30 characters", $error_array)) 
                                        echo "Your password must be betwen 5 and 30 characters"; ?>
                            </div>
                            
                            <div class="input-container ">
                                <div>Password confirmation *</div>
                                <!-- Password confirmation -->
                                <input class="bread-txt full-w" type="password" name="r_password_check" required>
                                
                                <?php if(in_array("Your passwords do not match", $error_array)) echo "Your passwords do not match"; 
                                else if(in_array("Your password can only contain english characters or numbers", 
                                    $error_array)) echo "Your password can only contain english characters or numbers";
                                else if(in_array("Your password must be betwen 5 and 30 characters", $error_array)) 
                                        echo "Your password must be betwen 5 and 30 characters"; ?>
                            </div>

                        </div>

                        <div class="input-wrapper-split"> <!-- Identification -->

                            <div class="input-container ">
                                <div>Valid proof of existence *</div>
                                <!-- Valid proof of existance -->
                                <input class="bread-txt" type="file" name="fileToUpload" id="fileToUpload" required>
                                
                                <?php if(in_array("Your file is not an image", $error_array)) echo "Your file is not an image"; 
                                else if(in_array("Your file is to big", $error_array)) echo "Your file is to big";
                                else if(in_array("Sorry, only JPG, JPEG, PNG & GIF files are allowed.", $error_array)) 
                                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                                ?>
                            </div>

                            <div class="input-container ">
                                <div>Valid business certification *</div>
                                <!-- Valid business certification -->
                                <input class="bread-txt" type="file" name="fileToUpload2" id="fileToUpload2" required="">
                            
                                <?php if(in_array("Your file is not an image", $error_array)) echo "Your file is not an image"; 
                                else if(in_array("Your file is to big", $error_array)) echo "Your file is to big";
                                else if(in_array("Sorry, only JPG, JPEG, PNG & GIF files are allowed.", $error_array)) 
                                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                                ?>
                            </div>

                        </div>

                        <div class="input-wrapper-split"> <!-- Submit -->

                            <div></div>

                            <div class="input-container">
                                <!-- Submit -->
                                <input class="center-txt bread-txt" type="submit" name="registerfirm_button" value="Register">
                                <?php if(in_array("<span>You're all set! Go ahead and login!</span>", $error_array)) 
                                echo "<span>You're all set! Go ahead and login!</span>"; ?>
                            </div>
                            
                        </div>

                    </form>
                </div>
            </div>

        </div> <!-- End of register -->

    </main>

    <!-- FOOTER -->
    <?php include '../src/utils/template/components/footer.php';?>

</body>
</html>