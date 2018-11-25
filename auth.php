<?php
        if (!isset($_SESSION['user'])) {
                if (isset($_POST['user']) && isset($_POST['pass'])) {
                        if (verify_login($_POST['user'], $_POST['pass'])) {
                                $_SESSION['user'] = $_POST['user'];
                                Die(Header('Location: ?'));
                        }
                }

                echo '<html>
                        <head><title>Přihlášení do editace</title></head><body><center><h3>Přihlášení</h3><form method="POST"><table>
                        <tr>
                                <td align="right">Uživatelské jméno: </td>
                                <td><input type="text" name="user" /></td>
                        </tr>
                        <tr>
                                <td align="right">Heslo: </td>
                                <td><input type="password" name="pass" /></td>
                        </tr>
                        <tr align="center">
                                <td colspan="2"><input type="submit" value="Přihlásit se" /></td>
                        </tr>
                        </table></form><center></body></html>';
                exit;
        }

	$logged_in = array_key_exists('logged_in', $_SESSION) ? $_SESSION['logged_in'] : false;
	if (!$logged_in) {
		if (array_key_exists('user', $_POST)) {
			verify_login();
		}
		exit;
	}

	base64_decode($logged_in);
?>
