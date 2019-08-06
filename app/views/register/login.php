
<?php $this->start('body'); ?>
<div class="col-md-8 mx-auto pt-lg-5">
    <div class="jumbotron text-center p-5">

        <h1 class="h3-responsive font-weight-bold">Eagle Payout System Portal</h1>
        <br>
        <?=\Core\Helper::dnd($this->displayErrors) ?>
        <div class=" mx-auto pt-lg-5">
            <form class="text-center border border-light p-5" action="<?=PROOT?>register/login" method="post">

                <p class="h4 mb-4">Login</p>
                <!-- Email -->
                <input type="text" name="username" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="SP Number">

                <!-- Password -->
                <input type="password" name="password" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Password">

                <small>How long do you want to be active.</small>
                <select id="Active" class="form-control mb-4">
                    <option value="0"></option>
                    <option value="1">1 Week</option>
                    <option value="2">2 Weeks</option>
                    <option value="3">3 Weeks</option>
                    <option value="4">4 Weeks</option>
                    <option value="5">5 Weeks</option>
                    <option value="6">6 Weeks</option>
                    <option value="7">7 Weeks</option>
                    <option value="8">8 Weeks</option>
                </select>
                <div class="d-flex justify-content-around">
                    <div>
                        <!--                         Remember me -->
                        <!--                        <div class="custom-control custom-checkbox">-->
                        <!--                            <input type="checkbox" class="custom-control-input" id="defaultLoginFormRemember">-->
                        <!--                            <label class="custom-control-label" for="defaultLoginFormRemember">Remember me</label>-->
                        <!--                        </div>-->
                        <!--                    </div>-->
                        <!--                    <div>-->
                        <!--                         Forgot password -->
                        <!--                        <a href="">Forgot password?</a>-->
                    </div>
                </div>

                <!-- Sign in button -->
                <button class="btn btn-outline-primary btn-block my-4" type="submit">Login</button>

                <!-- Register -->
                <p>Not a member?
                    <a href="<?=PROOT?>register/register">Register</a>
                </p>
                <p>Forgot password?
                    <a href="<?=PROOT?>register/forgot">Reset</a>
                </p>

            </form>
        </div>
        <!-- Default form login -->
        <hr>
        <a class="fa-1x fa fa-home" href="https://eaglepayoutsystem.co.za/"> Home </a>
    </div>
</div>
<!-- Default form login -->

<?php $this->end(); ?>