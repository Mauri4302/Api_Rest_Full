<?php
namespace App\Filters;

use Illuminate\Http\Request;
class ApiFilter{

    protected $safeParams = []; //paramatros con los que vamos a querer filtrar nuestros modelos
    protected $columnMap = []; //vamos a mapear columnas de como queremos que se filtre
    protected $operatorMap = []; // aca vamos a usar los operadores de como queremos filtrar 

    public function transform(Request $request)
    {
        $eloQuery = [];
        foreach ($this->safeParams as $parm => $operators) {
            $query = $request->query($parm);
            if (!isset($query)) {
                continue;
            }
            $column = $this->columnMap[$parm] ?? $parm;

            foreach ($operators as $operator ) {
                if (isset($query[$operator])) {
                    $eloQuery[] = [$column, $this->operatorMap[$operator], $query[$operator]];
                }
            }
        }

        return $eloQuery;
    }


}