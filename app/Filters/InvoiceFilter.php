<?php
namespace App\Filters;

use App\Filters\ApiFilter;
class InvoiceFilter extends ApiFilter{

    protected $safeParams = [
        'customerId' => ['eq'],
        'amount' => ['eq', 'gt', 'gte', 'lt', 'lte'],
        'status' => ['eq', 'ne'],
        'billedDate' => ['eq', 'gt', 'gte', 'lt', 'lte'],
        'paidDate' => ['eq', 'gt', 'gte', 'lt', 'lte'],
    ]; //paramatros con los que vamos a querer filtrar nuestros modelos
    protected $columnMap = [
        'customerId' => 'customer_id',
        'billedDate' => 'billed_dated',
        'paidDate' => 'paid_dated',
    ]; //vamos a mapear columnas de como queremos que se filtre
    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>=',
        'ne' => '!='
    ]; // aca vamos a usar los operadores de como queremos filtrar 


}