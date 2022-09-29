<?php
include_once "../model/ingresso.php";

class ingressoDAO{
    
    public function create(Ingresso $ingresso) {
        try {
            $idVendedor = $ingresso->getIdVendedor();
            $pg = $ingresso->getPg();
            $Fk_evento = $ingresso->getFk_evento();
            $nameComprador = $ingresso->getNameComprador();
            $telComprador = $ingresso->gettelComprador();
            $sql = "INSERT INTO dadosingresso (vendedor_id, pg, Fk_evento, nomeComprador, telComprador)
                        VALUES ('.$idVendedor.','.$pg.','.$Fk_evento.','$nameComprador','$telComprador')
                        ";

            $p_sql = Conexao::getConexao()->prepare($sql);

            return $p_sql->execute();
            
        } catch (Exception $e) {
            print "Erro ao Inserir ingresso <br>" . $e . '<br>';
        }
    }

    public function read() {
        try {

            $sql = "SELECT a.*, b.nomeVendedor FROM dadosingresso a
                    inner join vendedores b on b.id = a.vendedor_id
                    ";

            $result = Conexao::getConexao()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            foreach ($lista as $l) {
                $f_lista[] = $this->listaIngresso($l);
            }
            return $f_lista;

        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar Buscar Todos." . $e;
        }
    }

    public function filtro($id) {
        try {

            if ($id > 0){
            $sql = "SELECT a.*, b.nomeVendedor FROM dadosingresso a
                    inner join vendedores b on b.id = a.vendedor_id
                    where a.Fk_evento = ". $id;

            }else{
                $sql = "SELECT a.*, b.nomeVendedor FROM dadosingresso a
                    inner join vendedores b on b.id = a.vendedor_id";
            }

            $result = Conexao::getConexao()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            foreach ($lista as $l) {
                $f_lista[] = $this->listaIngresso($l);
            }
            return $f_lista;

        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar Buscar Todos." . $e;
        }
    }
     
    public function update(Ingresso $ingresso) {
        try {

            $id = $ingresso->getId();
            $codVendedor = $ingresso->getIdVendedor();
            $pg = $ingresso->getPg();


            $sql = "UPDATE dadosingresso set
                
                  vendedor_id=".$codVendedor.",
                  pg='".$pg."'
                          
                  WHERE idIngresso = ".$id;
            $p_sql = Conexao::getConexao()->prepare($sql);
           
            return $p_sql->execute();

        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar fazer Update<br> $e <br>";
        }
    }

    public function delete(Ingresso $ingresso) {
        try {
            $id = $ingresso->getId();


            $sql = "DELETE FROM dadosingresso WHERE idIngresso = ".$id;
            $p_sql = Conexao::getConexao()->prepare($sql);
            return $p_sql->execute();
        } catch (Exception $e) {
            echo "Erro ao Excluir evento<br> $e <br>";
        }
    }


    private function listaIngresso($row) {
        $ingresso = new Ingresso();
        $ingresso->setId($row['idIngresso']);
        $ingresso->setNameVendedor($row['nomeVendedor']);
        $ingresso->setIdVendedor($row['vendedor_id']);
        $ingresso->setPg($row['pg']);
        $ingresso->setnameComprador($row['nomeComprador']);
        $ingresso->settelComprador($row['telComprador']);
        $ingresso->setFk_evento($row['Fk_evento']);
        return $ingresso;
    }
 }

 ?>