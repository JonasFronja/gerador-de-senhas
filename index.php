<html>
  <head>
    <title>Gerador de Senha</title>
    <?php include_once 'acoes.php';?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="style.scss"/>
  </head>
  <body>
    <section id="titulo">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
            <h2>Gerador de Senha</h2>            
          </div>
        </div>
      </div>
    </section>
    <section id="conteudo">
      	<div class="container">
				<div class="row">
					<div class="col-md-6">
            <div class="acoes cliente">
              <h5>Cliente</h5>
              <div class="botoes">
                <form method="post"> 
                  <input type="hidden" name="numero" value="<?php echo($numero);?>" />
                  <input type="hidden" name="senhasNormal" value="<?php echo($senhaNormal);?>" />
                  <input type="hidden" name="senhasPreferencial" value="<?php echo($senhaPreferencial);?>" />
                  <button class="btn btn-primary" type="submit" name="normal">Senha Normal: N<?php echo($numero+1);?></button>
                  <p>Sua senha será N<?php echo($numero+1);?></p>
                </form>
                <form method="post"> 
                  <input type="hidden" name="numero" value="<?php echo($numero);?>" />
                  <input type="hidden" name="senhasPreferencial" value="<?php echo($senhaPreferencial);?>" />
                  <input type="hidden" name="senhasNormal" value="<?php echo($senhaNormal);?>" />
                  <button class="btn btn-primary" type="submit" name="preferencial">Senha Preferencial</button>
                  <p>Sua senha será P<?php echo($numero+1);?></p>
                </form>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="acoes gerente">
              <h5>Gerente</h5>
              <div class="botoes">
                <form method="post"> 
                  <input type="hidden" name="numero" value="<?php echo($numero);?>" />
                  <input type="hidden" name="senhasPreferencial" value="<?php echo($senhaPreferencial);?>" />
                    <input type="hidden" name="senhasNormal" value="<?php echo($senhaNormal);?>" />
                  <?php if($senhas): ?>
                    <button class="btn btn-primary" type="submit" name="chamar">Chamar Senha</button>
                    <p>Próxima senha será <?php echo($senhas[0]);?></p>
                  <?php else: ?>
                   <button class="btn btn-primary" type="submit" name="chamar" disabled="true">Chamar Senha</button>
                   <p>Não existe senhas a ser chamadas.</p>
                  <?php endif ?>
                </form>
                <form method="post"> 
                  <button class="btn btn-primary" type="submit" name="resetar">Resetar Senhas</button>
                </form>
              </div>
            </div>
          </div>
    </section>
    <section id="chamadas">
      <div class="container">
				<div class="row">
					<div class="col-md-12">
            <p><strong>Última Senha Chamada: </strong><b><?php echo($senhaChamada);?></b></p>
          </div>
          <div class="col-md-12">
            <p><strong>Próximas Senhas: </strong></p>
            <ul>
              <div class="row">
                <?php if($senhas): ?>
                  <?php foreach ($senhas as $k => $value): ?>
                    <div class="col-md-3">
                      <li><?php echo(($k+1).'° - '.$value);?></li>
                    </div>
                  <?php endforeach ?>
                <?php else: ?>
                  <p>Não existe senhas a ser chamadas.</p>
                <?php endif ?>
              </div>
            </ul>
          </div>
        </div>
      </div>
    </section>
  </body>
</html>