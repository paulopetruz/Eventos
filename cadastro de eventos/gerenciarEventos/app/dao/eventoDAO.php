<?php
/*
    Criação da classe evento com o CRUD
*/
include_once "../model/evento.php";

class eventoDAO{
    
    public function create(Evento $evento) {
        try {
            $nome = $evento->getNome();
            $data = $evento->getData();
            $hora = $evento->getHora();
            $capacidade = $evento->getCapacidade();
            $vendedor = $evento->getfkVendedor();
            $sql = "INSERT INTO dadoseventos (nameEvento,dataEvento,quantIngresso,horaEvento,fkVendedor)
                        VALUES ('".$nome."','".$data."',".$capacidade.",'".$hora."','".$vendedor."')";

            $p_sql = Conexao::getConexao()->prepare($sql);

            return $p_sql->execute();
        } catch (Exception $e) {
            print "Erro ao Inserir evento <br>" . $e . '<br>';
        }
    }

    public function read() {
        try {
            $sql = "SELECT * FROM dadoseventos
                    ";
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

    public function filtro($id) {
        try {
            $sql = "SELECT * FROM dadoseventos
            where IdEvento = ". $id;

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
     
    public function update(Evento $evento) {
        try {

            $id = $evento->getIdEvento();
            $nome = $evento->getNome();
            $data = $evento->getData();
            $capacidade = $evento->getCapacidade();
            $hora = $evento->getHora();
            $vendedor = $evento->getfkVendedor();

            $sql = "UPDATE dadoseventos set
                
                  nameEvento='".$nome."',
                  dataEvento='".$data."',
                  quantIngresso =".$capacidade.", 
                  horaEvento = '".$hora."',
                  fkVendedor = '".$vendedor."'                
                                                                       
                  WHERE idEvento = ".$id;
            $p_sql = Conexao::getConexao()->prepare($sql);
            

            
            return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar fazer Update<br> $e <br>";
        }
    }

    public function delete(Evento $evento) {
        try {
            $id = $evento->getIdEvento();


            $sql = "DELETE FROM dadoseventos WHERE idEvento = ".$id;
            $p_sql = Conexao::getConexao()->prepare($sql);
            
            
 
            return $p_sql->execute();
        } catch (Exception $e) {
            echo "Erro ao Excluir evento<br> $e <br>";
        }
    }


    private function listaEvento($row) {
        $evento = new Evento();
        $evento->setIdEvento($row['idEvento']);
        $evento->setNome($row['nameEvento']);
        $evento->setData($row['dataEvento']);
        $evento->setCapacidade($row['quantIngresso']);
        $evento->setHora($row['horaEvento']);
        $evento->setfkVendedor($row['fkVendedor']);

        return $evento;
    }
 }

 ?>