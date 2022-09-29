<?php
/*
    Criação da classe evento com o CRUD
*/
class usuarioDAO{
    
    public function create(Usuario $usuario) {
        try {
            $nome = $usuario->getNome();
            $login = $usuario->getLogin();
            $idade = $usuario->getidade();
            $senha = $usuario->getSenha();
            $sql = "INSERT INTO dadosusuarios (nameUsuario,loginUsuario,idadeUsuario,senhaUsuario)
                        VALUES ('".$nome."','".$login."',".$idade.",'".$senha."')";

            $p_sql = Conexao::getConexao()->prepare($sql);

           return $p_sql->execute();
        } catch (Exception $e) {
            print "Erro ao Inserir evento <br>" . $e . '<br>';
        }
    }

    public function read() {
        try {
            $sql = "SELECT * FROM dadosusuarios";
            $result = Conexao::getConexao()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            foreach ($lista as $l) {
                $f_lista[] = $this->listaEvento($l);
            }
            return $f_lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar Buscar Todos." . $e;
        }
    }
     
    public function update(Usuario $usuario) {
        try {

            $id = $usuario->getId();
            $nome = $usuario->getNome();
            $login = $usuario->getLogin();
            $idade = $usuario->getIdade();
            $senha = $usuario->getSenha();

            
            $sql = "UPDATE dadoseventos set
                
                  nameUsuario='".$nome."',
                  loginUsuario='".$login."',
                  idadeUsuario =".$idade.", 
                  senhaUsuario = '".$senha."'                
                                                                       
                  WHERE idEvento = ".$id;
            $p_sql = Conexao::getConexao()->prepare($sql);
           
            return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar fazer Update<br> $e <br>";
        }
    }

    public function delete(Usuario $usuario) {
        try {
            $id = $usuario->getId();


            $sql = "DELETE FROM dadosusuarios WHERE idUsuario = ".$id;
            $p_sql = Conexao::getConexao()->prepare($sql);
            return $p_sql->execute();
        } catch (Exception $e) {
            echo "Erro ao Excluir evento<br> $e <br>";
        }
    }


    private function listaEvento($row) {
        $usuario = new Usuario();
        $usuario->setId($row['idUsuario']);
        $usuario->setNome($row['nameUsuario']);
        $usuario->setlogin($row['dataUsuario']);
        $usuario->setIdade($row['horaUsuario']);
        $usuario->setSenha($row['quantIngresso']);

        return $usuario;
    }
 }

 ?>