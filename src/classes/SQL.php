<?
namespace classes;

class SQL {
    protected function insertData($arr, $id, $table): void
    {
        foreach($arr['value'] as $k => $v) {

            if(!mb_strlen($v)) continue;

            $basic = isset($arr['radio'][$k]) ? 1 : 0;
            $query = "INSERT INTO ".$table." (value, user_id, basic) VALUES ('".$v."', '".$id."', ".$basic.")";
            $this->connection->query($query);

        }
    }

    protected function updateData($arr, $table): void
    {
        foreach($arr['value'] as $k => $v) {

            if(!mb_strlen($v)) {
                $this->deletData($k, $table);
                continue;
            }

            $basic = isset($arr['radio'][$k]) ? 1 : 0;
            $query = "UPDATE ".$table." SET value='".$v."', basic=".$basic." WHERE id=".$k;

            $this->connection->query($query);

        }
    }

    protected function deletData(): void
    {
        $this->createConnection($id, $table);
        
        $query = "DELETE FROM ".$table." WHERE id=".$id;
        $this->connection->query($query);
    }
}