const boton1 = document.getElementById("buton1");
const boton2 = document.getElementById("buton2");
const boton3 = document.getElementById("buton3");


 //1 é para não iniciado, 2 é para em processo e 3 é em finalizado

function andamento1() {
    document.getElementById("table4").innerHTML = "<h3>Sul- Centro</h3><hr><h3>Norte-Sul</h3><hr><h3>Cascata</h3><hr><h3>Bombarde</h3><hr><h3>Escola SESI</h3>";
    document.getElementById("table5").innerHTML = "<h3>Marcado para 15/05/25 a troca do motor</h3><hr><h3>Marcado para 19/06/25 troca das rodas</h3><hr><h3>Marcado para 14/06/25 revisão do trem</h3><hr><h3>Marcado para 20/10/25 troca dos bancos</h3><hr><h3>Marcado para 20/12/25 aposentadoria do trem</h3>";
}

function andamento2() {
    document.getElementById("table4").innerHTML = "<h3>Sul- Centro</h3><hr><h3>Norte-Sul</h3><hr><h3>Cascata</h3><hr><h3>Bombarde</h3><hr><h3>Escola SESI</h3>";
    document.getElementById("table5").innerHTML = "<h3>Trocando as rodas</h3><hr><h3>Retirando roedor do motor</h3><hr><h3>Restaurando a Pintura</h3><hr><h3>Arrumando a lataria</h3><hr><h3>Troca do sistema elétrico em andamento</h3>";
}

function andamento3() {
    document.getElementById("table4").innerHTML = "<h3>Sul- Centro</h3><hr><h3>Norte-Sul</h3><hr><h3>Cascata</h3><hr><h3>Bombarde</h3><hr><h3>Escola SESI</h3>";
    document.getElementById("table5").innerHTML = "<h3>Troca do motor feita dia 25/03</h3><hr><h3>Troca dos Bancos efetuada dia 24/02</h3><hr><h3>Retirada da ratazana feita dia 12/01</h3><hr><h3>Troca do parabriza efetuada dia 14/02</h3><hr><h3>Descarte efetuado dia 19/05</h3>";

}

boton3.addEventListener("click", andamento3);
boton2.addEventListener("click", andamento2);
boton1.addEventListener("click", andamento1);


<fieldset>
                <div id="bodydiv">

                    <button id="BotaoNaoResolvidos" onclick="BotaoNaoResolvidos()" class="cellHead">Não Resolvidos</button>
                    <button id="BotaoResolvidos" onclick="BotaoResolvidos()" class="cellHead">Resolvidos</button>

                    <div id="RegistrosNaoResolvidos">

                        <h4>Registros médicos não resolvidos:</h4>

                        <?php

                        $stmt = $conn->prepare("SELECT * FROM registro_medico WHERE funcionario_medic = $_SESSION[IDFuncionarioEscolhido] AND resolvido_medic='Não'");
                        $stmt->execute();

                        $resultado = $stmt->get_result();

                        $ProblemasMedicos = $resultado->fetch_all(MYSQLI_ASSOC);

                        if (!empty($ProblemasMedicos)) {

                            echo '<form method="POST">

                        <table>

                        <thead>

                            <tr>

                                <th class="cellHead">ID</th>

                                <th class="cellHead">Problema descrito</th>

                                <th class="cellHead">Data de envio</th>

                                <th class="cellHead">Tipo de problema</th>

                                <th class="cellHead">Resolvido</th>

                            </tr>

                        </thead>

                        <tbody>';

                            foreach ($ProblemasMedicos as $linhaMedico) {

                                $ValorBotao = $linhaMedico['id_medic'];

                                echo '<tr>

                                <td class="cell"> ' . $linhaMedico["id_medic"] . ' </td>

                                <td class="cell"> ' . $linhaMedico["problema_medic"] . ' </td>

                                <td class="cell"> ' . $linhaMedico["data_medic"] . ' </td>

                                <td class="cell"> ' . $linhaMedico["tipo_medic"] . ' </td>

                                <td class="cell"> ' . $linhaMedico["resolvido_medic"] . ' </td>

                            ';

                                echo "<td><input class='cellHeadConcluir' type='submit' value='Marcar como resolvido' name='Botao$ValorBotao'></td>

                            </tr>";

                                /*
                            
                                echo "<td><input class='cellHead' type='submit' value='Acessar Perfil' name='Funcionario$ValorFuncionario'></td>

                            </tr>";

                            */
                            }

                            echo "</tbody>

                        </table>
                    
                        </form>";
                        } else {

                            echo "<h5>Nenhum registro médico foi feito por este usuário</h5>";
                        }



                        ?>

                    </div>

                    <div id="RegistrosResolvidos">

                        <h4>Registros médicos resolvidos:</h4>

                        <?php

                        $stmt = $conn->prepare("SELECT * FROM registro_medico WHERE funcionario_medic = $_SESSION[IDFuncionarioEscolhido] AND resolvido_medic='Sim'");
                        $stmt->execute();

                        $resultado = $stmt->get_result();

                        $ProblemasMedicos = $resultado->fetch_all(MYSQLI_ASSOC);

                        if (!empty($ProblemasMedicos)) {

                            echo '

                        <table>

                        <thead>

                            <tr>

                                <th class="cellHead">ID</th>

                                <th class="cellHead">Problema descrito</th>

                                <th class="cellHead">Data de envio</th>

                                <th class="cellHead">Tipo de problema</th>

                                <th class="cellHead">Resolvido</th>

                            </tr>

                        </thead>

                        <tbody>';

                            foreach ($ProblemasMedicos as $linhaMedico) {

                                $ValorBotao = $linhaMedico['id_medic'];

                                echo '<tr>

                                <td class="cell"> ' . $linhaMedico["id_medic"] . ' </td>

                                <td class="cell"> ' . $linhaMedico["problema_medic"] . ' </td>

                                <td class="cell"> ' . $linhaMedico["data_medic"] . ' </td>

                                <td class="cell"> ' . $linhaMedico["tipo_medic"] . ' </td>

                                <td class="cell"> ' . $linhaMedico["resolvido_medic"] . ' </td>

                            </tr>';
                            }

                            echo "</tbody>

                        </table>";
                        } else {

                            echo "<h5>Nenhum registro médico foi feito por este usuário</h5>";
                        }



                        ?>

                    </div>




                </div>
            </fieldset>

