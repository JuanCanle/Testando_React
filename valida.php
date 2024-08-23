<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
          text-align: center;
        }
        #imagem{
          border: black;
          border-radius: 30px;
          float: right;
          margin-right: 41%;
          width: 320px;
          height: 205px;
        }
        .titulo{
          font-size: 200%;
          margin: 5px;
          font-weight: bold;
        }
        .texto{
          margin: 2px;
        }
    </style>
  </head>
<body>

  <?php
  //dados pessoais
    $nome=$_POST['nome'];
    $nacionalidade=$_POST['nacionalidade'];
    $data_nasc=$_POST['data_nasc'];
    $estado_civil=$_POST['estado_civil'];
    $rua=$_POST['rua'];
    $numero=$_POST['numero'];
    $complemento=$_POST['complemento'];
    $bairro=$_POST['bairro'];
    $municipio=$_POST['municipio'];
    $estado=$_POST['estado'];
    $tel=$_POST['tel'];
    $email=$_POST['email'];
    $objetivo=$_POST['objetivo'];
    
  //escolaridade e experiencia profissional
    $escolaridade=$_POST['escolaridade'];
    $curso=$_POST['curso'];
    $instituicao_ensino=$_POST['instituicao_ensino'];
    $ano_conclusao=$_POST['ano_conclusao'];
    $periodo_entrada=$_POST['periodo_entrada'];
    $periodo_saida=$_POST['periodo_saida'];
    $cargo=$_POST['cargo'];
    $setor=$_POST['setor'];
    $atividade_exercida=$_POST['atividade_exercida'];

  //idiomas
    $atividade=$_POST['atividade'];
    $instituicao_atividade=$_POST['instituicao_atividade'];
    $idioma=$_POST['idioma'];
    $nivel=$_POST['nivel'];
    $instituicao_idioma=$_POST['instituicao_idioma'];

    function calcular_idade($x)
    {
      $x = new DateTime($x);
      $dataAtual= new DateTime();
      $idade = $dataAtual->diff($x);//diferenca entre as datas atual e a fornecida
      return $idade->y;//retorna apenas os anos
    }

    function Separacao_email($email,$Parte)
    {
    $partes_email=explode("@", $email);//split
    if($Parte==0)//dividir em 2 partes
      {
      return implode("@", array_slice($partes_email, $Parte, 1));
      }
    if($Parte==1)
      {
      return "@".implode("@", array_slice($partes_email, $Parte, 1));
      }
    }

    $idade=calcular_idade($data_nasc);
    $emailAntes=Separacao_email($email, 0);
    $emailDepois=Separacao_email($email, 1);
    //problema aqui
    $pasta_destino = "Trabalho_WEB";
    $arquivo_destino = $emailAntes;
    $arquivo_temp= $_FILES['arq']['tmp_name'];

    $dados_pessoais=array
    (
      "nome"=> $nome,
      "nacionalidade"=> $nacionalidade,
      "nascimento"=> $data_nasc,
      "idade"=> $idade,
      "estado_civil"=> $estado_civil,
      "rua"=> $rua,
      "numero"=>$numero,
      "complemento"=> $complemento,
      "bairro"=> $bairro,
      "municipio"=> $municipio,
      "estado"=> $estado,
      "tel"=> $tel,
      "email"=> $email,
      "1parte_email"=>$emailAntes,
      "objetivo"=> $objetivo
    );
    $escolaridade_profissional=array
    (
      "escolaridade"=> $escolaridade,
      "curso"=> $curso,
      "instituicao_ensino"=> $instituicao_ensino,
      "ano_conclusao"=> $ano_conclusao,
      "periodo_entrada"=> $periodo_entrada,
      "periodo_saida"=> $periodo_saida,
      "cargo"=>$cargo,
      "setor"=> $setor,
      "atividade_exercida"=> $atividade_exercida
    );
    $idiomas=array
    (
      "atividade"=> $atividade,
      "instituicao_atividade"=> $instituicao_atividade,
      "idioma"=> $idioma,
      "nivel"=> $nivel,
      "instituicao_idioma"=> $instituicao_idioma
    );
    $count=-1;
    $count2=0;
    $count3=0;
    //dados pessoais
      foreach($dados_pessoais as $x)
      {
        if(!isset($x)||empty($x))
        {
          $count++;
        }
      }
      //escolaridade
        foreach($escolaridade_profissional as $x)
      {
        if(!isset($x)||empty($x))
        {
          $count2++;
        }
      }
      //idiomas
      foreach($idiomas as $x)
      {
        if(!isset($x)||empty($x))
        {
          $count3++;
        }
      }
      if(($count2>=1||$count>=1||$count3>=1) && !(move_uploaded_file($arquivo_temp, $arquivo_destino)))
        {
          echo 
            "<form action='index.php' style='text-align: center;margin-top:20%'>
            <h2>Ops,você esqueceu de preencher ou anexar algo!</h2>
            <input type='submit' value='Voltar' style='background-color:#13747d; width: 4%; height: 4%'/>
            </form>";
        }
      else
      {
          if($count2>=1||$count>=1||$count3>=1)
          {
            echo 
              "<form action='index.php' style='text-align: center;margin-top:20%'>
              <h2>Ops,Você esqueceu de preencher alguma coisa!</h2>
              <input type='submit' value='Voltar' style='background-color:#13747d; width: 4%; height: 4%'/>
              </form>";
          }
          //comecei o echo pra escrever o html e colocar as informacoes
          //exemplos de como vc pode fazer
        
          if(move_uploaded_file($arquivo_temp, $arquivo_destino))
          {
            echo
              "<p class='titulo'>$dados_pessoais[nome]</p>
              <img id = 'imagem' src=\"". $arquivo_destino ."\">";
                echo
                  "<br><br><br><br><br><br><br><br><br><br><br><br><p class  = 'texto'>$dados_pessoais[nacionalidade], $dados_pessoais[estado_civil], $dados_pessoais[idade]</p>
                  <p class  = 'texto'>Rua $dados_pessoais[rua], $dados_pessoais[numero], $dados_pessoais[complemento], $dados_pessoais[bairro], $dados_pessoais[municipio], $dados_pessoais[estado]</p>";
                echo
                  "<p class  = 'texto'>Telefone: $dados_pessoais[tel]</p>";
                echo
                  "<p class  = 'texto'>Email: <a href='mailto:$dados_pessoais[email]'>$dados_pessoais[email]</a> </p>";
                  
            echo
              "<p class='titulo'>Objetivo</p><br>
              <p class  = 'texto'>$dados_pessoais[objetivo]</p>";

            echo
              "<p class='titulo'>Formação</p><br>
              <p class  = 'texto'>$escolaridade_profissional[escolaridade] em $escolaridade_profissional[curso] no(a) $escolaridade_profissional[instituicao_ensino], conclusão em $escolaridade_profissional[ano_conclusao]</p>";

            echo
              "<p class='titulo'>Experiência Profissional</p><br>
              <p class  = 'texto'>$escolaridade_profissional[periodo_entrada]-$escolaridade_profissional[periodo_saida] $escolaridade_profissional[cargo], $escolaridade_profissional[setor], $escolaridade_profissional[atividade_exercida]</p>";

            echo
              "<p class='titulo'>Atividades Extracurriculares</p><br>
              <p class  = 'texto'>$idiomas[atividade] - $idiomas[instituicao_atividade]</p>";

            echo
              "<p class='titulo'>Idiomas</p><br>
              <p class  = 'texto'>$idiomas[idioma] - $idiomas[nivel] - $idiomas[instituicao_idioma]</p>";
          }
          else
          {
            echo 
              "<form action='index.php' style='text-align: center;margin-top:20%'>
              <h2>Ops,Você esqueceu de anexar um arquivo!</h2>
              <input type='submit' value='Voltar' style='background-color:#13747d; width: 4%; height: 4%'/>
              </form>";
          }
      }
  ?>
  </body>
</html>
