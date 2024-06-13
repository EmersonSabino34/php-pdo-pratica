<?php
    namespace App\Entity;

    use \App\Db\Database;
    use \PDO;
    class Vaga{
             /** @var auto_increments */
        public $id;
            /** @var varchar(40) */
        public $titulo;
            /** @var text */
        public $descricao;
            /** @var enum(s/n) */
        public $ativo;
            /** @var string */
        public $data;

        /** @return boolean Method Cadastrar */
        public function cadastrar(){
            // DEFINIR A DATA
            $this->data = date('Y-m-d H:i:s');

            //INSERIR A VAGA NO BANCO PASSANDO O NOME DA TABELA
            $obDatabase = new Database('vagas');
            $this->id = $obDatabase->insert([
                'titulo' => $this->titulo,
                'descricao' => $this->descricao,
                'ativo' => $this->ativo,
                'data' => $this->data
            ]);

            //echo "<pre>"; print_r($obDatabase); echo "</pre>"; exit;
            //ATRIBUIR O ID DA VAGA INSTANCIA

            //RETORNAR SUCESSO || ERRO
            return true;

        }
        public function atualizar(){
            return(new Database('vagas'))->update('id = '.$this->id,[
                                                                'titulo' => $this->titulo,
                                                                'descricao' => $this->descricao,
                                                                'ativo' => $this->ativo,
                                                                'data' => $this->data
                                                            ]);
        }

        public function excluir(){
            return(new Database('vagas'))->delete('id = ' .$this->id);
        }

        public static function getVagas($where = null, $order = null, $limit = null){
            return (new Database('vagas'))->select($where,$order,$limit)
                                          ->fetchAll(PDO::FETCH_CLASS,self::class);
        }
        public static function getVaga($id){
            return (new Database('vagas'))->select('id = '. $id)
                                          ->fetchObject(self::class);
        }
    }