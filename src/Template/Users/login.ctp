<div class = "container">
    <div class="wrapper">
        <div class="row">
            <div class="content">
                <h1>Login</h1>
                    <?= $this->Form->create() ?>
                    <?= $this->Form->control('email') ?>
                    <?= $this->Form->control('password') ?>
                    <?= $this->Form->button('Login') ?>
                    <?= $this->Form->end() ?>
                </div>
        </div>
    </div>
</div>

<!--<div class = "container">
        <div class="wrapper">
                <form action="" method="post" name="Login_Form" class="form-signin">       
                    <h3 class="form-signin-heading">Welcome Back! Please Sign In</h3>
                          <hr class="colorgraph"><br>
                          
                          <input type="text" class="form-control" name="Username" placeholder="Username" required="" autofocus="" />
                          <input type="password" class="form-control" name="Password" placeholder="Password" required=""/>     		  
                         
                          <button class="btn btn-lg btn-primary btn-block"  name="Submit" value="Login" type="Submit">Login</button>  			
                </form>			
        </div>
</div>-->