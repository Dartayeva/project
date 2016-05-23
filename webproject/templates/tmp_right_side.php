<aside id="right_side">
    <div id="cart_wrap">        
        <div id="cart_header">
            Вход | <a href="register.php" style="text-decoration: none; color: #FFF;">Регистрация</a>
        </div> 
        <div id="cart_body">
        
        </div>
    </div>
    <br/>
    <form action="index.php" method="post">
        <table width="160" cellpadding="3" cellspacing="3" border="0">
            <tr>
                <td><input type="email" name="email" class="text_input" style="width: 160;" maxlength="50" placeholder="Логин"/></td>
            <tr>
            <tr>
                <td><input type="password" name="password" class="text_input" style="width: 160;" maxlength="50" placeholder="Пароль"/></td>
            <tr>
            <tr>
                <td><input type="submit" name="submit" value="Войти"></td>
            <tr>
            <tr>
                <td><?php echo $msg_error; ?></td>
            </tr>
        </table>
    </form>                         
</aside>