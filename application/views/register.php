<div class="body">
	<h1>Fill out form:</h1>
	<div id="registration-wrapper"> 
		
			<form name="registerform" id="registerform" autocomplete="off" method="post">
				<table id="registertable">
					<tr>
						<td>Username: </td>
						<td><input type="text" name="player" placeholder="username"><div class="register" style="display:{username_visibility}">{username_message}</div></td>
					</tr>
					<tr>
						<td>Password: </td>
						<td><input type="text" name="password" maxlength="10" placeholder="password (max 10 characters)"><div class="register" style="display:{password_visibility}">{password_message}</div></td>
					</tr>
					<tr>
						<td><div class="register" style="display:{reg_visibility}">{register_success}</div></td>
						<td><input type="submit" value="Register"></td>
					</tr>
				</table>
			</form> 
		
	</div>        
</div>