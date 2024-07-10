<?php
namespace App\Filters;

use App\Filters\ApiFilter;
class CustomerFilter extends ApiFilter{

    protected $safeParams = [
        'name' => ['eq'],
        'type' => ['eq'],
        'email' => ['eq'],
        'address' => ['eq'],
        'city' => ['eq'],
        'state' => ['eq'],
        'postalCode' => ['eq', 'gt', 'lt'],
    ]; //paramatros con los que vamos a querer filtrar nuestros modelos
    protected $columnMap = [
        'postalCode' => 'postal_code'
    ]; //vamos a mapear columnas de como queremos que se filtre
    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>=',
    ]; // aca vamos a usar los operadores de como queremos filtrar 


}