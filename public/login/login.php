<?php
   ob_start();
   session_start();  
            $msg = '';
            // echo $_POST['login'];
            
            if (isset($_POST['login']) && !empty($_POST['username']) 
               && !empty($_POST['password'])) {
				
               if ($_POST['username'] == 'marcelo' && 
                  $_POST['password'] == '1234') {
                  $_SESSION['valid'] = true;
                  $_SESSION['timeout'] = time();
                  $_SESSION['username'] = 'marcelo';
                //   echo 'Logado';
                  header('Location: pagina.php'); // redireciona
                  exit();

               }else {
                  $msg = 'Usuário ou senha errada.';
               }
            }


         ?>