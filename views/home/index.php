<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <?php if ( isset($data['result']) ) { 
            if( $data['result']['code']==0 ) {
                echo "<div class='alert alert-success text-center mt-3'>Đăng nhập thành công</div>";
            } else if ( $data['result']['code']>0 ) {
                $mess = $data['result']['message'];
                echo "<div class='alert alert-danger text-center mt-3'><p>Xảy ra lỗi khi đăng nhập: $mess</p></div>";
            }} else if (isset($data['response'])) {
                $mess = $data['response'];
                echo "<div class='alert alert-warning text-center mt-3'><p>$mess</p></div>";
            }?>
            <h3 class="text-center text-secondary mt-5 mb-3">User Login</h3>
            <form id="login-form" method="post" action="?controller=home&action=login" class="border rounded w-100 mb-5 mx-auto px-3 pt-3 bg-light" novalidate>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input name="email" value="" id="email" type="text" class="form-control" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input name="pass" value="" id="password" type="password" class="form-control" placeholder="Password">
                </div>
                <div id="error-message" class='d-none alert alert-danger'>Error</div>
                <div class="form-group d-flex flex-row-reverse">
                    <button type="submit" class="btn btn-success px-5">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
let login_form = document.getElementById("login-form");
login_form.addEventListener('submit', e=> {
    let email = document.querySelector('#email');
    let pass = document.querySelector('#pass');

    if ( email.value==='' ) {
        $("#error-message").removeClass("d-none");
        $("#error-message").html("Hãy nhập email");
        e.preventDefault();
        email.focus();
    } else if ( !validateEmail(email.value) ) {
        $("#error-message").removeClass("d-none");
        $("#error-message").html("Hãy nhập email đúng cú pháp");
        e.preventDefault();
        email.focus();
    } else if ( pass.value==='' ) {
        $("#error-message").removeClass("d-none");
        $("#error-message").html("Hãy nhập mật khẩu");
        e.preventDefault();
        pass.focus();
    }
})
</script>