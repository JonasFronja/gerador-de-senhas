<?php

$senhaNormal = $senhaPreferencial = $senhaChamada = '';
$numero = 0;
$senhasNormal = $senhasPreferencial = $senhas  = [];

if(array_key_exists('normal', $_POST)) { 
  $numero = $_POST['numero'] + 1;
  $novaSenha = gerarSenha('N',$numero);
  $senhaNormal = $_POST['senhasNormal'].$novaSenha.';';
  $senhaPreferencial = $_POST['senhasPreferencial'];
  $senhasNormal =  retornarLista($senhaNormal);
  $senhasPreferencial =  retornarLista($senhaPreferencial);

  $senhas = array_merge($senhasPreferencial, $senhasNormal);
} 
if(array_key_exists('preferencial', $_POST)) { 
  $numero = $_POST['numero'] + 1;
  $novaSenha = gerarSenha('P',$numero);
  $senhaNormal = $_POST['senhasNormal'];
  $senhaPreferencial = $_POST['senhasPreferencial'].$novaSenha.';';
  $senhasPreferencial =  retornarLista($senhaPreferencial);
  $senhasNormal =  retornarLista($senhaNormal);

  $senhas = array_merge($senhasPreferencial, $senhasNormal);
} 
if(array_key_exists('resetar', $_POST)) { 
  $numero = 0;
} 
if(array_key_exists('chamar', $_POST)) { 
  $numero = $_POST['numero'];
  $senha = $_POST['senhasPreferencial'].$_POST['senhasNormal'];
  $senhas = retornarLista($senha);
  if(senhas){
    $senhaChamar = $senhas[0];
    if($senhaChamar[0] == 'P'){
      $senhaPreferencial = explode($senhaChamar.';',$_POST['senhasPreferencial'], 2)[1];
      $senhaNormal = $_POST['senhasNormal'];
    }
    if($senhaChamar[0] == 'N'){
      $senhaNormal = explode($senhaChamar.';',$_POST['senhasNormal'], 2)[1];
      $senhaPreferencial = $_POST['senhasPreferencial'];
    }
    $senhasPreferencial =  retornarLista($senhaPreferencial);
    $senhasNormal =  retornarLista($senhaNormal);
    $senhas = array_merge($senhasPreferencial, $senhasNormal);
    $senhaChamada = $senhaChamar;
  }
} 
function gerarSenha($tipo,$numero){
  return $tipo.$numero;
}

function retornarLista($texto){
  $lista = [];
  foreach(explode(";", $texto) as $value){
    if($value)
      array_push($lista,$value);
  }
  return $lista;
}

?>