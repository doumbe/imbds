<? Php 
  Requiert 'PHPMailer / PHPMailerAutoload.php' ; 

  $Mail = nouveau PHPMailer; 

  $Mail -> isSMTP ();  // Définir le client à utiliser SMTP 
  $Mail ->Host = 'smtp.gmail.com' ;  // Spécifier les serveurs SMTP principaux et de sauvegarde 
  $Mail ->SMTPAuth = true ;  // Activer l'authentification SMTP 
  $Mail ->Username = 'radar1992radar@gmail.com' ;  // Nom d'utilisateur SMTP 
  $Mail ->Password = 'RADAR1992RADAR1992' ;  // Mot de passe SMTP 
  $Mail->SMTPSecure = 'ssl' ;  // Activer le cryptage TLS, `ssl` a également accepté 
  $Mail->Port = 587 ;  // port TCP à se connecter à 

  $Mail -> setFrom ( 'radar1992radar@gmail.com' , 'CodexWorld' ); 
  $Mail -> addReplyTo ( 'radar1992radar@gmail.com' , 'CodexWorld' ); 
  //$Mail -> addAddress ( 'john@gmail.com' );  // Ajouter un destinataire 
  //$Mail -> addCC ( 'cc@example.com' ); 
  //$Mail -> addBCC ( 'bcc@example.com' ); 

  $Mail -> isHTML(vrai);  // Définir le format d'e-mail en HTML 

  $BodyContent = '<h1> Comment envoyer un email en utilisant PHP dans Localhost par CodexWorld </ h1>' ; 
  $BodyContent . = '<P> C\'est l\'email HTML envoyé depuis localhost en utilisant le script PHP par <b> CodexWorld </ b> </ p>' ; 

  $Mail ->Subject = 'Email de Localhost by CodexWorld' ; 
  $Mail ->Body = $bodyContent ; 

  If (! $Mail -> send ()) { 
  Echo 'Le message n\'a pas pu être envoyé.'  ; 
  Echo 'Erreur Mailer:' .  $Mail -> ErrorInfo ; 
  } autre { 
  Echo 'Message a été envoyé' ; 
  } 
  ?> 