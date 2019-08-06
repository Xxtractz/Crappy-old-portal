
<?php $this->start('body'); ?>

<div class="col-md-8 mx-auto pt-lg-5">
    <div class="jumbotron text-center p-5">

        <h1 class="h3-responsive font-weight-bold">Eagle Payout System Portal</h1>
        <br>
        <div id="error_hide" ><?php $this->displayErrors
            ?></div>

        <!-- Default form register -->
        <form onfocus="hide_errs()" class="text-center border border-light p-5" action="<?=PROOT?>register/register" method="post">
            <p class="h4 mb-4">Sign up</p>

            <div class="form-row mb-4">
                <div class="col">
                    <!-- First name -->
                    <input onclick="hide_errs()" type="text" name="fname" class="form-control" placeholder="First name" required>
                </div>
                <div class="col">
                    <!-- Last name -->
                    <input type="text" name="lname" class="form-control" placeholder="Last name" required>
                </div>
            </div>

            <!--            ID-->
            <input id="id_input" type="text" oninput="id_Valid()"  name="idNo" class="form-control mb-4" placeholder="Identification Number" required>
            <small class="form-text text-muted mb-3 text-danger" id="err_id"></small>

            <!-- E-mail -->
            <input type="email" name="email" class="form-control mb-2" placeholder="E-mail" required>
            <small id="defaultRegisterFormPhoneHelpBlock" class="form-text text-muted mb-3 ">
                All communication are done via email.
            </small>

            <input type="tel" name="mobile" class="form-control mb-4" placeholder="Phone number" >

            <div class="form-row mb-4">
                <div class="col">
                    <!-- Last name -->
                    <select name="entity" class="form-control mb-2">
                        <option value="Company">Company</option>
                        <option value="Sponsor">Sponsor</option>
                    </select>
                    <small>Register under</small>
                </div>
                <div class="col">
                    <input type="text" name="reference" class="form-control mb-2" placeholder="Sponsor" >
                    <small>Enter Sponsor Number (Referral)</small>
                </div>
            </div>

            <hr>
            <p class="form-text text-muted mb-4"> Bank Details</p>
            <div class="form-row mb-4">
                <div class="col">
                    <!-- First name -->
                    <input type="text" name="Accholder" class="form-control" placeholder="Account Holder" required>
                </div>
                <div class="col">
                    <!-- Last name -->
                    <input type="number" name="accNo" class="form-control" placeholder="Account Number" required>
                </div>
            </div>
            <div class="form-row mb-4">
                <div class="col">
                    <!-- First name -->
                    <input type="text" name="bankName" class="form-control" placeholder="Bank" required>
                </div>
                <div class="col">
                    <!-- Last name -->
                    <input type="text" name="accType" class="form-control" placeholder="Type of Account" required>
                </div>
            </div>
            <div class="form-row mb-4">
                <div class="col">
                    <!-- First name -->
                    <input type="text" name="branchcode"  class="form-control" placeholder="Branch Code" required>
                </div>
            </div>

            <hr>
            <!-- Password -->
            <input type="password" id="id_pw" name="passwrd" oninput="pw_Valid()" class="form-control mb-3" placeholder="Password" aria-describedby="defaultRegisterFormPasswordHelpBlock" required>
            <small class="form-text text-muted mb-3 text-danger" id="err_pw"></small>
            <!-- Password -->
            <input type="password" id="id_cf" name="confirm" oninput="cf_Valid()" class="form-control" placeholder="confirm Password" aria-describedby="defaultRegisterFormPasswordHelpBlock" required>
            <small class="form-text text-muted mb-3 text-danger" id="err_cf"></small>
            <!-- Sign up button -->
            <button id="submit" class="btn btn-outline-primary my-4 btn-block" type="submit" name="submit">Register</button>

            <hr>
            <small class="form-text text-muted mb-3 text-danger" id="err_form"></small>

            <!-- Terms of service -->
            <p>By clicking
                <em>Register</em> you agree to our
                <a href="" target="_blank">terms of service</a>
        </form>
        <!-- Default form register -->
        <hr>
        <a class="fa-1x fa fa-home" href="https://eaglepayoutsystem.co.za/"> Home </a>
    </div>

</div>
<?php $this->end(); ?>

<?php $this->start("source")?>
<script src="<?=PROOT?>js/formValidation.js"></script>
<?php $this->end();?>
