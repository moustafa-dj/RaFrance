<?php 
use Illuminate\Support\Facades\DB;

        function countTableRecords($tableName)
        {
            $recordCount = DB::table($tableName)->count();
            return $recordCount;
        }
?>