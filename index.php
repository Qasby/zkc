<?php
include("zkc.php");
//niezb�dne klasy --------------------------------------------------------------------------------------------||
zkcController::loadClass("output");
zkcController::setClass("output", new output());

zkcController::loadClass("database");
zkcController::setClass("db", new db("localhost", "xxx", "xxx", "xxx"));

zkcController::loadClass("view");
//niezb�dne klasy --------------------------------------------------------------------------------------------||
zkcController::loadPage($_GET['app'], $_GET['module'], $_GET['section']);
