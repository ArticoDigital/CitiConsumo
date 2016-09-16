Para restablecer la contraseña haga click : <a href="{{ $link = url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}"> aquí </a>
