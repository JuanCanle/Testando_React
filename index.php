<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: Arial;
            background-color: ghostwhite;
        }
    
        .tab {
            overflow: hidden;
            border: 1px solid #ccc;
            background-color: #f1f1f1;
        }
        
        .tab button {
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
            font-size: 17px;
        }
        
        .tab button:hover {
            background-color: #ddd;
        }
        
        .tab button.active {
            background-color: #ccc;
        }
        
        .tabcontent {
            display: none;
            padding: 6px 12px;
        }

        #divesq, #divdir {
            float: left;
            width: 50%;
            height: 200px;
        }
    </style>
    </head>
    <body>
    
        <h2>Preenchimento do currículo</h2>
        <div class="tab">
                    <button class="tablinks" onclick="curriculo(event, 'Dados Pessoais')">Dados Pessoais</button>
                    <button class="tablinks" onclick="curriculo(event, 'formacaoescolar_experienciaprofissional')">Formação Escolar / Experiência Profissional</button>
                    <button class="tablinks" onclick="curriculo(event, 'ativadadesextracurriculares_idiomas')">Atividades Extracurriculares / Idiomas</button>
        </div>  
        <div>
            <form action="valida.php" method="POST" enctype="multipart/form-data">

                <div id="Dados Pessoais" class="tabcontent">  
                    <div id="divesq">
                        <h2>Dados</h2>
                        <label>Nome Completo:</label><br><input type="text" id="nome" name="nome"><br><br>
                        <label>Nacionalidade: </label><br><input type="text" id="nacionalidade" name="nacionalidade"><br><br>
                        <label>Data de Nascimento: </label><br><input type="date" id="datadenascimento" name="data_nasc"><br><br>
                        <label>Estado Civil: </label><br><br>
                            <select id="estadocivil" name="estado_civil" >
                                <option value="Solteiro(a)">Solteiro(a)</option>
                                <option value="União Estável">União Estável</option>
                                <option value="Noivo(a)">Noivo(a)</option>
                                <option value="Casado(a)">Casado(a)</option>
                                <option value="Divorciado(a)">Divorciado(a)</option>
                                <option value="Viúvo(a)">Viúvo(a)</option>
                            </select><br><br>
                        <label>Telefone: </label><br><input type="tel" id="telefone" name="tel" placeholder="(xx) xxxxx-xxxx"><br><br>
                        <label>E-Mail: </label><br><input type="email" id="email" name="email"><br><br>
                        <label>Objetivo: </label><br><input type="text" id="objetivo" name="objetivo"><br><br>
                    </div>
                    <div id="divdir">
                        <h2>Endereço</h2>
                        <label>Rua:</label><br><input type="text" id="rua" name="rua"><br><br>
                        <label>Número:</label><br><input type="text" id="numero" name="numero"><br><br>
                        <label>Complemento:</label><br><input type="text" id="complemento" name="complemento"><br><br>
                        <label>Bairro:</label><br><input type="text" id="bairro" name="bairro"><br><br>
                        <label>Município:</label><br><input type="text" id="municipio" name="municipio"><br><br>
                        <label>Estado:</label><br><br>
                            <select id="estado" name="estado">
                                <option value="Acre">Acre</option>
                                <option value="Alagoas">Alagoas</option>
                                <option value="Amapá">Amapá</option>
                                <option value="Amazona">Amazona</option>
                                <option value="Bahia">Bahia</option>
                                <option value="Ceará">Ceará</option>
                                <option value="Espírito Santo">Espírito Santo</option>
                                <option value="Goiás">Goiás</option>
                                <option value="Maranhão">Maranhão</option>
                                <option value="Mato Grosso">Mato Grosso</option>
                                <option value="Mato Grosso do Sul">Mato Grosso do Sul</option>
                                <option value="Minas Gerais">Minas Gerais</option>
                                <option value="Pará">Pará</option>
                                <option value="Paraíba">Paraíba</option>
                                <option value="Paraná">Paraná</option>
                                <option value="Pernambuco">Pernambuco</option>
                                <option value="Piauí">Piauí</option>
                                <option value="Rio de Janeiro">Rio de Janeiro</option>
                                <option value="Rio Grande do Norte">Rio Grande do Norte</option>
                                <option value="Rio Grande do Sul">Rio Grande do Sul</option>
                                <option value="Rondônia">Rondônia</option>
                                <option value="Roraima">Roraima</option>
                                <option value="Santa Catarina">Santa Catarina</option>
                                <option value="São Paulo">São Paulo</option>
                                <option value="Sergipe">Sergipe</option>
                                <option value="Tocantins">Tocantins</option>
                            </select><br><br>
                        <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo 1024 * 1024 * 1024; ?>" />
                        <input type="file" id="arquivo" name="arq"/>
                    </div>
                </div>

                <div id="formacaoescolar_experienciaprofissional" class="tabcontent">
                        <div id="divesq">
                            <h2>Formação Escolar</h2>
                            <label>Tipo de escolaridade: </label><br>
                            <select id="escolaridade" name="escolaridade">
                                <option value="Ensino Fundamental">Ensino Fundamental</option>
                                <option value="Ensino Médio">Ensino Médio</option>
                                <option value="Ensino Superior">Ensino Superior</option>
                                <option value="Mestrado">Mestrado</option>
                                <option value="Doutorado">Doutorado</option>
                                <option value="Pós-Doutorado">Pós-Doutorado</option>
                            </select><br><br>
                            <label>Curso: </label><br><input type="text" id="cursoformacao" name="curso"><br><br>
                            <label>Instituição de Ensino: </label><br><input type="text" id="instituicaodeensino" name="instituicao_ensino"><br><br>
                            <label>Ano de conclusão: </label><br><input type="text" id="anodeconclusao" name="ano_conclusao"><br><br>
                        </div>
                        <div id="divdir">
                            <h2>Experiência Profissional</h2>
                            <label>Período de Entrada: </label><br><input type="text" id="periododeentrada" name="periodo_entrada" placeholder="Exemplo: 2016"><br><br>
                            <label>Período de Saída: </label><br><input type="text" id="periododesaida" name="periodo_saida" placeholder="Exemplo: 2019"><br><br>
                            <label>Cargo: </label><br><input type="text" id="cargo" name="cargo"><br><br>
                            <label>Setor: </label><br><input type="text" id="setor" name="setor"><br><br>
                            <label>Ativadade Exercida: </label><br><input type="text" id="ativadeexercida" name="atividade_exercida"><br><br>
                        </div>
                </div>

                <div id="ativadadesextracurriculares_idiomas" class="tabcontent">
                    <div id="divesq">
                        <h2>Atividades Extracurriculares</h2>
                        <label>Atividade: </label><br><input type="text" id="atividade" name="atividade"><br><br>
                        <label>Instituição: </label><br><input type="text" id="instituicaoatividade" name="instituicao_atividade"><br><br>
                    </div>
                    <div id="divdir">
                        <h2>Idiomas</h2>
                        <label>Curso: </label><br><br>
                        <select id="cursoidioma" name="idioma">
                            <option value="Inglês">Inglês</option>
                            <option value="Italiano">Italiano</option>
                            <option value="Espanhol">Espanhol</option>
                            <option value="Francês">Francês</option>
                            <option value="Alemão">Alemão</option>
                            <option value="Japonês">Japonês</option>
                            <option value="Coreano">Coreano</option>
                            <option value="Russo">Russo</option>
                        </select><br><br>
                        <label>Nível: </label><br><input type="text" id="nivel" name="nivel"><br><br>
                        <label>Instituição: </label><br><input type="text" id="instituicaoidioma" name="instituicao_idioma"><br><br>
                        <input type="submit" value="Enviar"/>9
                        <input type="reset" value="Apagar"/>
                    </div> 
                </div>
            </form>
        </div>
        <script>
            function curriculo(evt, curriculo) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(curriculo).style.display = "block";
                evt.currentTarget.className += " active";
            }
        </script>
    </body>
</html>