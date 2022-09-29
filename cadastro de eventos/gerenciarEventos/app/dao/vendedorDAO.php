<?php
/*
    Criação da classe evento com o CRUD
*/
class vendedorDAO{
    
    public function create(Vendedor $vendedor) {
        try {
            $nome = $vendedor->getNome();
            $telefone = $vendedor->getTelefone();
            $email = $vendedor->getEmail();
            $sql = "INSERT INTO vendedores (nomeVendedor,telefoneVendedor,emailVendedor)
                        VALUES ('".$nome."','".$telefone."','".$email."')";

            $p_sql = Conexao::getConexao()->prepare($sql);

            
           return $p_sql->execute();
        } catch (Exception $e) {
            print "Erro ao Inserir evento <br>" . $e . '<br>';
        }
    }

    public function read() {
        try {
            $sql = "SELECT * FROM vendedores";
            $result = Conexao::getConexao()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            foreach ($lista as $l) {
                $f_lista[] = $this->listaVendedores($l);
            }
            return $f_lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar Buscar Todos." . $e;
        }
    }
     
    public function update(Vendedor $vendedor) {
        try {

            $id = $vendedor->getIdVendedor();
            $nome = $vendedor->getNome();
            $telefone = $vendedor->getTelefone();
            $email = $vendedor->getEmail();

            
            $sql = "UPDATE vendedores set
                
                  nomeVendedor='".$nome."',
                  telefoneVendedor=".$telefone.",
                  emailVendedor ='".$email."'                
                                                                       
                  WHERE id = ".$id;
            $p_sql = Conexao::getConexao()->prepare($sql);
            
            return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar fazer Update<br> $e <br>";
        }
    }

    public function delete(Vendedor $vendedor) {
        try {
            $id = $vendedor->getIdVendedor();


            $sql = "DELETE FROM vendedores WHERE id = ".$id;
            $p_sql = Conexao::getConexao()->prepare($sql);
            return $p_sql->execute();
        } catch (Exception $e) {
            echo "Erro ao Excluir evento<br> $e <br>";
        }
    }


    private function listaVendedores($row) {
        $vendedor= new Vendedor();
        $vendedor->setId($row['id']);
        $vendedor->setNome($row['nomeVendedor']);
        $vendedor->setTelefone($row['telefoneVendedor']);
        $vendedor->setEmail($row['emailVendedor']);
        
        return $vendedor;
    }
 }

 ?>