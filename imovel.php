<?php
    include_once("cabecalhoPrincipal.php");
    include_once("cabecalhoAluguel.php");
?>

    <!--Conteúdo da Página-->
    <div class="container-fluid">

        <!--Mostra os imóveis-->
        <div id="painel-listar">
            <div class="row justify-content-center">

                <div class="col-xl-12">

                    <div class="mt-3">
                        <a href="#" class="btn btn-primary btn-novo" data-toggle="tooltip" data-placement="top" title="Cadastrar imóvel">
                            <i class="fas fa-plus-square mr-1"></i>Novo
                        </a>

                        <a href="#" class="btn btn-info btn-disponiveis" data-toggle="tooltip" data-placement="right" title="Imóveis Disponiveis">
                            <i class="fas fa-home mr-1"></i>Imóveis Disponíveis
                        </a>
                    </div>

                    <div class="alert alert-success mt-3 collapse" id="alert-sucesso-excluir">
                        <strong>Sucesso!</strong> imóvel excluído com sucesso!
                        <button type="button" class="close" id="btn-alert-sucesso-excluir">&times;</button>
                    </div>
    
                    <div class="alert alert-danger mt-3 collapse" id="alert-erro-excluir">
                        <strong>Erro!</strong> erro ao excluir imóvel!
                        <button type="button" class="close" id="btn-alert-erro-excluir">&times;</button>
                    </div>

                    <div class="modal fade" id="modalExcluir" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <p class="font-weight-bold">Confirmação</p>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Deseja realmente excluir esse imovel?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary sim-excluir">
                                        <i class="far fa-check-circle mr-1"></i>Sim
                                    </button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Não">
                                        <i class="fas fa-times-circle mr-1"></i>Não
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3 mb-4">

                        <div class="card">

                            <div class="card-header">
                                <i class="fas fa-fw fa-table mr-1"></i>Lista de Imóveis
                            </div>

                            <div class="card-body">

                                <div class="row mb-2">

                                    <div class="col-6">

                                        <div class="form-inline">
                                            <form id="formulario-de-busca">
                                                <input type="text" id="field-search-name" class="form-control form-control-sm" placeholder="Pesquisar por proprietario">

                                                <button type="submit" class="btn btn-primary btn-sm">
                                                    <i class="fas fa-search mr-1"></i>Pesquisar
                                                </button>
                                            </form>
                                        </div>

                                    </div>

                                    <div class="col-6">
                                        <div class="float-right">
                                            <div class="form-inline">
                                                <label for="qtdRegistros" class="mr-2 mb-0">Exibir:</label>
                                                <select name="qtdRegistros" id="qtdRegistros" class="form-control">
                                                    <option value="5">5</option>
                                                    <option value="10" selected>10</option>
                                                    <option value="15">15</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="table-responsive-lg">
                                    <table class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <tr class="text-center">
                                                <th scope="col">Id</th>
                                                <th scope="col">Proprietário</th>
                                                <th scope="col">Endereço</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Selecionar</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center" id="lista-de-imoveis">                                
                                        </tbody>
                                        <tfoot>
                                            <tr class="text-center">
                                                <th scope="col">Id</th>
                                                <th scope="col">Proprietário</th>
                                                <th scope="col">Endereço</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Selecionar</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                
                                <div>
                                    <ul class="pagination float-right mt-2 paging-system">
                                        <!--Paginação-->
                                    </ul>
                                </div>

                            </div>

                        </div>
                    </div>
                    
                </div>
            
            </div>
        </div>

        <!--Painel de formulário de Cadastro de Imóvel-->
        <div id="painel-cadastrar">
            <div class="row justify-content-center">

                <div class="col-xl-12">

                    <div class="mt-3"> 

                        <a href="#" class="btn btn-danger btn-voltar">
                            <i class="fas fa-undo-alt mr-1 btn-voltar"></i>Voltar
                        </a>

                    </div>
                    
                    <div class="mt-3 mb-4">

                        <div class="card">

                            <div class="card-header">
                                <i class="fas fa-home mr-1"></i>Cadastro-Alteração de Imóvel
                            </div>

                            <div class="card-body">

                                <form id="formulario-de-cadastro">

                                    <div class="row justify-content-center mt-3">
                                                
                                        <div class="col-xl-9">

                                            <fieldset>
                                                <legend>Dados Gerais</legend>

                                                <input type="hidden" name="idImovel" value="0">

                                                <input type="hidden" name="disponivel" value="true">

                                                <div class="form-group">
                                                    <label for="proprietario" class="mb-0">Proprietario</label>
                                                    <select name="proprietario" id="proprietarios" class="form-control">
                                                        <option value="0">Selecione o proprietario...</option>
                                                    </select>
                                                </div>

                                                <div class="form-row">

                                                    <div class="col-xl-6">

                                                        <div class="form-group">
                                                            <label for="precoAluguel" class="mb-0">Preço do Aluguel</label>
                                                            <input type="number" min="0" step="0.01" class="form-control" id="precoAluguel" name="preco">
                                                        </div>

                                                    </div>

                                                    <div class="col-xl-6">
                                                        <div class="form-group">
                                                            <label for="tipo" class="mb-0">Tipo do Imóvel</label>
                                                            <input type="text" name="tipo" id="tipo" class="form-control">
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="form-group">
                                                    <label for="descricao" class="mb-0">Descrição do Imóvel</label>
                                                    <textarea name="descricao" id="descricao" class="form-control" cols="0" rows="4">
                                                    </textarea>
                                                </div>

                                            </fieldset>

                                        </div>

                                    </div>
                                            
                                    <div class="row justify-content-center mt-3">

                                        <div class="col-xl-9">

                                            <fieldset>
                                                <legend>Endereço</legend>
                                
                                                <div class="form-row">

                                                    <div class="form-group col-xl-4">
                                                        <label for="cep" class="mb-1">CEP</label>
                                                        <input type="text" name="cep" id="cep" class="form-control cep">
                                                    </div>
                                
                                                    <div class="form-group col-xl-2">
                                                        <label for="estado" class="mb-1">Estado</label>
                                                        <input type="text" name="estado" id="estado" class="form-control" max="2">
                                                    </div>
                                
                                                    <div class="form-group col-xl-6">
                                                        <label for="cidade" class="mb-1">Cidade</label>
                                                        <input type="text" name="cidade" id="cidade" class="form-control">
                                                    </div>
                                                        
                                                </div>
                                
                                                <div class="form-row">
                                                            
                                                    <div class="form-group col-xl-3">
                                                        <label for="bairro" class="mb-1">Bairro</label>
                                                        <input type="text" name="bairro" id="bairro" class="form-control">
                                                    </div>
                                
                                                    <div class="form-group col-xl-7">
                                                        <label for="logradouro" class="mb-1">Logradouro</label>
                                                        <input type="text" name="logradouro" id="logradouro" class="form-control">
                                                    </div>
                                
                                                    <div class="form-group col-xl-2">
                                                        <label for="numero" class="mb-1">Número</label>
                                                        <input type="text" name="numeroEnd" id="numeroEnd" class="form-control">
                                                    </div>
                                
                                                </div>
                                
                                                <div class="form-group">
                                                    <label for="complemento" class="mb-1">Complemento</label>
                                                    <input type="text" name="complemento" id="complemento" class="form-control">
                                                </div>

                                                <div class="mt-2 float-right">
                                                                            
                                                    <button type="submit" class="btn btn-success">
                                                        <i class="far fa-save mr-1"></i>Salvar
                                                    </button>

                                                </div>

                                            </fieldset>

                                        </div>

                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>

                    <div class="alert alert-success mt-3 collapse" id="alert-sucesso">
                        <strong>Sucesso!</strong> imóvel salvo/atualizado com sucesso!
                        <button type="button" class="close" id="btn-alert-sucesso">&times;</button>
                    </div>

                    <div class="alert alert-danger mt-3 collapse" id="alert-erro">
                        <strong>Erro!</strong> erro ao salvar/atualizar imóvel!
                        <button type="button" class="close" id="btn-alert-erro">&times;</button>
                    </div>

                    <div class="alert alert-warning mt-3 collapse" id="alert-aviso">
                        <strong>Aviso!</strong> Campos vazios, por favor, preencha os campos obrigatórios!
                        <button type="button" class="close" id="btn-alert-aviso">&times;</button>
                    </div>

                </div>

            </div>
        </div>

        <!--Painel com as informações do imóvel-->
        <div id="painel-exibir">
            <div class="row justify-content-center">

                <div class="col-xl-12">

                    <div class="mt-3"> 

                        <a href="#" class="btn btn-danger btn-voltar">
                            <i class="fas fa-undo-alt mr-1 btn-voltar"></i>Voltar
                        </a>

                    </div>

                    <div class="mt-3 mb-4">

                        <div class="card">

                            <div class="card-header">
                                <i class="fas fa-fw fa-table mr-1"></i> Visualizar Dados
                            </div>

                            <div class="card-body">

                                <div class="card">

                                    <div class="card-header">
                                        <h5 class="card-title">Dados Gerais</h5>
                                    </div>

                                    <div class="card-body">

                                        <div id="exibir-dados">

                                            <h6 class="">Status</h6>
                                            <span class="alert p-1" id="disponivel">-</span>

                                            <h6 class="mb-0 mt-2">Tipo</h6>
                                            <span id="tipo">-</span>

                                            <h6 class="mb-0 mt-2">Preço do Aluguel</h6>
                                            <span id="preco">-</span>

                                            <h6 class="mb-0 mt-2">Descrição do Imóvel</h6>
                                            <span id="descricao">-</span>

                                            <h6 class="mb-0 mt-2">Proprietário</h6>
                                            <span id="proprietario">-</span>

                                            <h6 class="mb-0 mt-2">Endereço</h6>
                                            <span id="endereco">-</span>
                                                
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </div>

        <!--Painel com os imoveis disponiveis-->
        <div id="painel-disponiveis">
            <div class="row justify-content-center">

                <div class="col-xl-12">

                    <div class="mt-3"> 

                        <a href="#" class="btn btn-danger btn-voltar">
                            <i class="fas fa-undo-alt mr-1 btn-voltar"></i>Voltar
                        </a>

                    </div>
                    
                    <div class="mt-3 mb-4">
                    
                        <div class="card">

                            <div class="card-header">
                                <i class="fas fa-fw fa-table mr-1"></i>Imóveis Disponíveis
                            </div>

                            <div class="card-body">

                                <div class="row mb-2">

                                    <div class="col-6">

                                        <div class="form-inline">
                                            <form class="form-inline" id="buscar-por-preco">
                                                <input type="number" id="field-value" min="0" step="0.01" class="form-control form-control-sm mr-1" placeholder="valor do imóvel">
                                                <button type="submit" class="btn btn-info btn-sm">
                                                <i class="fas fa-search mr-1"></i>Pesquisar
                                                </button>
                                            </form>
                                        </div>

                                    </div>

                                    <div class="col-6">
                                        <div class="float-right">
                                            <div class="form-inline">
                                                <label for="qtdRegistros" class="mr-2 mb-0">Exibir:</label>
                                                <select name="qtdRegistros" id="qtdRegistros2" class="form-control">
                                                    <option value="3">3</option>
                                                    <option value="6" selected>6</option>
                                                    <option value="9">9</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="alert alert-danger mt-3 text-center" id="alerta-sem-imoveis-disponiveis">
                                    <i class="fas fa-frown mr-1"></i>Nenhum imóvel encontrado
                                </div>

                                <div class="alert alert-info mt-3 text-center" id="alerta-imoveis-disponiveis">
                                    <h6><i class="fas fa-smile-wink mr-1"></i><span id="numero-de-imoveis-disponiveis">0</span> imóvel encontrado</h6>
                                </div>

                                <div class="row" id="container-imoveis-disponiveis">
                                    <!--Card com os imoveis disponiveis-->
                                </div>

                                <div>
                                    <ul class="pagination float-right mt-2 paging-system2">
                                        <!--Paginação-->
                                    </ul>
                                </div>

                            </div>

                        </div>

                    </div>


                </div>

            </div>
        </div>
    
    </div>
    <!--Até aqui-->
    
    <?php
        include_once("scripts.php");
    ?>

    <script src="js/repository/PessoaRepository.js"></script>
    <script src="js/repository/ProprietarioRepository.js"></script>
    <script src="js/repository/ImovelRepository.js"></script>
    <script src="js/controller/ImovelController.js"></script>
    <script src="js/indexImovel.js"></script>
</body>
</html>