# Projeto-Login-com-Banco-de-Dados

conexao.php

Esse arquivo guarda as informações de host, usuário, senha, banco de dados;
Em seguida, tenta se comunicar com o banco de dados com as informações disponibilizadas utilizando o new mysqli;
Caso for detectado algum tipo de erro (como uma senha incorreta), o programa é encerrado pelo comando die.

index.php

O include resgata as informações de conexao.php para não precisar reescrever o código;
O isset verifica se existe as variáveis de email e senha;
O strlen conta a quantidade de caracteres e é utilizado no código para saber se as informações de email e senhas estão vazias;
O real_escape_string limpa o texto que o usuário digitou e retira o valor lógico de caracteres dos campos email e senha com potencial de ser malicioso para proteger o programa;
Na variável $sql é feito comando da busca na tabela de usuários que atende ao email e senha respectivo;
O $mysqli->query($sql) executa o comando de verdade no banco de dados;
A variável $quantidade guarda o número de linhas de $listaUsuarios;
Se a $quantidade == 1, a as informações do usuário encontrado será transformado em um arrey pelo método fetch_assoc();
Em seguida, verifica-se se o usuário não está logado, para iniciar a sessão dele no programa pelo session_start();
O $_SESSION guarda as informações de id e nome para que as outras páginas saibam de quem se trata;
O header redireciona para a página painel.php;
Caso $quantidade seja diferente de 1, mostrará a mensagem de erro ao logar.

painel.php

o comando include('protect.php') adiciona as informações de segurança para checar se o usuário está logado, caso não, ele não deixa acessar a página;
O <?php echo $_SESSION['nome']?> resgata o nome do usuário armazenado em index.php;
O botão sair sai da pagina quando clicado e desloga do sistema;

protect.php

Verifica se o usuário está logado pelo isset;
verifica se o id não está guardado na mémoria para encerrar a sessão;

logout.php

Verifica se o usuário está logado;
finaliza a sessão pelo comando session_destroy();
redireciona para a página index.php pelo header.
