<?php
require_once  __DIR__.'/../seeds/CreateUsersTable.php';
require_once  __DIR__.'/../seeds/CreateRequestTable.php';


class SeedController {

    public function handleRequest()
    {
        $table = new CreateUsersTable();
        $table->createTable();
        $table = new CreateRequestTable();
        $table->createTable();
    }
}