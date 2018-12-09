    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Dados</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                   <form action="user.php" method="post" enctype="multipart/form-data">

                        <?php
                            $dados = ListarDadosUsuario($_SESSION['cd']);
                            while ($dado = $dados->fetch_array()){
                            ?>
                    <div class="modal-body">
        					<span class="label-input100">Editar foto</span>
        					<br>
                        <div class="custom-file">
                            <!-- Passando e-mail para o Post, para mudar o nome da foto -->
                            <input type="hidden" name="email" value="<?php echo $dado['DS_EMAIL'];?>">
                            <input type="file" name="img_usuario" class="custom-file-input" id="customFileLang" lang="pt-br">
                            <label class="custom-file-label" id="foto_nova" for="customFileLang">Selecione o arquivo...</label>
                        
                        
                        <br><br>
                            
                            <div class="wrap-input100 validate-input m-b-23">
        						<span class="label-input100">Editar Nome do Usuário</span>
        						<input class="input100" name="nome" type="text" value="<?php echo $dado['NM_USUARIO']?>">
        						<span class="focus-input100" data-symbol="&#9776;"></span>
        				    </div>
                            
                        <br>
                        
                            <div class="wrap-input100 validate-input m-b-23">
        						<span class="label-input100">Editar Data de Nascimento</span>
        						<input class="input100" name="data" type="date" value="<?php echo $dado['DT_NASCIMENTO']?>">
        						<span class="focus-input100" data-symbol="&#9776;"></span>
        				    </div>
                                
                    </div>
                    <br>
                    <br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Fechar</button>
                        <input type="submit" class="btn btn-dark" value="salvar" />
                        
                    </div>
                        <?php
                            };
                        ?>
                    </div>
                    
                    
     
                </form>
            </div>
        </div>
    </div>