<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Đăng ký / Đăng nhập</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" id="signup-tab" data-toggle="tab" href="#signup-form">Đăng
                                    ký</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="login-tab" data-toggle="tab" href="#login-form">Đăng nhập</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="signup-form">
                                <!-- Regis -->
                                <h5 class="card-title">Đăng ký</h5>
                                <form method="POST" action="">
                                    <div class="form-group">
                                        <label for="signup-username">Tên đăng nhập</label>
                                        <input type="text" class="form-control" name="username" id="signup-username">
                                    </div>
                                    <div class="form-group">
                                        <label for="signup-password">Mật khẩu</label>
                                        <input type="password" class="form-control" name="pass" id="signup-password">
                                    </div>
                                    <div class="form-group">
                                        <label for="signup-key">Key đăng ký</label>
                                        <input type="password" class="form-control" name="key" id="signup-key">
                                    </div>

                                    <?php if(isset($message_regis) && $message_regis!=''): ?>
                                    <div class="alert <?=$mess_alert?>"><?php echo $message_regis; ?></div>
                                    <?php endif; ?>
                                    
                                    
                                    <button name="regis-btn" type="submit" class="btn btn-primary">Đăng ký</button>
                                </form>

                            </div>
                            <!-- end: Regis -->
                            <div class="tab-pane fade" id="login-form">
                                <h5 class="card-title">Đăng nhập</h5>
                                <!-- Login -->
                                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
                                    <div class="form-group">
                                        <label for="login-username">Tên đăng nhập</label>
                                        <input type="text" name="user-name" class="form-control" id="login-username">
                                    </div>
                                    <div class="form-group">
                                        <label for="login-password">Mật khẩu</label>
                                        <input type="password" name="user-pass" class="form-control"
                                            id="login-password">
                                    </div>
                                    <?php if(isset($_POST['login-btn']) && $message_login !=''): ?>
                                    <div class="alert alert-danger"><?php echo $message_login; ?></div>
                                    <?php endif; ?>
                                    <button name="login-btn" type="submit"  class="btn btn-primary">Đăng nhập</button>

                                </form>
                            </div>
                            <!-- end: Login -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>