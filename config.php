<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL); // E_ERROR / E_ALL

setlocale(LC_ALL,"SV");
ini_set('max_execution_time', 120); //120 seconds = 2 minuter

final class CONFIG
{

	const VERSION = "0.01";
	const DEBUG = true; // om visa debug-prylar
    const LOG_CURL = false; // om logga CURL-anropen
    const LOG_CURL_FILEPREFIX = "curls_log_";

	const BASE_URL = "http://localhost/"; // med avslutande "/" (om inte tom, då bara "")

    const UPLOAD_DIR = "uploads/"; // med avslutande "/"

	// nav
    const PARAM_NAV = "r"; // route
    const PARAM_ID = "id";

	// API ENTRIES
	const API_ENTRY_USER = "http://api-alpha.bostr.se:8080/user/v1/";
    const API_ENTRY_ADMIN = "http://api-alpha.bostr.se:8080/admin/v1/";

    // API ENDPOINTS
    const API_USER_PIMG = "ping";
    const API_ADMIN_LOGIN = "login";
    const API_ADMIN_LOGOUT = "logout";
    const API_ADMIN_CONF_GET = "configs";
    const API_ADMIN_SCRIPT_REST = "files";

    // log
    const LOG_DIR = "../logs/";
    const LOG_FILENAME_BASE = "fetch-log-";
    const LOG_FILENAME_EXT = ".txt";
    const LOG_TO_SCREEN = true;

    // curl
    const CURL_TIMEOUT = 60*5; // sekunder
    const CURL_CONNECTTIMEOUT = 0; // sekunder
}


