<div class="container">
    <h1>Login</h1>
    <form class="form-horizontal" role="form" action="doLogin.php" method="POST">
        <div class="form-group">
            <label for="inputUsername" class="col-md-2 control-label">Username</label>
            <div class="col-md-10">
                <input type="username" class="form-control" id="inputEmail1" name="username" placeholder="Username" value="<?php echo $data->kayttaja; ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword" class="col-md-2 control-label">Salasana</label>
            <div class="col-md-10">
                <input type="password" class="form-control" id="inputPassword1" name="password" placeholder="Password">
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-offset-2 col-md-10">
                <div class="checkbox">
                    <label>
                        <input type="checkbox"> Remember login
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-offset-2 col-md-10">
                <button type="submit" class="btn btn-default">Login</button>
                <button type="submit" class="btn btn-default">Cancel</button>
            </div>
        </div>
    </form>
</div>
